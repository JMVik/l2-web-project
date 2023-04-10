<?php

session_start();

require_once 'langadmin.php';

require_once __DIR__ . '/../../models/PostArticle.php';
require_once __DIR__ . '/../../models/Image.php';

$postarticle = new PostArticle();
$image = new Image();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['image']) && isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) {
    $name = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $data = file_get_contents($_FILES['image']['tmp_name']);

    $image->createImage($name, $type, $data);

    $image_id = $image->getPDO()->lastInsertId();

    $postarticle->createPost($_POST['title'], $_POST['content'], $image_id);

    header("Refresh: 5; url=/../../../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Article</title>
    <link rel="stylesheet" href="/../../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['image']) && isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
            <?= $t['add_article']['msg_success'] ?>
            <a href='/../../../index.php'><?= $t['add_article']['link'] ?></a>
        <?php elseif (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
            <?= $t['add_article']['msg_failure'] ?>
            <a href='/../../../index.php'><?= $t['add_article']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../../index.php"); ?>
        <?php else : ?>
            <?= $t['add_article']['msg_noperm'] ?>
            <a href='/../../../index.php'><?= $t['add_article']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../../index.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>