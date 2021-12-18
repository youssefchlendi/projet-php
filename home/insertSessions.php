<?php

include 'init.php';
/*
// ecriture dans le tableau session
//$_SESSION['product']='Burger';
/$_SESSION['name']=' Cheese Burger';
var_dump(" $_SESSION[product]");
var_dump(" $_SESSION[name]");
*/
session_start();
if (!isset($_SESSION['mycart'])){
    $_SESSION['mycart'] = array();
}
// session_destroy();
// unset($_SESSION['mycart']);
if (isset($_POST['submit'])){
    //
        extract ($_POST);
        if (isset($_POST['hname'])){
        $name=$_POST['hname'];
//echo "your data is hidden".$name;
    }
    if (isset($_POST['hdescription'])){
            $desc=$_POST['hdescription'];
//var_dump($desc);
    }

    if (isset($_POST['hprice'])){
        $prix=$_POST['hprice'];

    }
    if (isset($_POST['hcategorie'])){
        $catgorie=$_POST['hcategorie'];
        $image=$_POST['himage'];
        $prix=$_POST['hprice'];
        $id=$_POST['hid'];
        $qte=$_POST['qte'];
        echo "***********************categorieeeeeeee";
}
if (array_key_exists($id, $_SESSION['mycart'])) {
    // Product exists in mycart so just update the quanity
    echo 'mawjoud';
    $_SESSION['mycart'][$id] += $qte;
} else {
    // Product is not in mycart so add it
    echo 'mouch mawjoud';

    $_SESSION['mycart'][$id] = $qte;
}
    // $_SESSION['mycart'][$id] = $qte;

print_r($_SESSION['mycart']);
// foreach ($_SESSION['mycart'] as $product=>$value) :
//     echo $product.' '.$value;
//     echo '<br>';
// endforeach;
}
?>





