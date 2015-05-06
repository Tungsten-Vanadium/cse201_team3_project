<?php
$servername = "localhost:3306";
$username = "root";
$password = "Barlow";
$dbname = "appstore";

// Create connection
$conn = mysql_connect($servername,$username,$password);
mysql_select_db($dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}

// define variables and set to empty values
$nameErr = $developerErr = $platformErr = $descriptionErr = $linkErr = $versionErr = $priceErr = "";
$name = $developer = $platform = $description = $link = $version = $price = "";

//$sql = "INSERT INTO apps (APPname, APPdev, APPplatform, APPlink, APPversion, APPprice)
//VALUES ('$_POST[$name]', '$_POST[$developer]', '$_POST[$platform]', '$_POST[$description]', '$_POST[$link]', '$_POST[$version]', '$_POST[$price]', ". mysql_real_escape_string($_POST['apps']).")");
$query=mysql_query(sprintf("INSERT INTO apps (APPname, APPdev, APPPLATFORM, APPlink, APPversion, APPprice) VALUES ('{$_POST[$name]}', '{$_POST[$name]}', '{$_POST[$developer]}', '{$_POST[$description]}', '{$_POST[$link]}', '{$_POST[$version]}', '{$_POST[$price]}')"));
if ($query) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "App name is required";
   } else {
     $name = test_input($_POST["name"]);
   }
  
   if (empty($_POST["developer"])) {
     $developerErr = "Developer is required";
   } else {
     $developer = test_input($_POST["developer"]);
   }
    
   if (empty($_POST["platform"])) {
     $platformErr = "Platform is required";
   } else {
     $platform = test_input($_POST["platform"]);
   }
	
   if (empty($_POST["link"])) {
     $linkErr = "Link is required";
   } else {
     $link = test_input($_POST["link"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$link)) {
       $linkErr = "Invalid URL";
     }
   }

   if (empty($_POST["version"])) {
     $versionErr = "Version is required";
   } else {
     $version = test_input($_POST["version"]);
	 if (!preg_match("/^[0-9.]*$/",$version)) {
	   $versionErr = "Only numbers allowed"; 
	 }
   }

   if (empty($_POST["price"])) {
     $priceErr = "Price is required";
   } else {
     $price = test_input($_POST["price"]);
	 if (!preg_match("/^[0-9.]*$/",$price)) {
	   $priceErr = "Only numbers allowed"; 
	 }
   }
   
   if (empty($_POST["description"])) {
     $descriptionErr = "Description is required";
   } else {
     $description = test_input($_POST["description"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}*/
?>