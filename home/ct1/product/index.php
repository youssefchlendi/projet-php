<?php
  $title = 'Products';

include '../init.php';
include '../components.php';
function getProducts(){
  include '../db.php';
  $query='SELECT * FROM product';
  $run = mysqli_query($conn,$query);
  $rows=$run->fetch_all(MYSQLI_ASSOC);
  return $rows;
}
function getCategories(){
  include '../db.php';
  $query='SELECT * FROM category';
  $run = mysqli_query($conn,$query);
  $rows=$run->fetch_all(MYSQLI_ASSOC);
  return $rows;

}

include '../layout.phtml';

?>
