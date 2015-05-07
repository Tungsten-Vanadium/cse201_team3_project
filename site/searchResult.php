<html>

<div id="bg">
	<div id="top">
		<div id= login>
			<a href="login.html">Login</a>	
			<a href="">New User</a>
		</div>
		<div id="search">
			<form method="GET" action="index.php">
				Search our site:<br>
				<input type="text" name="title">
				<input type="submit" name = "submit" value="Search"> 
			</form>
			<?php
				session_start();
				mysql_connect("localhost","root","Barlow");
				mysql_select_db("appstore");
				$info = mysql_query("SELECT * FROM apps WHERE APPname LIKE '" . mysql_real_escape_string($_POST['APPtitle']). "'");
				if($info == false){
					die('Results Not Found: ' . mysql_error());
				}
				while($row = mysql_fetch_array($info,MYSQL_ASSOC))
				{
				  $name = $row['APPname'];
				  $description = $row['APPdescription'];
				  $developer = $row['APPdev'];
				  $platform = $row['APPplatform'];
				  $link = $row['APPlink'];
				  $version = $row['APPversion'];
				  $price = $row['APPprice'];
				  $dateAdded = $row['APPdatesubmitted'];
				  $dateUpdated = $row['APPdateupdated'];
				  $name = htmlspecialchars($row['APPname'],ENT_QUOTES);
				  $description = htmlspecialchars($row['APPdescription'],ENT_QUOTES);
				  $developer = htmlspecialchars($row['APPdev'],ENT_QUOTES);
				  $platform = htmlspecialchars($row['APPplatform'],ENT_QUOTES);
				  $link = htmlspecialchars($row['APPlink'],ENT_QUOTES);
				  $version = htmlspecialchars($row['APPversion'],ENT_QUOTES);
				  $price = htmlspecialchars($row['APPprice'],ENT_QUOTES);
				  $dateAdded = htmlspecialchars($row['APPdatesubmitted'],ENT_QUOTES);
				  $dateUpdated = htmlspecialchars($row['APPdateupdated'],ENT_QUOTES);
				  
				  echo "  <div id='app_float'>
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
				
			?>
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
			<li><a href="index.php">Home</a></li>
			<li><a href="WorkingMarket.php">View Market</a></li>
			<li><a href="https://itunes.apple.com/us/genre/ios/id36?mt=8">Apple Store</a></li>
			<li><a href="https://play.google.com/store?hl=en&tab=w8">Google Play</a></li>
			<li><a href="http://www.amazon.com/mobile-apps/b/ref=mas_surl?ie=UTF8&node=2350149011">Amazon Appstore</a></li>
			<li><a href="WorkingAppForm.php">Request an app</a></li>
			<li><a href="http://chickenonaraft.com/">Contact Us</a></li>
			<li><a href="http://www.staggeringbeauty.com/">About</a></li>
		</ul>
		<br><br><br>
		<br>
		<div id="footer">
		<p>Copyright 2015, Dev Simple. All rights reserved.</p>
		</div>
	</body>
</div>
</html>