<?php

session_start();

require_once 'langadmin.php';

require_once __DIR__ . '/../../models/PostArticle.php';
require_once __DIR__ . '/../../models/Image.php';

if (isset($_POST['delete']) && isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) {
    $postId = $_POST['id'];

    $postarticle = new PostArticle();
    $image = new Image();

    $imageId = $postarticle->getImageId($postId);

    $postarticle->deletePostArticle($postId);

    if ($imageId !== null) {
        $image->deleteImage($imageId);
    }

    header("Refresh: 5; url=/../../../index.php"); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression Article</title>
    <link rel="stylesheet" href="/../../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>
        <?php if (isset($_POST['delete']) && isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
        <?= $t['del_article']['msg_success'] ?>
        <a href='/../../../index.php'><?= $t['del_article']['link'] ?></a>
        <?php elseif (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
        <?= $t['del_article']['msg_failure'] ?>
        <a href='/../../../index.php'><?= $t['del_article']['link'] ?></a>
        <?php header("Refresh: 5; url=/../../../index.php"); ?>
        <?php else : ?>
        <?= $t['del_article']['msg_noperm'] ?>
        <a href='/../../../index.php'><?= $t['del_article']['link'] ?></a>
        <?php header("Refresh: 5; url=/../../../index.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>