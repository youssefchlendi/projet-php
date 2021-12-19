<?php

$title ='mot de passe oubliée';
include "../init.php";

if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $email = checkData($_POST['email']);
    $sql = "SELECT * FROM clients WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'email' => $email,
    ]);
    $column_count = $stmt->rowCount();
    if ($column_count==1){
        $token=rand(0,9999999999999999);
        $sql = "UPDATE clients set recovery =:token WHERE email=:email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'email' => $email,
            'token' => $token,
        ]);
        $link = "<a href='".$_SERVER['HTTP_HOST']."/food/auth/resetpass/?token=".$token."'>Click and recover password</a>";
        sendmail("CoolFood",$email,"Lien de reset de mot de passe ","Cliquez sur ce lien pour changer votre mot de passe  '.$link.'");
        $stat=1;
    }
    else{
        $stat=0;
    }
    
}else {
    $stat =2;
}
header("Location: error.php?stat=".$stat."");
?>