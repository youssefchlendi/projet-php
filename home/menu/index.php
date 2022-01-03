<?php
include '../init.php';
session_start();
if ((empty($_SESSION['client'])||!empty($_SESSION['client'])&&isset($_SESSION['client']))){
	if (!$_SESSION['client'])
   		 header("location: ../../home?err=2");
}

if (isset($_POST['add'])){
  if (!isset($_SESSION['mycart'])){
      $_SESSION['mycart'] = array();
  }
  $id=$_POST['hid'];
  $qte=$_POST['qte'];
  if (array_key_exists($id, $_SESSION['mycart'])) {
      $_SESSION['mycart'][$id] += $qte;
  } else {
      $_SESSION['mycart'][$id] = $qte;
  }
  $done=1;
}
$sql = " SELECT * FROM category";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
$sql = " SELECT * FROM product";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows1=$stmt->fetchAll(PDO::FETCH_ASSOC);
include '../templates/hheader.phtml';
include 'index.phtml';
include '../templates/hfooter.phtml';

?>