<?php
session_start();
$title ='Connection';
include "../init.php";
    if (isset($_POST['email'])&&isset($_POST['password'])){
        $user=checkData($_POST['email']);
        $pass=(checkData(($_POST['password'])));
        if (filter_var($user, FILTER_VALIDATE_EMAIL)){

        $stat=0;
        $sql = "SELECT * FROM admin WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'email' => $user,
        ]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $column_count = $stmt->rowCount();
        $password=$result['password'];
        
        $_SESSION['status']=false;

        if ($column_count && $pass==$password){
            $_SESSION['user']=$result['user'];
            $_SESSION['mail']=$result['email'];
            $_SESSION['status']=true;
            $_SESSION['client']=false;
            $_SESSION['admin']=true;
            echo $password;
            header("location: ../../home/dashboard");
            exit();
            $stat=1;
        }
        if ($column_count && $pass!=$password){
            $stat=2;
            session_unset();
            $msg="Vous avez saisi un mauvais mot de passe!";
        }
        if ($stat==0)
        {
            session_unset();
            $msg="Vous n'avez pas de compte!";
        }
    }else{
        $stat=3;
        session_unset();
        $msg="Email erronée entrée..!";

    }
        header("location: error.php?msg=".$msg."&stat=".$stat."");
    }
    
include "../header.php";
?>

<?php include '../footer.php'; ?>