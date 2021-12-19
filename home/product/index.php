<?php
  $title = 'Products';
session_start();
if ((empty($_SESSION['admin'])||!empty($_SESSION['admin'])&&isset($_SESSION['admin']))){
	if (!$_SESSION['admin'])
   		 header("location: ../../home");
}
include '../init.php';
function getProducts(){
  include '../db.php';
  $sql = " SELECT * FROM product";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
  return $rows;
}
if (isset($_GET['err'])){
  $error = $_GET['err'];
  $msg='';
    if (strpos($error,'n')!== false){
      $msg=$msg.'Please insert a valid name<br><hr>';
    }
    if (strpos($error,'d')!== false){
      $msg=$msg.'Please insert a valid description<br><hr>';
    }
    if (strpos($error,'p')!== false){
      $msg=$msg.'Please insert a valid price<br><hr>';
    }
    if (strpos($error,'i')!== false){
      $msg=$msg.'Please insert a valid picture<br><hr>';
    }
}
if (isset($_POST['create'])){
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
}
if (isset($_POST['delete'])){
  $id = checkData($_POST['ID']);
  $image = "../uploads/".$_POST['image'];
  if (file_exists($image)){
      unlink($image);
      if (file_exists($image)){
          header('Location: ../error?err=delimage1');
      }
      else
      {
          $sql = "DELETE FROM product WHERE id = :id";
          $stmt = $pdo->prepare($sql);
          $run=$stmt->execute([
              'id' => $id,
          ]);
        
          if (!$run){
              header('Location: ../error?err=del');
          }
          header('Location: index.php');
      }
  }
  else{
      header('Location: ../error?err=delimage');
  }
  
  
}
if (isset($_POST['update'])){
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
include '../layout.phtml';

?>
