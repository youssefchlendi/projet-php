<?php
  include '../init.php';
  $title = 'Categories';
  function getCategories(){
    include '../db.php';
    $query='SELECT * FROM category';
    $run = mysqli_query($conn,$query);
    $rows=$run->fetch_all(MYSQLI_ASSOC);
    return $rows;
  
  }  include '../layout.phtml';
  ?>
