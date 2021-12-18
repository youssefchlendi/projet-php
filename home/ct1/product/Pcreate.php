<?php

include '../init.php';
if (isset($_POST['name'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $cat = $_POST['category'];
    // File upload path
    $targetDir = "../uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    $query="INSERT into  product(name,description,price,image,category) VALUES('".$name."','".$description."','".$price."','".$fileName."','".$category."')";
    
    
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
    echo $run;
}
// header('Location: index.php');
?>