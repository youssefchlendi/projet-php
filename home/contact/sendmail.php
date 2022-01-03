<?php
include "db.php";
include "send.php";


    /*verification que champs nom et email sont non null */
if (isset($_POST['nom'])&&isset($_POST['email'])){
      // remplissage des variables avec les champs des form 
      $name=$_POST['nom']." ".$_POST['prenom'];
      $email=$_POST['email'];
      $message=$_POST['text'];
          sendmail("Contact:".$name,"dont.reply.ht@gmail.com","email From :".$name."",$message);
      $msg="<html>
          <body>
              <strong>
              Merci d'avoir pris contact avec nous !
              </strong><br>
              Nous vous remercions de nous avoir contactés / Tunvita.<br>
              Un de nos collègues vous recontactera bientôt !<br>
              Passez une excellente journée ! 
          </body>
      </html>";  
          sendmail("Coolfood.",$email,"Merci d'avoir pris contact avec nous !",$msg);
}

//Commande pour envoyer le mail
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thank You</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <meta http-equiv="refresh" content="5; url:../">

</head>
<body class="jumbotron">
<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Vous allez recevoir un email de verification de l'envoi. </strong> <br>en vas vous contactez le plus tots possible. </p>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.html" role="button">Continue to homepage</a>
  </p>
</div>
</body>
</html>

