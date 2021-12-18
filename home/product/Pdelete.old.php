<?php
include '../init.php';
if (isset($_POST['delete'])){
        $id = checkData($_POST['ID']);
        $image = "../uploads/".$_POST['image'];
        if (file_exists($image)){
            unlink($image);
            if (file_exists($image)){
                header('Location: ../error?err=delimage1');
            }
            else
            {
                $sql = "DELETE FROM product WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $run=$stmt->execute([
                    'id' => $id,
                ]);
              
                if (!$run){
                    header('Location: ../error?err=del');
                }
                header('Location: index.php');
            }
        }
        else{
            header('Location: ../error?err=delimage');
        }
        
        
}




?>