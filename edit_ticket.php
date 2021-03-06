<html>

<link rel="stylesheet" type="text/css" href="css/input.css">

<head>
  <title>Edit Ticket</title>
</head>

<body>
<h1> Edit Ticket </h1>

<?php
// Connect to database
include('connect.php');

$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

//Get uid from query string and set action url to include uid
$uid = $_GET['uid'];
$action_edit = "update_ticket.php?uid=" . $uid;
$action_delete = "delete_ticket.php?uid=" . $uid;

//Get ticket info for ticket with uid found in query string
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

<!-- Create form that is preloaded with ticket info -->
<!-- Allow user to edit info as desired, then save their edits -->
<form action="<?php echo $action_edit ?>" method="post">
  Name: <br>
  <textarea name="name"> <?php echo $name ?> </textarea> <br> <br>
  Status: (Open, In Progress, Closed) <br>
  <textarea name="status"> <?php echo $status ?></textarea> <br> <br>
  Description: <br>
  <textarea name="description"> <?php echo $description ?></textarea> <br> <br>
  Assigned Persons: <br>
  <textarea name="assigned_persons"> <?php echo $assigned_persons ?></textarea> <br> <br>
  <input type="submit" name="save_edit" value="Save Changes"/>
</form>

<!-- Create a form that offers the option to delete the Ticket -->
<form action="<?php echo $action_delete ?>" method="post">
  <input type="submit" name="delete_ticket" value="Delete Ticket"
  onclick="return confirm('Are you sure you want to delete this ticket?');"/>
</form>

</body>
</html>
