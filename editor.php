<?php

// Get readme filepath from query string
  $file = $_GET['fn'];
//Create text variable with the contents of the README
  $text = file_get_contents($file);
//Create action url with file
  $action = "update_rm.php?fn=" . $file;
?>

<style>
  body {
    font-family: sans-serif;
    color: #222222;
  }
  input {
    border: 1px solid #606060;
    width: 100%;
    padding: 3px;
  }
  textarea {
    width: 100%;
    height: 70%;
  }
</style>

<head>
  <title>Edit README</title>
</head>

<h1> Edit README </h1>

<!-- Create form holding the contents of the text variable -->
<!-- Allow user to edit and save contents of form to README -->
<!-- Redirect to update_rm.php -->

 <form action="<?php echo $action ?>" method="post">
   <textarea name="text" ><?php echo htmlspecialchars($text) ?></textarea>
   <input type="submit" value="Save Changes"/>
 </form>
