<?php 
session_start();
include 'db.php';
if(!isset($_SESSION['mycart']) || empty($_SESSION['mycart']) || !isset($_SESSION['id']) || empty($_SESSION['id']))
    {
        header('location:index.php');
        exit();
    }
$cartItemCount = count($_SESSION['mycart']);


if(isset($_GET['submit']))
    {
        $sql = " INSERT INTO `order` (`clientId`, `approved`, `adminId`) VALUES (:id, NULL, NULL) ";
        $stmt = $pdo->prepare($sql);
        $id=$_SESSION['id'];
        $res=$stmt->execute([
            "id" => $id
        ]);
        $last_id =$pdo->lastInsertId();
                if($res)
                {
                    if(isset($_SESSION['mycart']) || !empty($_SESSION['mycart']))
                    {
                        $sql = " insert into cart (`productId`, `clientId`, `orderId`, `quantity`) values(:pid,:cid,:oid,:qte)";
        $stmt = $pdo->prepare($sql);
                        foreach($_SESSION['mycart'] as $item=>$val)
                        {
                            $res=$stmt->execute([
                                "pid"=>$item,
                                "cid"=>$id,
                                "oid"=>$last_id,
                                "qte"=>$val,
                            ]);
                        }
                        unset($_SESSION['mycart']);
                        $_SESSION['confirm_order'] = true;
                        header('location:thank-you.php');
                        exit();
                    }
                }
                else
                {
                    $errorMsg[] = 'Unable to save your order. Please try again';
                }
           }
        
    
?>