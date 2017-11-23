<!-- This file is designed to install Tickets' SQL table upon initial setup -->

<?php

//Get credentials for SQL and connect
$username = $_POST['adminUser'];
$password = $_POST['adminPass'];
$servername = 'localhost';
$dbname = 'Tickets';
$SourceFile = 'Tickets.sql';

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

//Create connect.php for future connections to database
$connectCommand = '<?php $GLOBALS["username"] = "' . $username . '";
  $GLOBALS["password"] = "' . $password . '"; $GLOBALS["servername"]
  = "' . $servername . '"; $GLOBALS["dbname"] = "' . $dbname . '"; ?>';
echo $connectCommand;

$connectFile = 'connect.php';
$connectFile = fopen($connectFile, "wa+");
fprintf($connectFile, $connectCommand);
fclose($connectFile);

//Create database from Tickets.sql backup file
$sql = "CREATE DATABASE $dbname";
$result = $conn->query($sql);
if($result == TRUE) {
  echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

shell_exec("mysql --user=$username --password=$password $dbname < $SourceFile");

//Redirect to view.php
header(sprintf('Location: %s', 'view.php'));

$conn->close();
?>
