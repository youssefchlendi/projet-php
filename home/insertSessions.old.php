<?php

include 'init.php';
session_start();
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
}
?>





