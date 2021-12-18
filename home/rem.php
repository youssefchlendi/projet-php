<?php
session_start();
if (isset($_GET['id'])){
    unset($_SESSION['mycart'][$_GET['id']]);
    header("location: panier.php");
    exit();
}
?>