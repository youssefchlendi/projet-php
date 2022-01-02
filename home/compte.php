<?php

include './db.php';
session_start();
$error=[ ];
if ($_SESSION['admin']== true){

    header('Location: ./dashboard');

}
else 
{
                $id=$_SESSION['id'];
            $sql = "SELECT * FROM clients WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'id' => $id,
            ]);
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
           

            if (isset($_POST['submit'])){
                
                $name=$_POST['name'];
                $password=$_POST['pass'];
                $adresse=$_POST['adresse'];
                $mail=$_POST['email'];
                $phone=$_POST['phone'];
                $oldPass=$_POST['passold'];
              


            $_SESSION['mail']=$mail;
           
            if (password_verify($oldPass, $result['password'])==false) 
                    {
                        $passwordhash = md5($password);
                        $password=$passwordhash;
                    $sql = "UPDATE clients SET name= :name,email= :email,password= :password,adresse=:adresse,phone=:phone where id=:id";
                    $stmt = $pdo->prepare($sql);
                    $run=$stmt->execute([
                        'name' => $name,
                        'email' => $mail,
                        'password' => $password,
                        'adresse' => $adresse,
                    'phone' => $phone,
                        'id' => $id,
                    ]);
                    //$_SESSION['mail']=$mail;
                 
                    $_SESSION['user']=$name;
                    //header ('location:./error.html');
                    }
                else{
                    $error[0]="le mot de passe ancien est n 'est pas correcte";
                    goto end_edit;
                }
}
end_edit:
}
include "./compte.phtml"; ?>

?>
