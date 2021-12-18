<?php
$title='Error Page';
include '../templates/header.phtml';
$error_message='';
if (isset($_GET['err'])) {
    $error=$_GET['err'];
    if ($error=='img'){
        $error_message= 'Error uploading the image please try again';
    }else if ($error=='bd'){
        $error_message= 'Error Connecting to database';
    }else if ($error=='bdexecut'){
        $error_message= 'Error Executing the query';
    }else if ($error=='delimage'){
        $error_message= 'Error while deleting the product IMAGE not found';
    }else if ($error=='del'){
        $error_message= 'Error while deleting the product Something went wrong';
    }else if ($error=='delimage1'){
        $error_message= 'Error while deleting the product IMAGE can\'t be deleted;';
    }
}
include 'index.phtml';
header("refresh: 10; url= ".$_SERVER['HTTP_REFERER']."");
include '../templates/footer.phtml';
?>