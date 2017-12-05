<!DOCTYPE html>
<html>
<head>
    <title>Cheapomail</title>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div id = "cheap"> CHEAPOMAIL </div>
    <div class="mai">
        <div id="buttonp">
            <span id="newMessage"><a href="newMessage.html"><strong>NEW MESSAGE</strong></a></span>
        </div>
        <?php
			 $dbhost = "localhost"; 
 $dbuser = "davina1703";
 $dbpass = "davina1703";
 $dbname = "davina1703";
 
 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

            $sess = $_SESSION["username"];
            $displayMessages = "SELECT sender_id, subject, date_sent FROM Messages";
            $result = $conn->query($displayMessages);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Sender</th><th>Subject</th><th>Date Sent</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td><a href='displayMessages.php'>" . $row["sender_id"]. "</a></td><td><a href='displayMessages.php'>" . $row["subject"]. "</a></td><td>" . $row["date_sent"]. "</td></tr>";
                } echo "</table>";
            } else {
                echo "0 results";
	           }
	           $conn->close();
	       ?>
	           
	       </div>
	  </div>
    </body>
</html>