<html>

<div id="bg">
	<div id="top">
		<div id="search">
			<form method="post" action="searchResult_user.php">
				Search our site:<br>
				<input type="text" name="APPtitle">
				<input type="submit" name = "submit" value="Search"> 
			</form>
			<head>
		<title>Dev Simple's EOL App Market</title>
		<link rel="stylesheet" href="home.css">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	</head>
	
	<body>
	<div>
		<h1>Search Results</h1>
	</div>
		<br><br><br>
		<br>
		
	</body>
			<?php
				mysql_connect("localhost","root","Barlow");
				mysql_select_db("appstore");
				$query = "SELECT * FROM apps WHERE APPname = '{$_POST['APPtitle']}'";
				$info = mysql_query($query);
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
				  $id = htmlspecialchars($row['APPid'],ENT_QUOTES);
				  
				  echo "  
				  <div id='app_float'>
					<a href='app_user.php?id=$id'>$name</a><br/>
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
	<div id="footer">
		<p>Copyright 2015, Dev Simple. All rights reserved.</p>
		</div>
</div>
</html>