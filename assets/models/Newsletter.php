<?php

require_once 'Database.php';

class Newsletter extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->initTable();
    }

    private function initTable()
    {
        $this->pdo->query('CREATE TABLE IF NOT EXISTS newsletter (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email VARCHAR(200) NOT NULL UNIQUE
        )');
    }

    public function createNewsUser(string $email)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM newsletter WHERE email = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $newsletter = $stmt->fetchColumn();

        if ($newsletter > 0) {
            return false;
        } else {
            $stmt = $this->pdo->prepare('INSERT INTO newsletter (email) VALUES (:email)');
            $stmt->bindValue(':email', htmlspecialchars($email));
            return $stmt->execute();
        }
    }

    public function sendNews(string $sujet, string $message)
    {
        $stmt = $this->pdo->query('SELECT email FROM newsletter');

        while ($row = $stmt->fetch()) {
            $email = $row['email'];

            $headers = 'From: jimmytouss@hotmail.fr';

            mail($email, $sujet, $message, $headers);
        }
    }
}