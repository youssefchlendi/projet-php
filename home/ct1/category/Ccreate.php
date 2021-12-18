<?php

include '../init.php';
if (isset($_POST['name'])&&isset($_POST['description'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $query="INSERT INTO category(name,description) VALUES('".$name."','".$description."')";
    $run= mysqli_query($conn,$query);
}
header('Location: index.php');
?>