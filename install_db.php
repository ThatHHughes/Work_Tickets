<?php

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
$connectCommand = '<?php $username = ' . $username . '; $password = ' . $password . '; $servername = ' . $servername . '; $dbname = ' . $dbname . '; ?>';
echo $connectCommand;

$connectFile = 'connect.php';
$connectFile = fopen($connectFile, "wa+");
fprintf($connectFile, $connectCommand);
fclose($connectFile);

//Create database

$sql = "CREATE DATABASE $dbname";
$result = $conn->query($sql);
if($result == TRUE) {
  echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

shell_exec("mysql --user=$username --password=$password $dbname < $SourceFile");

header(sprintf('Location: %s', 'view.php'));

$conn->close();
?>
