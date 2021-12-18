<?php 
session_start();
include 'init.php';
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

include 'components.php';
include 'index.phtml';
}

?>
