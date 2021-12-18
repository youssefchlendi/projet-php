<?php
$stat=$_GET["stat"];
$email=$_GET["email"];
$title=$_GET["title"]='register';
include '../header.php';
?>
<div class="box container">
                            <?php if ($stat==1) echo "<h4>Enregistré avec succès</h4>
                        <h5>Veuillez vérifier votre e-mail pour le confirmer
                        <p class='row align-items-center mt-5'>
    <a class=' ml-auto mr-auto btn btn-primary btn-sm' href='../login' role='button'>Continuer vers la page de connexion</a>
  </p> ";
   else if (!$stat) echo "<h4>Vous êtes déjà inscrit <br> <small>Mais vous n'êtes pas vérifié</small></h4>
                        <h5>Cliquez sur le bouton pour recevoir l'email de confirmation</h5>
    <form method='POST' class='row align-items-center' action='../verify/resend-verification.php'><input type='hidden' name='email' value='$email'><button class='ml-auto mr-auto btn btn-danger btn-sm' type='submit'>Renvoyer l'e-mail de vérification</button>
    <a class=' ml-auto mr-auto btn btn-primary btn-sm' href='../login' role='button'>Continuer vers la page de connexion</a>
";
 else if ($stat==2) echo "<h4>Vous êtes déjà inscrit<br><small>Et vérifié</small></h4>
                        <h5>Cliquez sur le bouton pour accéder à la page de connexion</h5>
                        <p class='row align-items-center mt-5'>
                        <a class=' ml-auto mr-auto btn btn-primary btn-sm' href='../login' role='button'>Continuer vers la page de connexion</a>
</p> ";
else if ($stat==3) echo "<h4>Email erronée</h4>
                        <h5>Cliquez sur le bouton pour accéder à la page de l'inscription</h5>
                        <p class='row align-items-center mt-5'>
                        <a class=' ml-auto mr-auto btn btn-primary btn-sm' href='../register' role='button'>Continuer vers la page de l'inscription</a>
</p>"?>
                    						</div>
                                            <?php
                                            include '../footer.php';
                                            ?>