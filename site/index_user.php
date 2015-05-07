<html>
<?php
session_start();
?>
<div id="bg">
	<div id="top">
		<div id= login>
			<a href="login.php">Login</a>	
			<a href="">New User</a>
		</div>
		<div id="search">
			<form method="post" action="searchResult.php">
				Search our site:<br>
				<input type="text" name="APPtitle">
				<input type="submit" name = "submit" value="Search"> 
			</form>
		</div>
		
	</div>
	<head>
		<title>Dev Simple's EOL App Market</title>
		<link rel="stylesheet" href="home.css">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	</head>
	
	<body>
		<h1>Welcome to the EOL App Market</h1>
		<ul id="nav">
			<li><a href="index_user.php">Home</a></li>
			<li><a href="WorkingMarket_user.php">View Market</a></li>
			<li><a href="https://itunes.apple.com/us/genre/ios/id36?mt=8">Apple Store</a></li>
			<li><a href="https://play.google.com/store?hl=en&tab=w8">Google Play</a></li>
			<li><a href="http://www.amazon.com/mobile-apps/b/ref=mas_surl?ie=UTF8&node=2350149011">Amazon Appstore</a></li>
			<li><a href="appForm.php">Request an app</a></li>
			<li><a href="">Contact Us</a></li>
			<li><a href="">About</a></li>
		</ul>
		<br><br><br>
		<p>Have you ever wanted to find out what apps were on the Apple Store, Google Play and Amazon Appstore?
		Dev Simple's EOL App Market makes this easy by searching our database and putting the information
		in one place.</p>
		<h2>New Additions:</h2>
		<div id="scroll_cont">
			<div id="cont">
				<?php include 'index_market.php';?>
			</div>
		</div>
		<br>
		<div id="footer">
		<p>Copyright 2015, Dev Simple. All rights reserved.</p>
		</div>
	</body>
</div>
</html>