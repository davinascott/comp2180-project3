<?php
 
 
function Connect()
{
 $dbhost = "localhost"; 
 $dbuser = "davina1703";
 $dbpass = "davina1703";
 $dbname = "davina1703";
 
 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
 echo "Connected successfully";
}

return $conn;
 
?>