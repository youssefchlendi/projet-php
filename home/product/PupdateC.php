<?php

include '../init.php';
if (isset($_POST['name'])){
    $name = checkData($_POST['name']);
    $description = checkData($_POST['description']);
    $price = checkData($_POST['price']);
    $category = checkData($_POST['category']);
    $id= checkData($_POST['ID']);
        // File upload path
        $targetDir = "uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if (empty($fileName)){
            $sql = "UPDATE product SET name= :name,description= :description,price=:price,category=:category where id=:id";
            $stmt = $pdo->prepare($sql);
            $run=$stmt->execute([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'category' => $category,
                'id' => $id,
            ]);
        }else{
            $sql = "UPDATE product SET name= :name,description= :description,price=:price,category=:category,image=:image where id=:id";
            $stmt = $pdo->prepare($sql);
            $run=$stmt->execute([
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'category' => $category,
                'image' => $fileName,
                'id' => $id,
            ]);
            $statusMsg = '';
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                if($run){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                }else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
        echo $run;
        header('Location: index.php');

}
?>