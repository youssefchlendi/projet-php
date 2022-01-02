<?php
include '../db.php';
include '../functions.php';
include '../classes/orders.php';
$order = new orders();
session_start();
if ((empty($_SESSION['client'])||!empty($_SESSION['client'])&&isset($_SESSION['client']))){
	if (!$_SESSION['client'])
   		 header("location: ../../home");
}

$sum=0;
if (isset($_POST['modifier'])){
    $_SESSION['mycart'][$_POST['id']]=$_POST['quantite'];
}
if (isset($_POST['remove'])){
    unset($_SESSION['mycart'][$_POST['id']]);
}
$orders=$order->getOrdersById($_SESSION['id']);
include '../templates/hheader.phtml';
include 'panier.phtml';
include '../templates/hfooter.phtml';

?>