<?php
$title ='Reset Password';
include "../init.php";
$stat=0;
if (isset($_GET['token'])){
	$token = $_GET['token'];
    $sql = "SELECT * FROM clients WHERE recovery=:token";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'token' => $token,
    ]);
    $row=$stmt->rowCount();
    if ($row){
        if (isset($_POST['password'])){
            $password = md5(checkData($_POST['password']));
            $email = checkData($_POST['email']);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                $sql = "SELECT * FROM clients WHERE recovery=:token AND email=:email";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'token' => $token,
                    'email' => $email,
                ]);
                if ($stmt->rowCount()){
                    $sql = "UPDATE clients set password =:pass,recovery =NULL WHERE email=:email";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        'email' => $email,
                        'pass' => $password,
                    ]);
                    $stat=1;
                }
                else{
                    $stat=2;
                }
            }else{
                $stat=3;
            }
            
	}
}else{
	$stat=2;
}}

include '../header.php';
include 'index.phtml';
 include '../footer.php'; ?>