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
		<script src="appForm.js"></script>
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
$servername = "localhost:3306";
$username = "root";
$password = "Barlow";
$dbname = "appstore";

// Create connection
$conn = mysql_connect("localhost", "root", "Barlow");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_error());
}

// define variables and set to empty values
$nameErr = $developerErr = $platformErr = $linkErr = $versionErr = $priceErr = "";
$name = $developer = $platform = $link = $version = $price = "";

$sql = "INSERT INTO apps (APPname, APPdev, APPPLATFORM, APPlink, APPversion, APPprice)
VALUES ($name, $developer, $platform, $link, $version, $price)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "App name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed";
     }
   }
  
   if (empty($_POST["developer"])) {
     $developerErr = "Developer is required";
   } else {
     $developer = test_input($_POST["developer"]);
     // check if developer only contains letters, punctuation and whitespace
     if (!preg_match("/^[a-zA-Z !';:.,?!-_]*$/",$developer)) {
       $developerErr = "Only letters, punctuation and white space allowed";
     }
   }
    
   if (empty($_POST["platform"])) {
     $platformErr = "At least one platform is required";
   } else {
     $platform = test_input($_POST["platform"]);
   }
	
   if (empty($_POST["link"])) {
     $linkErr = "Link is required";
   } else {
     $link = test_input($_POST["link"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$link) {
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
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


    <h2>Please fill out the following form:</h2>
	<p><span class="error">* required field.</span></p>
    <form id="form" action="appconf.html" method="<?php echo htmlspecialchars($_SERVER["
		PHP_SELF"]);?>
        Name of application:<br>
        <input name="appName" type="text" value="<?php echo $name;?>" required>
        <span class="error">* <?php echo $nameErr;?></span><br>
        <br>
        Developers:<br>
        <input name="developer" type="text" value="<?php echo $developer;?>" required>
        <span class="error">* <?php echo $developerErr;?></span><br>
        <br>
        Platforms:<br>
        <input name="platform" type="checkbox" value="iOS">Apple<br>
        <input name="platform" type="checkbox" value="Android">Android<br>
        <input name="platform" type="checkbox" value="Windows">Windows<br>
        <input name="platform" type="checkbox" value="Other">Other:
        <input name="platformName" type="text"><br>
        <br>
        Links:<br>
        <input name="links" type="text" value="<?php echo $link;?>" required>
        <span class="error">* <?php echo $linkErr;?></span><br>
        <br>
        Most current version:<br>
        <input name="versions" type="number" value="<?php echo $version;?>" required>
        <span class="error">* <?php echo $versionErr;?></span><br>
        <br>
        Price:<br>
        <input min="0" name="price" step="0.01" type="number" value=
        "<?php echo $price;?>" required>
		<span class="error">*<?php echo $priceErr;?></span><br>
        <br>
<!--        <input type="submit" value="Submit Request Form"> <input type="submit"
        value="Reset Form"> -->
		<input type="submit" value="Submit Request Form">
		<input onclick="resetForm()" type="button" value="Reset">
    </form>
</body>
</html>