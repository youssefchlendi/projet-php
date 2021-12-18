<?php
$title = 'Inscription';
include '../init.php';

/* Envoi de mail */

use PHPMailer\PHPMailer\PHPMailer;

$stat = 0;
if (isset($_POST['name'])) {
    $email = checkData($_POST['email']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM clients WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'email' => $email,
        ]);  
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $column_count = $stmt->rowCount();
        $password=$result['password'];
        $status=$result['statu'];
        if ($column_count && $status) {
            $stat = 2;
        }
    else if (!$column_count) {
        /* remplissage des variables avec les champs des form */
        $user = checkData($_POST['name']);
        $pass = md5(checkData($_POST['password']));
        $email = checkData($_POST['email']);
        $phone = checkData($_POST['phone']);
        $adresse = checkData($_POST['adresse']);

        /* initialization de commande remplissage de table */
        $token = md5($_POST['email']) . rand(10, 9999);
        $sql = "INSERT INTO clients (name, email, email_verification_link ,password,phone,adresse) VALUES(:user,:email,:token,:password,:phone,:adresse)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'user'=>$user,
            'email' => $email,
            'token'=>$token,
            'password'=>$pass,
            'phone'=>$phone,
            'adresse'=>$adresse

        ]);
        /* remplissage des variables avec les champs des form */
        $link = "<a href='localhost/food/auth/verify/index.php?key=" . $email . "&token=" . $token . "'>Click and Verify Email</a>";
        $stat = 1;
        sendmail("CoolFood", $email, "Lien de Verification", "Cliquez sur ce lien pour vérifier l'e-mail '.$link.'");
    }
    } else {
        $stat=3;
    }
    header("Location: affichage.php?stat=" . $stat . "&email=" . $email . "");
}
?>
<?php include '../header.php'; ?>


<?php include '../footer.php'; ?>