<html>

<style>
.description_box {
  width: 80%;
  height: 40%;
}
</style>

<head>
  <title>New Ticket</title>
</head>

<body>

<h1> Create New Ticket </h1>

<form action="insert.php" method="post">
Name: <input type="text" name="name" /><br><br>
Description: <input type="text" name="description" class="description_box" /><br><br>
Status: <input type="text" name="status" /><br><br>
Assigned Persons: <input type="text" name="assigned_persons" /><br><br>

<input type="submit" />
</form>

</body>
</html>
