<?php
session_start();
$title ='Connection';
include "../init.php";
    if (isset($_POST['email'])&&isset($_POST['password'])){
        $user=checkData($_POST['email']);
        $pass=md5(checkData(($_POST['password'])));
        if (filter_var($user, FILTER_VALIDATE_EMAIL)){
            $stat=0;
            $sql = "SELECT * FROM clients WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'email' => $user,
            ]);
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            $column_count = $stmt->rowCount();
            $password=$result['password'];
            $status=$result['statu'];
            $_SESSION['status']=false;
            if ($column_count && $pass==$password && $status){
                $_SESSION['user']=$result['name'];
                $_SESSION['id']=$result['ID'];
                echo $_SESSION['user'];
                $_SESSION['status']=true;
                $_SESSION['client']=true;
                $_SESSION['admin']=false;
                $stat=1;
                header("location: ../../home");
                exit();
            }
            if ($column_count && $pass!=$password){
                $stat=2;
                session_unset();
                $msg="Vous avez saisi un mauvais mot de passe!";
            }
            if ($column_count && $pass==$password&& !$status){

                $stat=3;
                session_unset();
                $msg="Vous n'avez pas activé votre compte ! <h3>Veuillez vérifier votre courrier!</h3>";
            }
            if ($stat==0)
            {
                session_unset();
            $msg="Vous n'avez pas de compte!";
            } 
        }else{
            $stat=4;
            session_unset();

            $msg="Email erronée entrée..!";
            
        }
        header("location: error.php?msg=".$msg."&stat=".$stat."&mail=".$user."");
    }

include "../header.php";
?>


<?php include '../footer.php'; ?>