
<html>

<div id="bg">
	<div id="top">
		<div id= user_panel>
			
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
		<link rel="stylesheet" href="market.css">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		
	</head>
	
	<body>
		<h1>EOL App Market: Market View</h1>
		<ul id="nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="WorkingMarket.php">View Market</a></li>
			<li><a href="https://itunes.apple.com/us/genre/ios/id36?mt=8">Apple Store</a></li>
			<li><a href="https://play.google.com/store?hl=en&tab=w8">Google Play</a></li>
			<li><a href="http://www.amazon.com/mobile-apps/b/ref=mas_surl?ie=UTF8&node=2350149011">Amazon Appstore</a></li>
			<li><a href="http://chickenonaraft.com/">Contact Us</a></li>
			<li><a href="http://www.staggeringbeauty.com/">About</a></li>
		</ul>
		<br>
		<br>
		<br>
		
	<div id="cont">
		<?php include 'view_market.php';?>
	</div>
	<div id="footer">
	<p id="copy">Copyright 2015, Dev Simple. All rights reserved.</p>
	</div>
</body>
</div>
</html>