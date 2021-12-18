<?php
function categoryName($id){
  global $pdo;
    $sql = "SELECT name FROM category WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'id' => $id,
            ]);
    return $stmt->fetch(PDO::FETCH_ASSOC)['name'];
  }
  function customerDetails($id){
    global $pdo;
      $sql = "SELECT * FROM clients WHERE id=:id";
              $stmt = $pdo->prepare($sql);
              $stmt->execute([
                  'id' => $id,
              ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function getTotal($id){
      global $pdo;
        $sql = "SELECT a.quantity*b.price as total FROM cart a 
          JOIN product b on (a.productId=b.ID)
          WHERE orderId=:id
        ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'id' => $id,
                ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
      }
  function checkData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function getCategories(){

  global $pdo;
  $sql = "SELECT * FROM category";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function getProductId($id){
  global $pdo;
  $sql = " SELECT * FROM product WHERE id=:id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
  "id" => $id,
  ]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);
  return $row;
}
?>