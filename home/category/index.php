<?php
  include '../init.php';
  include '../classes/category.php';
  $title = 'Categories';
  session_start();
  $categori= new category();
  
  if ((empty($_SESSION['admin'])||!empty($_SESSION['admin'])&&isset($_SESSION['admin']))){
    if (!$_SESSION['admin'])
        header("location: ../../home");
  }
  if (isset($_POST['create'])){
    $name = checkData($_POST['name']);
    $description = checkData($_POST['description']);
    $categori->addCategory($name,$description);
  }
  if (isset($_POST['delete'])){
    $id = checkData($_POST['ID']);
    $categori->removeCategories($id);
  }
  if(ISSET($_POST['update'])){
      $name = checkData($_POST['name']);
      $description = checkData($_POST['description']);
      $id = checkData($_POST['ID']);
     $categori-> editCategorie($id, $name,  $description);
  }
    
  include '../layout.phtml'
  ?>
