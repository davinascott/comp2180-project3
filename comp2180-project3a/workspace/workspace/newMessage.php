<?php

session_start();
$date_t = date("Y-m-d H:i:s");
$sess = print_r($_SESSION);
$pass = 0;

 $dbhost = "localhost"; 
 $dbuser = "davina1703";
 $dbpass = "davina1703";
 $dbname = "davina1703";
 
 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
$recipients = $conn->real_escape_string($_POST['recipients']);
$subject = $conn->real_escape_string($_POST['subject']);
$body = $conn->real_escape_string($_POST['body']);

$sender_id = "SELECT username FROM Messages WHERE (session_id = $sess)";
$result = $conn->query($sender_id);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $recipientse = explode(',', $recipients); 
 if (empty($recipients)) {
    echo "Recipient is required";
  } else {
      for ($x = 0; $x <= count($recipientse); $x++){
        if (!filter_var($recipientse[0], FILTER_VALIDATE_EMAIL)) {
          echo "Invalid username"; 
        } else {
         $pass = $pass + 1;
      }
    }
  }
  
  if (empty($subject)) {
    echo "Subject is required";
  } else {
    if (!preg_match("/^[a-zA-Z ]*$/",$subject)) {
      echo "Only letters and white space allowed";
    } else {
      $pass = $pass  + 1;
    }
  }
  
  if ($pass > count($recipientse)){
      $message   = "INSERT into Messages (recepient_ids,sender_id,subject,body,date_sent) VALUES('" . $recipients . "','" . $sender_id . "','" . $subject . "','" . $body . "','" . $date_t . "')";
      $success = $conn->query($message);
      if(!$success){
        echo "query not working";
      }
    } else {
        echo "Could not send messgae. Please check your fields..";
  }
}
?>