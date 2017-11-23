<html>

<link rel="stylesheet" type="text/css" href="css/input.css">

<head>
  <title>New Ticket</title>
</head>

<body>

<h1> Create New Ticket </h1>

<!-- Create form prompting for all basic ticket information -->
<!-- Redirect to insert.php  -->
<form action="insert.php" method="post">
Name: <br> <input type="text" name="name" /><br><br>
Description: <br> <input type="text" name="description" class="description_box" /><br><br>
Status: (Open, In Progress, Closed) <br> <input type="text" name="status" /><br><br>
Assigned Persons: <br> <input type="text" name="assigned_persons" /><br><br>

<input type="submit" value="Create Ticket"/>
</form>

</body>
</html>
