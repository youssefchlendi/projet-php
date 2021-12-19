<?php
include '../db.php';
include '../functions.php';
session_start();
$sum=0;
if (isset($_POST['modifier'])){
    $_SESSION['mycart'][$_POST['id']]=$_POST['quantite'];
}
if (isset($_POST['remove'])){
    unset($_SESSION['mycart'][$_POST['id']]);
}
include '../templates/hheader.phtml';
include 'panier.phtml';
include '../templates/hfooter.phtml';

?>