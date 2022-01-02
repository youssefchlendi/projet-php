<?php

include 'product.php';

$product = new Product();

$products=$product->create("test","test",10,"test",1);

echo $products;