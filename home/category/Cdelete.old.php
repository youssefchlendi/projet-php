<?php
  include '../init.php';

if (isset($_POST['ID'])){
$id = checkData($_POST['ID']);
$sql = "DELETE FROM category WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'id' => $id,
]);

}
header('Location: index.php');



?>