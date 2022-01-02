<?php
include_once 'database.php';



class client {

    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }


    public function getClients(){
        $sql = "SELECT * FROM clients ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;

    } 
     public function EditCompte(string $name,string $mail,string $password, string $adresse, string $phone){
       $sql = "UPDATE clients SET name= :name,email= :email,password= :password,adresse=:adresse,phone=:phone where id=:id";
        $stmt = $this->pdo->prepare($sql);
        $run=$stmt->execute([
            'name' => $name,
            'email' => $mail,
            'password' => $password,
            'adresse' => $adresse,
        'phone' => $phone,
            
        ]);
     }
    }



?>