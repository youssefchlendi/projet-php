<?php
  include '../init.php';
	if(ISSET($_POST['name'])){
        $name = checkData($_POST['name']);
        $description = checkData($_POST['description']);
        $id = checkData($_POST['ID']);
        $sql = "UPDATE category SET name= :name,description=:description where id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
          'name' => $name,
          'description' => $description,
          'id' => $id
        ]);
        
      }
      header('Location: index.php');

?>