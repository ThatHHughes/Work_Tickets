<?php
  // Connect to database
  include('connect.php');

  $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
  if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
  }

  //Get UID from query string
  $uid = $_GET['uid'];

  //Delete ticket with that UID
  $sql = "DELETE FROM Ticket_Data WHERE uid='$uid'";
  $result = $conn->query($sql);

  //Redirect to view.php
  header(sprintf('Location: %s', 'view.php'));
?>
