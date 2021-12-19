<?php
  $title = 'Orders';
  include '../init.php';
  session_start();
if ((empty($_SESSION['admin'])||!empty($_SESSION['admin'])&&isset($_SESSION['admin']))){
	if (!$_SESSION['admin'])
   		 header("location: ../../home");
}
$sql = " SELECT * FROM `order` ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['approved'])){
  $approved = checkData($_POST['app']);
  $id = checkData($_POST['id']);
  
  // echo $approved.$id;
  // echo $approved.$id;
  $approved=$approved?0:1;

  $sql = " UPDATE `order` SET `approved` = :approved WHERE `ID` = :id; ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    'id' => $id,
    'approved' =>$approved
  ]);   
  header("Refresh:0");
}
include '../layout.phtml';
?>