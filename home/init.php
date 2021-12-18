<?php
if (file_exists('components.php')){
    include 'components.php';
}else{
    include '../components.php';
}

if (file_exists('db.php')){
    include 'db.php';
}else{
    include '../db.php';
}

if (file_exists('functions.php')){
    include 'functions.php';
}else{
    include '../functions.php';
}

if (!isset($pdo)){
    if (file_exists('error'))
        header('location: error?err=bd');
    else
        header('location: ../error?err=bd');
}
?>