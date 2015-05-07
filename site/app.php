<?php
$id = $_GET['id'];
$connect = mysql_connect('localhost', 'root', 'Barlow');
$select_db = mysql_select_db('appstore');
if(isset($_POST['add'])){
$COMusername = $_POST['username'];
$COMrating = $_POST['rating'];
$COMcomment = $_POST['comment'];

$COMsql = "INSERT INTO reviews (REVrating,REVcomment,REVappid,REVreviewerusername)" .
"VALUES ('$COMrating','$COMcomment','$id','$COMusername')";

$retval = mysql_query($COMsql,$connect);

if($retval){
	echo "Thank you for submitting your comment";
} else{
	die('failed'. mysql_error());
}
}

//Remove LIMIT 1 to show/do this to all results.
$query = 'SELECT * FROM apps WHERE APPid = '.$id.' LIMIT 1';
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$avg = "SELECT AVG(reviews.REVrating) AS average FROM reviews WHERE REVappid = $id";
$avgQuery = mysql_query($avg);
$avgResult = mysql_fetch_array($avgQuery);
$average = $avgResult['average'];

// Echo page content
  $name = htmlspecialchars($row['APPname'],ENT_QUOTES);
  $description = htmlspecialchars($row['APPdescription'],ENT_QUOTES);
  $developer = htmlspecialchars($row['APPdev'],ENT_QUOTES);
  $platform = htmlspecialchars($row['APPplatform'],ENT_QUOTES);
  $link = htmlspecialchars($row['APPlink'],ENT_QUOTES);
  $version = htmlspecialchars($row['APPversion'],ENT_QUOTES);
  $price = htmlspecialchars($row['APPprice'],ENT_QUOTES);
  $dateAdded = htmlspecialchars($row['APPdatesubmitted'],ENT_QUOTES);
  $dateUpdated = htmlspecialchars($row['APPdateupdated'],ENT_QUOTES);
   echo "<div id='app_float'>
   <h1>$name</h1>
    Developers: $developer<br />
	Description: $description<br />
	Platforms: $platform<br />
	Link: $link<br />
	Version: $version<br />
	Price: $price<br />
	Date Added: $dateAdded<br />
	Date Updated: $dateUpdated<br />
	<br>
	<br>
	<h2>Comments:</h2>
	<h2>Average Rating: $average </h2>
    </div>
  ";
  ?>
  
  
  
  <?php
  $query = "SELECT * FROM reviews WHERE REVappid = $id";
  $result = mysql_query($query);
  while($row = mysql_fetch_array($result, MYSQL_ASSOC))
  {
  
  $Username = htmlspecialchars($row['REVreviewerusername'],ENT_QUOTES);
  $visible = htmlspecialchars($row['REVvisible'],ENT_QUOTES);
  $rating = htmlspecialchars($row['REVrating'],ENT_QUOTES);
  $comment = htmlspecialchars($row['REVcomment'],ENT_QUOTES);
  if($visible == 1){
  echo "<div>
  <hr>
  <h3>$Username</h3>
  <h4>Rating: $rating</h4>
  $comment
  <br>
  <hr>
  <br>";
  }
  }
  
  
  
  
  
  
  
  
  
?>