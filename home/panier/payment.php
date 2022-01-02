<?php 
session_start();
include '../init.php';
if(!isset($_SESSION['mycart']) || empty($_SESSION['mycart']) || !isset($_SESSION['id']) || empty($_SESSION['id']))
    {
        header('location:index.php');
        exit();
    }
$cartItemCount = count($_SESSION['mycart']);
$done=0;
if(isset($_GET['submit']))
    {
        $sql = " INSERT INTO `order` (`clientId`, `approved`, `adminId`, `approvalDate`, `orderDate`) VALUES (:id, NULL, NULL,NULL,:date) ";
        $stmt = $pdo->prepare($sql);
        $id=$_SESSION['id'];
        $res=$stmt->execute([
            "id" => $id,
            "date" => date("Y-m-d H:i:s")
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
                        if (sendFacture()){
                            echo "test";
                            unset($_SESSION['mycart']);
                            $_SESSION['confirm_order'] = true;
                            header('location:../thank-you.html');
                            $done=1;
                            exit();
                        }
                    }
                }
                else
                {
                    $errorMsg[] = 'Unable to save your order. Please try again';
                }
           }
        
    
?>