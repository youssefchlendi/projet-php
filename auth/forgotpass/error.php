<?php
$title='affichage';
include '../header.php';
$stat=$_GET["stat"];
if ($stat) echo "
<h4 class='card-title'></h4>
<div class='box container'>
    <h1>Email de recuperation envoyé</h1>
    <h5>Veuillez vérifier votre e-mail pour changer votre mot de passe
        <p class='row align-items-center mt-5'>
            <a class='ml-auto mr-auto btn btn-primary btn-sm' href='../login' role='button'>Continuer vers la page de connexion</a>
        </p>";
else if ($stat==2)echo "<h4 class='card-title'>ERROR</h4>
<div class='box container'>
    <h1>verifier que votre email est valide</h1>
        <p class='row align-items-center mt-5'>
            <a class='ml-auto mr-auto btn btn-primary btn-sm' href='../login' role='button'>Continuer vers la page de connexion</a>
        </p>";
else echo "<h4 class='card-title'>ERROR</h4>
<div class='box container'>
    <h1>Veuiller verifier ressayer , Et verifier que votre email est valide</h1>
        <p class='row align-items-center mt-5'>
            <a class='ml-auto mr-auto btn btn-primary btn-sm' href='../login' role='button'>Continuer vers la page de connexion</a>
        </p>";
        
        ?>
        </div>
<?php include '../footer.php'; ?>