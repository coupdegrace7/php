<?php

class Database
{
    private $host = '127.0.0.1'; 
    private $dbName = 'test_db';
    private $username = 'root'; 
    private $password = ''; 
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbName};charset=utf8",
                $this->username,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }

    public function getAllUsers()
    {
        $sql = "SELECT id, name, email FROM users";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}

try {
    $db = new Database();
    $users = $db->getAllUsers();
    
    foreach ($users as $user) {
        echo "ID: {$user['id']}, Name: {$user['name']}, Email: {$user['email']}<br>";
    }
} catch (Exception $e) {
    echo "Произошла ошибка: " . $e->getMessage();
}

