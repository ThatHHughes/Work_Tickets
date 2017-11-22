<html>
<body>
<?php

include('connect.php');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

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


$name = $_POST[name];
$name = str_replace(' ', '', $name);
$rm_url_value = "readmes/" . $name . "_README.txt";

$sql="INSERT INTO Ticket_Data (name,description,status,assigned_persons,rm_url,uid) VALUES ('$_POST[name]','$_POST[description]','$_POST[status]','$_POST[assigned_persons]','$rm_url_value','$new_uid')";
$result=$conn->query($sql);

$handle = fopen($rm_url_value, 'w') or die('Cannot open file: '.$rm_url_value);

header(sprintf('Location: %s', 'view.php'));


$conn->close();
?>
</body>
</html>
