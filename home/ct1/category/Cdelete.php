<?php
  include '../init.php';

if (isset($_POST['ID'])){
$id = $_POST['ID'];
$delete = "DELETE FROM category WHERE id = '$id'";
$run= mysqli_query($conn,$delete);

$delete="SET  @num := 0;";
$run= mysqli_query($conn,$delete);

$delete="UPDATE category SET id = @num := (@num+1);";
$run= mysqli_query($conn,$delete);

$delete="ALTER TABLE category AUTO_INCREMENT =1;";
$run= mysqli_query($conn,$delete);
header('Location: index.php');
}



?>