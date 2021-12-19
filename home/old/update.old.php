<?php
session_start();
if (isset($_POST['quantite'])&&isset($_GET['id'])){
    $_SESSION['mycart'][$_GET['id']]=$_POST['quantite'];
    header("location: panier.php");
}
