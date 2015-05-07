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
		<h1>EOL App Market: New User Registration</h1>
		<ul id="nav">
			<li><a href="index.html">Home</a></li>
			<li><a href="market.html">View Market</a></li>
			<li><a href="https://itunes.apple.com/us/genre/ios/id36?mt=8">Apple Store</a></li>
			<li><a href="https://play.google.com/store?hl=en&tab=w8">Google Play</a></li>
			<li><a href="http://www.amazon.com/mobile-apps/b/ref=mas_surl?ie=UTF8&node=2350149011">Amazon Appstore</a></li>
			<li><a href="appForm.html">Request an app</a></li>
			<li><a href="http://chickenonaraft.com/">Contact Us</a></li>
			<li><a href="http://www.staggeringbeauty.com/">About</a></li>
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
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO Login (USERname, USERpass, USERmod, USERadmin)" .
"VALUES ('$username', '$password', '0', '0')";

mysql_select_db($dbname);
$retval = mysql_query($sql,$conn);

if ($retval) {
	echo "Registration successful";
   $to = "eolappmarket@gmail.com"; // this is your Email address
  $subject = "Registration";
  $message = "A new user has been added (" . $username . "). Check if user needs advanced privileges.";
  mail($to,$subject,$message);

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
        Username:<br>
        <input name="username" type="text" id="name" required>
        <!--<<span class="error">* <?php echo $nameErr;?></span><br>-->
        <br>
        Password:<br>
        <input name="password" type="password" id="password" required>
        <!--<<span class="error">* <?php echo $developerErr;?></span><br>-->
        <br>
<!--        <input type="submit" value="Submit Registration Form"> <input type="submit"
        value="Reset Form"> -->
		<input name="add" type="submit" value="Submit Request Form" id="add">
    </form>
	<?php
}
?>
</body>
</html>