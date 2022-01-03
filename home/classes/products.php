<?php

include_once 'database.php';

class products{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }
    function getProducts(){
    $sql = " SELECT * FROM product ";
    $stmt= $this->pdo->prepareRequete($sql);
    $rows1=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows1;
    }
    public function create(string $name, string $description, float $price , string $fileName,int $category)
    {
        $sql = "INSERT INTO product(name,description,price,image,category) VALUES(:name,:description,:price,:image,:category)";
        $stmt= $this->pdo->prepareRequete($sql,[ 'name' => $name,
        'description' => $description,
        'price' => $price,
        'image' => $fileName,
        'category' => $category]);
       ;
    }
    public function remove(int $id): void
    {
        $sql = 'DELETE FROM product WHERE id = :id';
        $this->pdo->prepareRequete($sql, ['id' => $id]);
    }
    public  function updateProduct(int $id,string $name, string $description, float $price , string $fileName){
    $sql = "UPDATE product SET name= :name,description= :description,price=:price,image=:image where id=:id";
    $stmt= $this->pdo->prepareRequete($sql,['id'=>$id,'name' => $name,
        'description' => $description,
        'price' => $price,
        'image' => $fileName]);
       ;
}
    public  function updateProductNoImg(int $id,string $name, string $description, float $price ){
    $sql = "UPDATE product SET name= :name,description= :description,price=:price where id=:id";
    $stmt= $this->pdo->prepareRequete($sql,['id'=>$id,'name' => $name,
        'description' => $description,
        'price' => $price]);
    ;
}
}


?>