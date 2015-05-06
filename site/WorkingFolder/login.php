<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Form</title>
  </head>
  <style>
  body {background-color: CornFlowerBlue;}
  span {color: red}
  fieldset{font-family: Stencil;}
  </style>
  <body>

<?php

if(isset($_POST['login']))
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
$user = $_POST['user'];
$pass = $_POST['pass'];
mysql_select_db($dbname,$conn);
$userSql = "SELECT * FROM login WHERE USERname = '$user' and USERpass = '$pass' LIMIT 1";
$userQuery = mysql_query($userSql);

if(mysql_num_rows($userQuery) > 0){
	echo "Login Successful";
	**CODE TO CHECK ADMIN PRIVELAGE**
	if(**ADMIN**){
		$adminSqlA = "SELECT * FROM apps WHERE visible = '0'";
		$adminQueryA = mysql_query($adminSqlA);
		$adminSqlB = "SELECT * FROM comments WHERE visible = '0'";
		$adminQueryB = mysql_query($adminSqlB);
		if(mysql_num_rows($adminSqlA) > 0){
			header("Location: http://127.0.0.1/site/appVal.php");
		}
		else if(mysql_num_rows($adminSqlB) > 0){
			header("Location: http://127.0.0.1/site/comVal.php");
		}
		else if((mysql_num_rows($adminSqlA)) > 0 && (mysql_num_rows($adminSqlB) > 0)){
			header("Location: http://127.0.0.1/site/app_comVal.php");
		}
		else{
			header("Location: http://127.0.0.1/site/index.php");
		}
	}
	if(**MOD**){
                $modSql = "SELECT * FROM comments WHERE visible = '0'";
		$modQuery = mysql_query($modSql);
		if(mysql_num_rows($adminSqlB) > 0){
			header("Location: http://127.0.0.1/site/comVal.php");
		}
		else{
			header("Location: http://127.0.0.1/site/index.php");
		}
	}
}
	exit();
}else{
	echo "Login Failed";
}

mysql_select_db($dbname);

mysql_close($conn);
}


?>
<form name="loginForm" action="<?php $_PHP_SELF ?>" method="post">
       <fieldset align="center">
       <legend>Login Form</legend>
       <label>Username: <span>*</span><input type="text" name="user"/></label> <br/>
       <label>Password: <span>*</span><input type="password" name="pass"/></label> <br/>
       <input name="login" type="submit" value="Login" id="login"> 
   </fieldset>
   </form>
   </body>
</html>