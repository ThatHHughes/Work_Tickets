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

<<<<<<< HEAD
=======
$name = $_POST[name];
$name = str_replace(' ', '', $name);
$rm_url_value = "readmes/" . $name . "_README.txt";

$sql="INSERT INTO Ticket_Data (name,description,status,assigned_persons,rm_url) VALUES ('$_POST[name]','$_POST[description]','$_POST[status]','$_POST[assigned_persons]','$rm_url_value')";
$result=$conn->query($sql);

$handle = fopen($rm_url_value, 'w') or die('Cannot open file: '.$rm_url_value);

>>>>>>> 91592ca021f688723faad1b8aae483302be8059e
$sql = "SELECT * FROM UID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
<<<<<<< HEAD
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
=======
            $og_uid = $row[uid_min];
            echo $og_uid;
            $uid = $row[uid_min] + 1;
            echo $uid;
            $sql_changeuid = "UPDATE UID SET uid_min='.$uid.' WHERE uid_min='.$og_uid.'";
            $result_changeuid = $conn->query($sql_changeuid);
        }
}
else {
                echo "0 results";
}

//header(sprintf('Location: %s', 'view.php'));
>>>>>>> 91592ca021f688723faad1b8aae483302be8059e


$conn->close();
?>
</body>
</html>
