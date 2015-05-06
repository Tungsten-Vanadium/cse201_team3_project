<!DOCTYPE html>
<html>
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
			<li><a href="index.php">Home</a></li>
			<li><a href="marketTest.php">View Market</a></li>
			<li><a href="https://itunes.apple.com/us/genre/ios/id36?mt=8">Apple Store</a></li>
			<li><a href="https://play.google.com/store?hl=en&tab=w8">Google Play</a></li>
			<li><a href="http://www.amazon.com/mobile-apps/b/ref=mas_surl?ie=UTF8&node=2350149011">Amazon Appstore</a></li>
			<li><a href="WorkingAppForm.php">Request an app</a></li>
			<li><a href="">Contact Us</a></li>
			<li><a href="">About</a></li>
		</ul>
		<br><br>
	</body>
<body>
    <h2>Please fill out the following form:</h2>

    <form id="form" action="appconf.html" method="<?php echo htmlspecialchars($_SERVER["
		PHP_SELF"]);?>
        Name of application:<br>
        <input name="appName" type="text" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span><br>
        <br>
        Developers:<br>
        <input name="developer" type="text" value="<?php echo $developer;?>">
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
        <input name="links" type="text" value="<?php echo $link;?>">
        <span class="error">* <?php echo $linkErr;?></span><br>
        <br>
        Versions:<br>
        <input name="versions" type="number" value="<?php echo $version;?>">
        <span class="error">* <?php echo $versionErr;?></span><br>
        <br>
        Price:<br>
        <input min="0" name="price" step="0.01" type="number" value=
        "<?php echo $price;?>"> <span class="error">*
        <?php echo $priceErr;?></span><br>
        <br>
        <input type="submit" value="Submit Request Form"> <input type="submit"
        value="Reset Form">
    </form>
	<br>
	<p>Copyright 2015, Dev Simple. All rights reserved.</p>
</body>
</div>
</html>