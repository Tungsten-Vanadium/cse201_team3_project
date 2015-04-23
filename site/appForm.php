$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// TODO: Add platforms as variable
$sql = "INSERT INTO MyGuests (name, developer, links, version, price)
VALUES ($name, $developer, $link, $version, $price)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// define variables and set to empty values
$nameErr = $developerErr = $linkErr = $versionErr = $priceErr = "";
$name = $developer = $link = $version = $price = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "App name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed";
     }
   }
  
   if (empty($_POST["developer"])) {
     $developerErr = "Developer is required";
   } else {
     $developer = test_input($_POST["developer"]);
     // check if developer only contains letters, punctuation and whitespace
     if (!preg_match("/^[a-zA-Z !';:.,?!-_]*$/",$developer)) {
       $developerErr = "Only letters, punctuation and white space allowed";
     }
   }
    
   if (empty($_POST["link"])) {
     $linkErr = "Link is required";
   } else {
     $link = test_input($_POST["link"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$link) {
       $linkErr = "Invalid URL";
     }
   }

   if (empty($_POST["version"])) {
     $versionErr = "Version is required";
   } else {
     $version = test_input($_POST["version"]);
	 if (!preg_match("/^[0-9.]*$/",$version)) {
	   $versionErr = "Only numbers allowed"; 
	 }
   }

   if (empty($_POST["price"])) {
     $priceErr = "Price is required";
   } else {
     $price = test_input($_POST["price"]);
	 if (!preg_match("/^[0-9.]*$/",$price)) {
	   $priceErr = "Only numbers allowed"; 
	 }
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}