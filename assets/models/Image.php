<?php

require_once 'Database.php';

class Image extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->initTable();
    }

    private function initTable()
    {
        $this->pdo->query('CREATE TABLE IF NOT EXISTS image (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR(255) NOT NULL,
            type TEXT NOT NULL,
            data BLOB NOT NULL
        )');
    }

    public function createImage($name, $type, $data)
    {
        if (!empty($data)) {
        $stmt = $this->pdo->prepare("INSERT INTO image (name, type, data) VALUES (:name, :type, :data)");
        $stmt->bindValue(':name', htmlspecialchars($name));
        $stmt->bindValue(':type', htmlspecialchars($type));
        $stmt->bindParam(':data', $data, PDO::PARAM_LOB);
        $stmt->execute();
        }
    }

    public function getImageTypeData($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM image WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteImage($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM image WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $imageData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$imageData) {
            return false;
        }
        
        $stmt = $this->pdo->prepare('DELETE FROM image WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $imageFilePath = 'images/' . $imageData['name'];
        if (file_exists($imageFilePath)) {
            unlink($imageFilePath);
        }
        
        return true;
    }
}
