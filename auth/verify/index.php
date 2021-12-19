
<?php
$title ='Account verification';
include '../header.php';
include '../init.php';
if($_GET['key'] && $_GET['token'])
{

    $email = checkData($_GET['key']);
    $token = checkData($_GET['token']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = "SELECT * FROM clients WHERE email_verification_link=:token and email=:email ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,
                'token' => $token,
            ]);
        $row=$stmt->rowCount();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $d = date('Y-m-d H:i:s');
        $stat=0;
        if ($row) {
        if($result['email_verified_at'] == NULL){
            $sql = "UPDATE clients set statu='1', email_verified_at =:date WHERE email=:email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,
                'date' => $d,
            ]);
            
            $stat=1;
            $msg = "<h1>Félicitations ! Votre compte a été vérifié.</h1>";
        }else if($result['email_verified_at'] != NULL) {
                
            $stat=1;
        $msg = "<h1>Vous avez déjà vérifié votre compte avec nous</h1><h4>Accout vérifié à <br><b>$row[email_verified_at]</b></h4>";
        }
        } else if(!isset($result)){
        $msg = "Cet e-mail n'a pas été enregistré chez nous";

        }
    }
    else {
        $msg= "Email erronée";
        $stat=0;
    }
}
else
    {
    $msg = "Danger ! Quelque chose a mal tourné.";
    }
?>
                        <h4 class="card-title"></h4>
                            <div class="box container">
                            <?php echo $msg?>
                        <?php if($stat) echo '
                        <p class="row align-items-center mt-5">
    <a class="ml-auto mr-auto btn btn-primary btn-sm" href="../login" role="button">Continuer vers la page de connexion</a>
  </p>'?>
                        <?php if(!$stat) echo '
                        <p class="row align-items-center mt-5">
    <a class="ml-auto mr-auto btn btn-primary btn-sm" href="../register" role="button">Continuer à la page d enregistrement</a>
  </p>'?>
                    						</div>
<?php include '../footer.php'; ?>
