<?php
  $url = 'editor.php';
  $file = $_GET['fn'];
  $text = file_get_contents($file);

<<<<<<< HEAD
  $action = "update_rm.php?fn=" . $file;
=======
  $action = "update.php?fn=" . $file;
>>>>>>> 91592ca021f688723faad1b8aae483302be8059e
?>

<head>
  <title>Edit README</title>
</head>

 <form action="<?php echo $action ?>" method="post">
   <textarea name="text" style="width: 100%; height: 70%"><?php echo htmlspecialchars($text) ?></textarea>
   <input type="submit" value="Save Changes"/>
 </form>
