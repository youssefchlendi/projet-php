<?php
// var_dump($_SESSION['mycart']);
// foreach ($_SESSION['mycart'] as $product) :
//     var_dump($product);
//     echo '<br>';
// endforeach;
// 
session_start();
include 'db.php';
// foreach ($_SESSION['mycart'] as $product=>$value) : 
//     // $q ="SELECT * FROM product WHERE id=".$product."";
//     // $res = mysqli_query($conn,$q);
//     // $row= mysqli_fetch_array($res);
//     $sql = " SELECT * FROM product WHERE id=:id";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([
//     "id" => $product,
//     ]);
// $row=$stmt->fetch(PDO::FETCH_ASSOC);
//     var_dump($row);
// endforeach;

// if( !isset($_SESSION['id']) || empty($_SESSION['id'])){
//     echo "test";
// }
echo $d = date('Y-m-d H:i:s');
//foreach ($_SESSION['mycart'] as $product=>$value) : 


?>