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
            name VARCHAR(100) NOT NULL,
            email VARCHAR(200) NOT NULL UNIQUE,
            password VARCHAR(100) NOT NULL,
            isadmin BOOLEAN NOT NULL DEFAULT 0
        )');
    }

    public function getUsers()
    {
        return $this->pdo->query('SELECT * FROM user')
                         ->fetchAll();
    }

    public function checkEMailUnique(string $email)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as count FROM user WHERE email = :email");
        $stmt->bindValue(':email', htmlspecialchars($email));
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_NUM);

        return $result[0];
    }

    public function createUser(string $name, string $email, string $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO user ('name', 'email', 'password') VALUES (:name, :email, :password)");
        $stmt->bindValue(':name', htmlspecialchars($name));
        $stmt->bindValue(':email', htmlspecialchars($email));
        $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
        $stmt->execute();
    }

    public function loginUser(string $email, string $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindValue(':email', htmlspecialchars($email));
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
