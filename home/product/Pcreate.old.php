<?php

include '../init.php';
if (!empty($_POST['name'])&&!empty($_POST['description'])&&!empty($_POST['price'])&&!empty($_POST['category'])&&!empty($_FILES["image"]["name"])){
    //Declaration des variable envoyer par post
        $name = checkData($_POST['name']);
        $description = checkData($_POST['description']);
        $price = checkData($_POST['price']);
    // input type image
        //The directory where the image will be saved
        $targetDir = "../uploads/";
        //Recover file name from $_FILES
        $fileName = basename($_FILES["image"]["name"]);
        //The path to the uploaded file
        $targetFilePath = $targetDir . $fileName;
        //The extension of the uploaded file ( .jpg or .png )
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    //Input select 
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    //mysql query
    //Verify that the image is uploaded correctly
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        $sql = "INSERT INTO product(name,description,price,image,category) VALUES(:name,:description,:price,:image,:category)";
        $stmt = $pdo->prepare($sql);
        $run=$stmt->execute([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $fileName,
            'category' => $category
        ]);
        if (!$run){
            header('Location: ../error?err=bdexecute');
        }
    }else{
        header('Location: ../error?err=img');
    }
    header('Location: index.php');
}else{
    $error ="?err=";
    if (empty($_POST['name'])){
        $error=$error."n";
    }
    if (empty($_POST['description'])){
        $error=$error."d";
    }
    if (empty($_POST['price'])){
        $error=$error."p";
    }
    if (empty($_POST['category'])){
        $error=$error."c";
    }
    if(empty($_FILES["image"]["name"])){
        $error=$error."i";
    }
    header('Location: index.php'.$error.'');

}
?>