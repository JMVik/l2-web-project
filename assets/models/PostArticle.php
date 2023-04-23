<?php

require_once 'Database.php';
require_once 'Image.php';

class PostArticle extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->initTable();
    }

    private function initTable()
    {
        $this->pdo->query('CREATE TABLE IF NOT EXISTS postarticle(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title VARCHAR(100) NOT NULL,
            content TEXT(600) NOT NULL,
            imageid INTEGER,
            FOREIGN KEY (imageid) REFERENCES image(id)
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

    public function createPost(string $title, string $content, int $imageid)
    {
        if ($this->checkTitle($title) && $this->checkContent($content)) {
            $stmt = $this->pdo->prepare("INSERT INTO postarticle ('title', 'content', 'imageid') VALUES (:title, :content, :imageid)");
            $stmt->bindValue(':title', htmlspecialchars($title));
            $stmt->bindValue(':content', htmlspecialchars($content));
            $stmt->bindValue(':imageid', $imageid);
            $stmt->execute();
        }
    }

    public function getPost(int $id)
    {
        $stmt = $this->pdo->prepare('SELECT p.*, i.data FROM postarticle p LEFT JOIN image i ON p.imageid = i.id WHERE p.id=:identifiant');
        $stmt->bindValue(':identifiant', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getPosts()
    {
        return $this->pdo->query('SELECT p.*, i.data FROM postarticle p LEFT JOIN image i ON p.imageid = i.id ORDER BY p.id DESC')
                         ->fetchAll();
    }

    public function getArticles(int $limit, int $offset)
{
    $stmt = $this->pdo->prepare('SELECT p.*, i.data FROM postarticle p LEFT JOIN image i ON p.imageid = i.id ORDER BY p.id DESC LIMIT :limit OFFSET :offset');
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}

    public function getEventId($postId)
    {
        $stmt = $this->pdo->prepare("SELECT id FROM postarticle WHERE id = :id");
        $stmt->bindValue(':id', $postId);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result === false) {
            return null;
        }
        
        return $result['id'];
    }

    public function getImageId($postId)
    {
        $stmt = $this->pdo->prepare("SELECT imageid FROM postarticle WHERE id = :id");
        $stmt->bindValue(':id', $postId, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result === false) {
            return null;
        }
        
        return $result['imageid'];
    }

    public function getCount()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) as count FROM postarticle");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }

    public function deletePostArticle($postId)
    {
        $imageId = $this->getImageId($postId);
        if ($imageId) {
            $image = new Image();
            $image->deleteImage($imageId);
        }

        $stmt = $this->pdo->prepare("DELETE FROM postarticle WHERE id = :id");
        $stmt->bindValue(':id', $postId, PDO::PARAM_INT);
        $stmt->execute();
    }
}
