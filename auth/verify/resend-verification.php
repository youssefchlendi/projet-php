<?php
$title='Resend verification';
include "../init.php";

    /* Envoi de mail */
    if (isset($_POST['email'])){
        $email=$_POST['email'];
        $sql = "SELECT * FROM clients WHERE email=:email ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,
            ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $token=$row['email_verification_link'];
        // remplissage des variables avec les champs des form 
        $link = "<a href='localhost/food/auth/verify/index.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";
        $stat=1;
        sendmail("CoolFood.",$email,"email de verification",'Cliquez sur ce lien pour vérifier votre e-mail '.$link.'');
}
include '../header.php';
?>
                        <h4 class="card-title"></h4>
                            <div class="box container">
                            <h1>Email de verification renvoyé</h1>
                        <h5>Veuillez vérifier votre e-mail pour le confirmer
                        <p class='row align-items-center mt-5'>
    <a class='ml-auto mr-auto btn btn-primary btn-sm' href='../login' role='button'>Continuer vers la page de connexion</a>
  </p>

                    						</div>
<?php include '../footer.php'; ?>