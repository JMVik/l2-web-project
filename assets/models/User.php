<?php

require_once 'Database.php';

class User extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->initTable();
    }

    private function initTable()
    {
        $this->pdo->query('CREATE TABLE IF NOT EXISTS user (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email VARCHAR(200) NOT NULL UNIQUE,
            password VARCHAR(50) NOT NULL
        )');
    }

    public function getUsers()
    {
        return $this->pdo->query('SELECT * FROM user')
                         ->fetchAll();
    }

    public function createUser(string $email, string $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO user ('email', 'password') VALUES (:email, :password)");
        $stmt->bindValue(':email', htmlspecialchars($email));
        $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
        $stmt->execute();
    }
}
