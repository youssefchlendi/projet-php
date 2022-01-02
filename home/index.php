<?php 
/*
if($pdo!=false){
  
  // Fetch category list
  $sql = " SELECT * FROM category";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
  // Fetch products
  $sql = " SELECT * FROM product";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $rows1=$stmt->fetchAll(PDO::FETCH_ASSOC);
  
  
}
*/
session_start();
include 'init.php';
include 'classes/products.php';
include 'classes/category.php';
$products=new products();
$category=new category();
$rows=$category->getAllCatgeories();
$rows1=$products->getProducts();
include 'index.phtml';


?>
