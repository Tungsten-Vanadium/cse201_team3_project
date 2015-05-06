<div id="bg">
	<div id="top">
		<div id= user_panel>
			
		</div>
		<div id="search">
			<form>
				Search our site:<br>
				<input type="text" name="search">
				<input type="submit" value="Submit"> 
			</form>
		</div>
		
	</div>
	<head>
		<title>Dev Simple's EOL App Market</title>
		<link rel="stylesheet" href="appForm.css">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	</head>
	
	<body>
		<h1>EOL App Market: Request an App</h1>
		<ul id="nav">
			<li><a href="index.html">Home</a></li>
			<li><a href="market.html">View Market</a></li>
			<li><a href="https://itunes.apple.com/us/genre/ios/id36?mt=8">Apple Store</a></li>
			<li><a href="https://play.google.com/store?hl=en&tab=w8">Google Play</a></li>
			<li><a href="http://www.amazon.com/mobile-apps/b/ref=mas_surl?ie=UTF8&node=2350149011">Amazon Appstore</a></li>
			<li><a href="appForm.html">Request an app</a></li>
			<li><a href="">Contact Us</a></li>
			<li><a href="">About</a></li>
		</ul>
		<br><br>
	</body>


<body>

<?php

if(isset($_POST['add']))
{
$servername = "localhost:3306";
$username = "root";
$password = "Barlow";
$dbname = "appstore";

// Create connection
$conn = mysql_connect("localhost:3306", "root", "Barlow");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}

// define variables and set to empty values
$usernameErr = $passwordErr = "";
$user = $_POST['user'];
$comment = $_POST['comment'];

$user = $_POST['user'];
mysql_select_db($dbname,$conn);
$userSql = "SELECT * FROM login WHERE USERname = '$user' LIMIT 1";
$userQuery = mysql_query($userSql);

if(mysql_num_rows($userQuery) > 0){
	$sql = "INSERT INTO comments (USERname, Comment)" .
		"VALUES ('$user', '$comment')";
	mysql_select_db($dbname);
	$retval = mysql_query($sql,$conn);

	if ($retval) {
		echo "Comment added successfully";

	} else {
		die('failed: ' . mysql_error());
	}
	mysql_close($conn);
}
else{

?>

    <h2>Please fill out the following form:</h2>
	<p><span class="error">* required field.</span></p>
    <form id="form" action="<?php $_PHP_SELF ?>" method="post">
	Validate Username:<br>
        <input name="user" type="text" id="user" required>
        Comment:<br>
        <input name="comment" type="textarea" id="comment" required>
        <br>
<!--        <input type="submit" value="Submit Comment"> <input type="submit"
        value="Reset Form"> -->
		<input name="add" type="submit" value="Submit Comment" id="add">
    </form>
	<?php
}
?>
</body>
</html>