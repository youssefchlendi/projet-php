<?php

include_once 'dataBase.php';

class Product
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new dataBase();
    }


    /**
     * Get all products
     *
     * @return array $producs
     */
    public function getAll(): array
    {
        $sql = 'SELECT * FROM product ';
        $query = $this->pdo->launchQuery($sql);
        return $query->fetchAll();
    }
     /**
     * Get a product by id
     *
     * @param int $id
     * @return array $product
     */
    public function get(int $id): array
    {
        $sql = 'SELECT * FROM product WHERE id = :id';
        $query = $this->pdo->launchQuery($sql, ['id' => $id]);
        return $query->fetch();
    }
    /**
     * Create a new product
     *
     * @param string $name
     * @param string $description
     * @param int $princee
     * @param string $image
     * @param int $category
     * @return int $id
     */
    public function create(string $name, string $description, int $price, string $image, int $category): int
    {
        $sql = "INSERT INTO product(name,description,price,image,category) VALUES(:name,:description,:price,:image,:category)";
        $this->pdo->launchQuery($sql, [
            "name" => $name,
            "description" => $description, 
            "price" => $price,
            "image" => $image,
            "category" => $category
        ]);
        return $this->pdo->lastInsertId();
    }
    /**
     * Update a todo
     * 
     * @param string $name
     * @param string $description
     * @param int $princee
     * @param string $image
     * @param int $category
     * @return void
     */
    public function edit(string $title, string $due_date, string $description, int $id): void
    {
        $sql = "UPDATE todos 
                SET
                    title = ?,
                    description = ?,
                    due_date = ?
                WHERE id = ?";
        $this->pdo->launchQuery($sql, [$title, $description, $due_date, $id]);
    }

}