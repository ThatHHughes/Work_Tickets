<html>
<body>
<?php

include('connect.php');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$uid = $_GET['uid'];

$sql = "UPDATE Ticket_Data SET `name`='$_POST[name]',`description`='$_POST[description]',
`assigned_persons`='$_POST[assigned_persons]',`status`='$_POST[status]' WHERE uid=$uid;";
$result=$conn->query($sql);

header(sprintf('Location: %s', 'view.php'));

$conn->close();
?>
</body>
</html>
