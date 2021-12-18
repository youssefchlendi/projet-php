<?php
  include '../init.php';
  $title = 'Categories';
  session_start();
  if ((empty($_SESSION['admin'])||!empty($_SESSION['admin'])&&isset($_SESSION['admin']))){
    if (!$_SESSION['admin'])
        header("location: ../../home");
  }
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
  if (isset($_POST['delete'])){
    $id = checkData($_POST['ID']);
    $sql = "DELETE FROM category WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
    ]);
  }
  if(ISSET($_POST['update'])){
      $name = checkData($_POST['name']);
      $description = checkData($_POST['description']);
      $id = checkData($_POST['ID']);
      $sql = "UPDATE category SET name= :name,description=:description where id=:id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        'name' => $name,
        'description' => $description,
        'id' => $id
      ]);
  }

    include '../layout.phtml';
  ?>
