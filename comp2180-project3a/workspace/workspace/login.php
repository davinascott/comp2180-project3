<?php
/*A user goes to the login page and logs in. The system keeps track of the user using
PHP sessions. Once logged in they are presented with the Home Screen which shows
their recent messages which they can read and allows them to compose new
messages.*/

session_start();

//This code is throwing an error
/*$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $_SESSION["username"] = $_POST('username');
    $_SESSION["password"] = $_POST('password');
} */

 $dbhost = "localhost"; 
 $dbuser = "davina1703";
 $dbpass = "davina1703";
 $dbname = "davina1703";
 
 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$login = "SELECT username, password FROM Users WHERE username = '$username'";
$query = $conn->query($login);
$data = $query->fetch_assoc();


/*$pass_regex ="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}$/" ;*/

if($data['username'] == $username and $data['password'] == md5($password)){
    $_SESSION["username"] = '$username';
    echo "Favorite color is " . $_SESSION["username"] . ".<br>";
    $update = "UPDATE Users SET mysession = $session WHERE username = '$username'";
	$conn->query($update);
    if($data["username"] == 'admin'){
       header('location:homeAdmin.php'); 
    } else {
    header('location:home.php');
    }
}else{
    echo " Username or Password Incorrect";
}


?>



