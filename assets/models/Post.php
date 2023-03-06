<?php

require_once 'Database.php';

class Post extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->initTable();
    }

    private function initTable()
    {
        $this->pdo->query('CREATE TABLE IF NOT EXISTS post(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL
        )');
    }

    private function checkTitle(string $title): bool
    {
        return $title !== '' && strlen($title) <= 255;
    }

    private function checkContent(string $content): bool
    {
        return $content !== '';
    }

    public function createPost(string $title, string $content)
    {
        if ($this->checkTitle($title) && $this->checkContent($content)) {
            $stmt = $this->pdo->prepare("INSERT INTO post ('title', 'content') VALUES (:title, :content)");
            $stmt->bindValue(':title', htmlspecialchars($title));
            $stmt->bindValue(':content', htmlspecialchars($content));
            $stmt->execute();
        }
    }

    public function getPost(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM post WHERE id=:identifiant');
        $stmt->bindValue(':identifiant', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getPosts()
    {
        return $this->pdo->query('SELECT * FROM post')
                         ->fetchAll();
    }
}
