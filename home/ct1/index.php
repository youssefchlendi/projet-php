<?php session_start();
          include 'init.php';
          // Fetch category list
          $query='SELECT * FROM category';
          $run = mysqli_query($conn,$query);
          $rows=$run->fetch_all(MYSQLI_ASSOC);
          // Fetch products
          $query1='SELECT * FROM product';
          $run1 = mysqli_query($conn,$query1);
          $rows1=$run1->fetch_all(MYSQLI_ASSOC);
          //Fetch Category name using category id 
include 'components.php';
include 'index.phtml';
?>
