<html>
<body>
<?php

// Connect to database
include('connect.php');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

// Increment value of uid in sql UID table by one
//Create variable new_uid holding value of uid in UID table
$sql = "SELECT * FROM UID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $og_uid = $row['uid_min'];
            global $new_uid;
            $new_uid = $og_uid + 1;
            $sql_changeuid = "UPDATE UID SET uid_min='$new_uid' WHERE uid_min='$og_uid'";
            $result_changeuid = $conn->query($sql_changeuid);
        }
}

//Create variable rm_url_value to hold URL of the new ticket's README
$name = $_POST[name];
$name = str_replace(' ', '', $name);
$rm_url_value = "readmes/" . $name . "_README.txt";

//Insert data from POST Form in new.php and from the rm_url_value variable
//into new SQL Ticket row
$sql="INSERT INTO Ticket_Data (name,description,status,assigned_persons,rm_url,uid) VALUES ('$_POST[name]','$_POST[description]','$_POST[status]','$_POST[assigned_persons]','$rm_url_value','$new_uid')";
$result=$conn->query($sql);

//Create README file
$handle = fopen($rm_url_value, 'w') or die('Cannot open file: '.$rm_url_value);

//Redirect to view.php
header(sprintf('Location: %s', 'view.php'));


$conn->close();
?>
</body>
</html>
