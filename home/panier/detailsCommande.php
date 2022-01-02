<?php

include '../db.php'; 
session_start();
$msg="";
echo $_SESSION['id'];
if (isset ($_SESSION['id'])) {
    $id=$_SESSION['id'];
   

    
    $sql = "SELECT * FROM order  WHERE clientId = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
echo "le client est " .$resultat;
if ($result['approved']==1){
    $msg= "votre commande est bien valider ";
}
else
$msg= "Patientez svp votre commande est en cours de traitement";

}
else
echo "nahhhhh";
include './panier.phtml';
?>