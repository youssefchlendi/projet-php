<?php
session_start();
if (!empty($_SESSION['admin'])&&isset($_SESSION['admin'])){
	if ($_SESSION['admin'])
   		 header("location: ../../home");
}
$title ='ADMIN';
include '../header.php';
include 'index.phtml';
include '../footer.php';
?>