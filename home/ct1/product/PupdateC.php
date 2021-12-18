<?php

include '../init.php';
if (isset($_POST['name'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $id= $_POST['ID'];
        // File upload path
        $targetDir = "uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if (empty($fileName)){
            $query=" UPDATE product SET name= '$name',description= '$description',price='$price',category= '$category' where id=$id";
            $run= mysqli_query($conn,$query);
        }else{
            $query=" UPDATE product SET name= '$name',description= '$description',price='$price',category= '$category',image='$fileName'  where id=$id";

            $run= mysqli_query($conn,$query);
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