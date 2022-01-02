<?php


include_once'database.php';

class Category
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }
    //methode qui permet d'afficher les donnes de ma base
    /**
     * get all categories form my database
     * @return array
     */
    public function getAllCatgeories():array
    {
        $sql = " SELECT * FROM category ";
        $stmt =$this->pdo->prepareRequete($sql);
      
        $rows=$stmt->fetchAll();
        return $rows;

    }
    public function editCategorie(int $id, string $name, string $description){
        $sql = "UPDATE category SET name= :name,description= :description where id=:id";
        $stmt= $this->pdo->prepareRequete($sql,['id'=>$id, 'name' => $name,
            'description' => $description,
            ]);
           ;
    }
    
    public function addCategory(string $name, string $description){
        $sql = "INSERT INTO category(name,description) VALUES(:name,:description)";
        $stmt =$this->pdo->prepareRequete($sql, [
            'name' => $name,
            'description' => $description
        ]);
  
    }

    public function removeCategories ( int $id){
        $sql = "DELETE FROM category WHERE id = :id";
        $stmt = $this->pdo->prepareRequete($sql,[
            'id' => $id,
        ]);
      
    }
    


}
// Fetch category list



?>