<?php

session_start();
 $dbhost = "localhost"; 
 $dbuser = "davina1703";
 $dbpass = "davina1703";
 $dbname = "davina1703";
 
 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
$sess = $_SESSION["username"];

$displayMessages = "SELECT body FROM Messages";
$result = $conn->query($displayMessages);
$message = $result->fetch_assoc();
$result = $message["body"];
echo $result;
                    
?>