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
$nameErr = $developerErr = $platformErr = $descriptionErr = $linkErr = $versionErr = $priceErr = "";
$name = $_POST['name'];
$developer = $_POST['developer'];
$platform = $_POST['platform'];
$description = $_POST['description'];
$link = $_POST['link'];
$version = $_POST['version'];
$price = $_POST['price'];

$sql = "INSERT INTO apps (APPname, APPdev, APPplatform, APPdescription, APPlink, APPversion, APPprice)" .
"VALUES ('$name', '$developer', '$platform', '$description', '$link', '$version', '$price')";

mysql_select_db($dbname);
$retval = mysql_query($sql,$conn);

if ($retval) {
	echo "App submitted successfully";
	$mail = new PHPMailer(true);
	
	if($send_using_gmail){
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->Username = "eolappmarket@gmail.com"
		$mail->Password = "positon1";
		}
	
	$mail->ADDaddress($email,$name);
	$mail->SetFrom($email_from,$name_from);
	$mail->Subject = "App Added";
	$mail->Body = "A new app has been added to the database for your approval";
	
	try{
		$mail->Send();
		echo "Success!";
	} catch(Exception $e){
		echo "Failed: " . $mail->ErrorInfo;
	}

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
        Name of application:<br>
        <input name="name" type="text" id="name" required>
        <!--<<span class="error">* <?php echo $nameErr;?></span><br>-->
        <br>
        Developers:<br>
        <input name="developer" type="text" id="developer" required>
        <!--<<span class="error">* <?php echo $developerErr;?></span><br>-->
        <br>
        Platforms:<br>
        <input name="platform" type="text" required><br>
        <br>
        Links:<br>
        <input name="link" type="text" required>
        <!--<<span class="error">* <?php echo $linkErr;?></span><br>-->
        <br>
        Most current version:<br>
        <input name="version" type="number" required>
        <!--<span class="error">* <?php echo $versionErr;?></span><br> -->
        <br>
        Price:<br>
        <input min="0" name="price" step="0.01" type="number" value=
        "<?php echo $price;?>" required>
		<!--<<span class="error">*<?php echo $priceErr;?></span><br>-->
        <br>
		Description:<br>
		<input name="description" type="text" required>
		<!--<<span class="error">*<?php echo $descriptionErr;?></span><br><br>-->
<!--        <input type="submit" value="Submit Request Form"> <input type="submit"
        value="Reset Form"> -->
		<input name="add" type="submit" value="Submit Request Form" id="add">
		<input onclick="resetForm()" type="button" value="Reset">
    </form>
	<?php
}
?>
</body>
</html>