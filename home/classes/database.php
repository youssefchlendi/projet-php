<?php

class database extends PDO{
    const DB_HOST = 'localhost';
    const DB_NAME = 'food';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

public function __construct()
    {
        $dsn = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME;
        try {
            
            parent::__construct($dsn, self::DB_USER, self::DB_PASSWORD);
            $this-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->query('SET NAMES UTF8');
            // echo 'Connected to database';
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
    /**
     * @param requeteSQL
     * @param array or null
     */
    public function prepareRequete(string $sql, array $params = []): PDOStatement
    {
        $stmt = parent::prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

}

?>