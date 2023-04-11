<?php

session_start();

require_once 'langadmin.php';

require_once __DIR__ . '/../../models/PostEvent.php';
require_once __DIR__ . '/../../models/Image.php';

if (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) {
    if (isset($_POST['delete'])) {
        $postId = $_POST['id'];
    
        $postevent = new PostEvent();
        $image = new Image();
    
        $imageId = $postevent->getImageId($postId);
    
        $postevent->deletePostEvent($postId);
    
        if ($imageId !== null) {
            $image->deleteImage($imageId);
        }
    
        header("Refresh: 5; url=/../../../index.php"); 
    }
} else {
    header("Refresh: 5; url=/../../../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page de suppression d'un événement.">
    <title>Suppression Evénement</title>
    <link rel="stylesheet" href="/../../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>
        <?php if (isset($_POST['delete']) && isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
            <?= $t['del_event']['msg_success'] ?>
            <a href='/../../../index.php'><?= $t['del_event']['link'] ?></a>
        <?php elseif (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
            <?= $t['del_event']['msg_failure'] ?>
            <a href='/../../../index.php'><?= $t['del_event']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../../index.php"); ?>
        <?php else : ?>
            <?= $t['del_event']['msg_noperm'] ?>
            <a href='/../../../index.php'><?= $t['del_event']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../../index.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>