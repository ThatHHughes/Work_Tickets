<?php
  $url = 'editor.php';
  $file = $_GET['fn'];
  $text = file_get_contents($file);


  $action = "update_rm.php?fn=" . $file;
?>

<head>
  <title>Edit README</title>
</head>

 <form action="<?php echo $action ?>" method="post">
   <textarea name="text" style="width: 100%; height: 70%"><?php echo htmlspecialchars($text) ?></textarea>
   <input type="submit" value="Save Changes"/>
 </form>
