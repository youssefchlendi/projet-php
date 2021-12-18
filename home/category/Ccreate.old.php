<?php

include '../init.php';
if (isset($_POST['create'])){
    $name = checkData($_POST['name']);
    $description = checkData($_POST['description']);
    $sql = "INSERT INTO category(name,description) VALUES(:name,:description)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'description' => $description
    ]);
}
header('Location: index.php');
?>