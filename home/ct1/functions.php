<?php
function categoryName($id){
    include 'db.php';
    $nq ="SELECT name FROM category WHERE id=" .$id. " ";
    $nr = mysqli_query($conn,$nq);
    return mysqli_fetch_array($nr)[0];
  }
?>