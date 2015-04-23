<?

$con = mysql_connect("localhost","root","Barlow");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("appstore", $con); // NAME 'app_market' NEEDS CHANGED


$query = "SELECT * FROM apps"

$info = mysql_query($query);

while($row = mysql_fetch_array($info, MYSQL_ASSOC))
{
  $name = htmlspecialchars($row['APPname'],ENT _QUOTES);
  $description = htmlspecialchars($row['APPdescription'],ENT_QUOTES);
  $developer = htmlspecialchars($row['APPdev'],ENT_QUOTES);
  $platform = htmlspecialchars($row['APPplatform'],ENT_QUOTES);
  $link = htmlspecialchars($row['APPlink'],ENT_QUOTES);
  $version = htmlspecialchars($row['APPversion'],ENT_QUOTES);
  $price = htmlspecialchars($row['APPprice'],ENT_QUOTES);
  $dateAdded = htmlspecialchars($row['APPdatesubmitted'],ENT_QUOTES);
  $dateUpdated = htmlspecialchars($row['APPdateupdated'],ENT_QUOTES);
  
  echo "  <div id = 'app_float'>
      	Name: $name<br />
      	Developers: $developer<br />
	Description: $description<br />
	Platforms: $platform<br />
	Link: $link<br />
	Version: $version<br />
	Price: $price<br />
	Date Added: $dateAdded<br />
	Date Updated: $dateUpdated<br />
    </div>
  ";
}

mysql_close($con);

?>