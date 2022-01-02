<?php
$title="dashboard";
include "../init.php";
session_start();
if ((empty($_SESSION['admin'])||!empty($_SESSION['admin'])&&isset($_SESSION['admin']))){
	if (!$_SESSION['admin'])
   		 header("location: ../../home");
}
//
$sql = "SELECT count(*) FROM clients ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$clientCount=$stmt->fetch()['count(*)'];
//
$sql = "SELECT SUM(quantity) as tot FROM cart ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$orderCount=$stmt->fetch()['tot'];
//
$sql = "SELECT SUM(quantity*price) as tot  FROM cart join product on cart.productId = product.ID;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$totalEarnings=$stmt->fetch()['tot'];
//
$sql = "SELECT productId as p,sum(quantity*price) as t FROM cart join product on cart.productId = product.ID group by productId order BY 2 DESC; ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$productEarnings=$stmt->fetchAll();
 
$sql = "SELECT clientId as cid,count(*) as t FROM `order` group by clientId; ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$topClients=$stmt->fetchAll();

$sql = "SELECT * FROM `order` where approved=1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$activeOrders=$stmt->fetchAll();

include "../layout.phtml";

  ?>