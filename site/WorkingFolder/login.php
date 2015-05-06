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
$userERR = passERR = "";
$user = $_POST['user'];
$pass = $_POST['pass'];


$sql = "CHANGE THIS"; 

mysql_select_db($dbname);
$retval = mysql_query($sql,$conn);

if ($retval) {
  echo "Login Successful";
} else {
  die('failed: ' . mysql_error());
}
mysql_close($conn);
}

else{

?>
<form name="loginForm" action="index.html" method="get">
       <fieldset align="center">
       <legend>Login Form</legend>
       <label>Username: <span>*</span><input type="text" name="user"/></label> <br/>
       <label>Password: <span>*</span><input type="password" name="pass"/></label> <br/>
       <input name="login" type="submit" value="Login" id="login"> 
   </fieldset>
   </form>
   </body>
<html/>