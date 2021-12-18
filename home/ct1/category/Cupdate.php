<?php
  include '../init.php';
	if(ISSET($_POST['name'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $id = $_POST['ID'];
        $query=" UPDATE category SET name= '$name',description= '$description' where id=$id";
        $run= mysqli_query($conn,$query);
        header('Location: index.php');
      }

?>