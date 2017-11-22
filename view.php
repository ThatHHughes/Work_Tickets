<html>

<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		font-family: sans-serif;
		font-weight: normal;
	}
</style>

<head>
  <title>View Tickets</title>
</head>

<body>

<?php

include('connect.php');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Ticket_Data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

					$rm_url_editor = "editor.php?fn=" . $row['rm_url'];
					$ticket_editor_url = "edit_ticket.php?uid=" . $row['uid'];

					echo '<a href="new.php"> <strong> Create New </strong> </a> <br><br>';

					echo '<table width="100%" >
						      <tr>
							        <th width="70%" align="left"> <strong>' .$row["name"]. ' - ' .$row["status"]. ' </strong> </th>
											<th width="30%" align="right"> <strong> <a href ="'.$ticket_editor_url.'">Edit Ticket</a> </strong> </th>
						      </tr>
									<tr>
											<th colspan="2" align="left"> <strong>Description:</strong> <br> ' .$row["description"].
											' <br> <strong>Assigned Persons: </strong><br> ' .$row["assigned_persons"]. '<br>
											<strong>Link to README:</strong> <br>
											<a href="' .$rm_url_editor. '"> ' .$row['rm_url']. ' </a>
											</th>
									</tr>
					      </table> <br>';
        }
        }
else {
                echo "0 results";
}


$conn->close();
?>
</body>
</html>
