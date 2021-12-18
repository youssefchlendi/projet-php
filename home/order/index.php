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
include '../layout.phtml';
?>