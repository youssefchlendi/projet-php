<?php

include './category.php';
include './products.php';
$categorie=new Category();
$categories=$categorie->getAllCatgeories();
$product= new products();
$products= $product->getProducts();
;
include 'index.phtml'

?>