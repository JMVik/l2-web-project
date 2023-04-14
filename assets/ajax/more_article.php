<?php

require_once __DIR__ . "/../models/PostArticle.php";
require_once __DIR__ . "/../models/Image.php";

$limit = $_GET['limit'] ?? 3;
$offset = $_GET['offset'] ?? 0;

$postArticle = new PostArticle();
$posts = $postArticle->getArticles($limit, $offset);

$data = [];

foreach ($posts as $post) {
    $imageData = null;

    $imageId = $post['imageid'];
    if ($imageId !== null) {
        $image = new Image();
        $imageData = $image->getImage($imageId)['data'];
        $imageType = $image->getImage($imageId)['type'];
    }

    $data[] = [
        'id' => $post['id'],
        'title' => $post['title'],
        'content' => $post['content'],
        'imagedata' => $imageData,
        'imagetype' => $imageType
    ];
}

header('Content-Type: application/json');
echo json_encode($data);