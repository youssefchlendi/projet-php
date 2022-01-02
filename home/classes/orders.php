<?php

include_once 'database.php';

class orders{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }
    function getOrders(){
        $sql = " SELECT * FROM `order` ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    function getOrdersById(int $id){
        $sql = " SELECT * FROM `order` where clientId=:id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function remove(int $id): void
    {
        $sql = 'DELETE FROM `order` WHERE id = :id';
        $this->pdo->prepareRequete($sql, ['id' => $id]);
    }
    public  function updateOrder(int $id,int $approved, string $d){
    $sql = "UPDATE `order` SET `approved` = :approved,`approvalDate`=:date WHERE `ID` = :id; ";  
    $stmt= $this->pdo->prepareRequete($sql,[
        'id' => $id,
        'approved' =>$approved,
        'date' =>$d
      ]);
}
    
}


?>