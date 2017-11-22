<html>
<head>
  <title>Edit Ticket</title>
</head>

<body>
<?php

include('connect.php');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$uid = $_GET['uid'];
$action = "update_ticket.php?uid=" . $uid;
$sql = "SELECT * FROM Ticket_Data WHERE uid='$uid'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  $name = $row['name'];
  $description = $row['description'];
  $assigned_persons = $row['assigned_persons'];
  $status = $row['status'];
}

$conn->close();
?>

<form action="<?php echo $action ?>" method="post">
  Name: <br>
  <textarea name="name"> <?php echo $name ?> </textarea> <br>
  Status: <br>
  <textarea name="status"> <?php echo $status ?></textarea> <br>
  Description: <br>
  <textarea name="description"> <?php echo $description ?></textarea> <br>
  Assigned Persons: <br>
  <textarea name="assigned_persons"> <?php echo $assigned_persons ?></textarea> <br>
  <input type="submit"  value="Save Changes"/>

</body>
</html>
