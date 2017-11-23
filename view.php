<html>

<head>
  <title>View Tickets</title>
	<link rel="stylesheet" type="text/css" href="css/view_style.css">
	<!-- Define javascript function for page tabs -->
	<script>
		function openTab(evt, tabName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i< tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablink");
			for (i = 0; i< tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace("active");
			}
			document.getElementById(tabName).style.display = "block";
			evt.currentTarget.className += " active";
		}
		document.getElementById("All").click();
	</script>
</head>

<body>
	<br>
	<h1 style="display:inline">View Tickets</h1>
	<a href="new.php"> <img src="images/plus1.png" align="right" style="background-color:#CCC" alt="new" width:"500px"> </a> <br> <br>

	<!-- Create a button for each tab, and define the function of the tab -->
	<div class="tab">
		<button class="tablink" onclick="openTab(event, 'All')">All</button>
		<button class="tablink" onclick="openTab(event, 'Open')">Open</button>
		<button class="tablink" onclick="openTab(event, 'In Progress')">In Progress</button>
		<button class="tablink" onclick="openTab(event, 'Closed')">Closed</button>
	</div>

	<div id="All" class="tabcontent">
		<br>
		<?php getTickets(""); ?>
	</div>
	<div id="Open" class="tabcontent">
		<br>
		<?php getTickets(" WHERE status='Open'"); ?>
	</div>
	<div id="In Progress" class="tabcontent">
		<br>
		<?php getTickets(" WHERE status='In Progress'"); ?>
	</div>
	<div id="Closed" class="tabcontent">
		<br>
		<?php getTickets(" WHERE status='Closed'"); ?>
	</div>

<?php

//Create function getTickets to get and display ticket data
function getTickets($statusReq) {
	//Connect to database
	include('connect.php');

	$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	//Select desired tickets from database
	$sql = "SELECT * FROM Ticket_Data" . $statusReq;
	$result = $conn->query($sql);

	//Display ticket data in a table
	if ($result->num_rows > 0) {
	        while ($row = $result->fetch_assoc()) {

						$rm_url_editor = "editor.php?fn=" . $row['rm_url'];
						$ticket_editor_url = "edit_ticket.php?uid=" . $row['uid'];

						//Table should contain two rows- one with the basics
						//and one with the details of the ticket
						echo '<table width="100%" >
										<tr>
												<th width="70%" align="left">' .$row["name"]. ' - ' .$row["status"]. ' </th>
												<th class="header" width="30%" align="right"> <a href ="'.$ticket_editor_url.'">Edit Ticket</a> </th>
							      </tr>
										<tr>
												<td colspan="2" align="left" class="main"> <strong>Description:</strong> <br> ' .$row["description"].
												' <br> <strong>Assigned Persons: </strong><br> ' .$row["assigned_persons"]. '<br>
												<strong>Link to README:</strong> <br>
												<a href="' .$rm_url_editor. '" style="color:grey"> ' .$row['rm_url']. ' </a>
												</td>
										</tr>
						      </table> <br>';
	        }
	        }
	else {
	                echo "No tickets found <br>";
	}
	$conn->close();
}
?>
</body>
</html>
