<html>
    <head>
        <title>CHEAPOMAIL HOME</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div id = "cheap"> CHEAPOMAIL HOME </div>
        <div class="headers">
			<span id="logout"><a href="logout.php"><strong>LOG OUT</strong></a></span>
		</div>
        <div> 
            <div class="mai" id="newUser">
                <h1>Add New User</h1>
            
                <form method="post" action = "newuser.php" >
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter the user's First Name"><br>
                    
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Enter the user's lastname Name"><br>
                    
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter the user's Username"><br>
                
                    <label for="password">Password</label>
                     <input type="password" id="password" name="password" placeholder="Enter the user's Password"><br>
                 
                     <input type="submit" value="CREATE">
                </form>
            </div>
            <div>
                <div id="viewRecent"> MESSAGES
                    <?php
                    
 $dbhost = "localhost"; 
 $dbuser = "davina1703";
 $dbpass = "davina1703";
 $dbname = "davina1703";
 
 // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 

            $sess = print_r($_SESSION);
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

	                <span id="newMessage"><a href="newMessage.html"><strong>NEW MESSAGE</strong></a></span> 
	           </div>
            </div>
        </div>
    </body>
</html>