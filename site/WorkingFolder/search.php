<?php
	session_start();
				mysql_connect("localhost","root","Barlow");
				mysql_select_db("appstore");
				$APPtitle = $_POST["APPtitle"];
				$_SESSION['apptitle'] = $APPtitle;
				header("Location:searchResult.php");
				
			?>