<?php
use PHPMailer\PHPMailer\PHPMailer;
if (isset ($_POST['nom'])&& isset($_POST['email'])){
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$message=$_POST['text'];

require_once 'Exception.php';
require_once 'PHPMailer.php';
require_once 'SMTP.php';


$mail=new PHPMailer();
//SMTP SETTINGS
$mail->isSMTP();
$mail->Host="smtp.gmail.com";
$mail->SMTPAuth=true;
$mail->Username="ayadinorhene@gmail.com";
$mail->Password="noussa25";
$mail->Port=465;
$mail->SMTPSecure="ssl";
//EMAIL SETTINGS
$mail->isHTML(true);
$mail->setFrom($email,$nom);
$mail->addAddress("ayadinorhene@gmail.com");
$mail->Body = $text;

if ($mail->send()) {
    $status = "success";
    $response = "Email is sent!";
} else {
    $status = "failed";
    $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
}

exit(json_encode(array("status" => $status, "response" => $response)));
}
?>
