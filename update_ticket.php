<html>
<body>
<?php

//Connect to database
include('connect.php');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

//Get uid from query string
$uid = $_GET['uid'];

//Update status to remove leading and trailing spaces
$status = $_POST['status'];
$status = trim($status, ' ');

//Update row in Ticket table where uid is equal to uid from query string
//Update with POST contents from edit_ticket.php
$sql = "UPDATE Ticket_Data SET `name`='$_POST[name]',`description`='$_POST[description]',
`assigned_persons`='$_POST[assigned_persons]',`status`='$status' WHERE uid=$uid;";
$result=$conn->query($sql);

//Redirect to view.php
header(sprintf('Location: %s', 'view.php'));

$conn->close();
?>
</body>
</html>
