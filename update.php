<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "toor";
$dbname = "Tickets";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$file = $_GET['fn'];

echo $file;

file_put_contents($file, $_POST[text]);

$redirect = "editor.php?fn=" . $file;

header(sprintf('Location: %s', $redirect));

$conn->close();
?>
</body>
</html>
