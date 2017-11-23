<html>
<body>
<?php

//Connect to database
include('connect.php');

$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

//Get README filepath from query string
$file = $_GET['fn'];

//Overwrite file contents with new user input
file_put_contents($file, $_POST['text']);

//Redirect back to editor for RM file
$redirect = "editor.php?fn=" . $file;
header(sprintf('Location: %s', $redirect));

$conn->close();
?>
</body>
</html>
