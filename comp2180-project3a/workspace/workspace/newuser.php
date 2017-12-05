<?php

 $dbhost = "localhost"; 
 $dbuser = "davina1703";
 $dbpass = "davina1703";
 $dbname = "davina1703";
 
 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
// Check connection
$firstname = $conn->real_escape_string($_POST['firstname']);
$lastname = $conn->real_escape_string($_POST['lastname']);
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$pass = 0;

//to add new user to database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($firstname)) {
    echo "First Name field is Empty";
  } else {
    if (!preg_match("/^[a-zA-Z ]*$/",$firstnamename)) {
      echo "Only letters and white space allowed";
    } else {
      $pass = $pass  + 1;
    }
  }
  
  if (empty($lastname)) {
    echo "Last Name field is Empty";
  } else {
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      echo "Only letters and white space allowed";
    } else {
      $pass = $pass  + 1;
    }
  }
  
  if (empty($username)) {
    echo "username is required";
  } else {
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid username"; 
    } else {
      $pass = $pass + 1;
    }
  }
  
  if (strlen($_POST["password"]) <= '9') {
    echo "Your Password Must Contain At Least 9 Characters!";
  } else {
      $pass_regex ="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}$/" ;
      if(preg_match($pass_regex,$password)){
          $passwordhash = md5($password);
          $pass = $pass + 1;
    } else {
        echo "Invalid Password";
    }
  
    }
    
    if ($pass == 4){
        $query   = "INSERT into Users (firstname,lastname,username,password) VALUES('" . $firstname . "','" . $lastname . "','" . $username . "','" . $passwordhash . "')";
        $success = $conn->query($query);
        if($success){
          echo "New User Added Successfully.";
          header('location:homeAdmin.php');
        }
    } else {
        echo "Could not enter data. Please check to ensure that all your fields are inputted correctly..";
    }
}


?>