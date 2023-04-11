<?php

session_start();

require_once 'langadmin.php';

require_once __DIR__ . '/../../models/PostEvent.php';
require_once __DIR__ . '/../../models/Image.php';
require_once __DIR__ . '/../../models/Newsletter.php';

$postevent = new PostEvent();
$image = new Image();
$news = new Newsletter();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['image']) && isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) {
    $name = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $data = file_get_contents($_FILES['image']['tmp_name']);

    $image->createImage($name, $type, $data);

    $image_id = $image->getPDO()->lastInsertId();

    $postevent->createPost($_POST['title'], $_POST['content'], $image_id);

    $sujet = $_POST['title'];
    $message = '<html><body>';
    $message .= "<h1>Bonjour, un nouvel événement vient d'être annoncé !</h1>";
    $message .= "<p>N'hésitez pas à venir !</p>";
    $message .= '</body></html>';
    $news->sendNews($sujet, $message);

    header("Refresh: 5; url=/../../../index.php");  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page d'ajout d'un événement.">
    <title>Ajout Evénement</title>
    <link rel="stylesheet" href="/../../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['image']) && isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
            <?= $t['add_event']['msg_success'] ?>
            <a href='/../../../index.php'><?= $t['add_event']['link'] ?></a>
        <?php elseif (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
            <?= $t['add_event']['msg_failure'] ?>
            <a href='/../../../index.php'><?= $t['add_event']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../../index.php"); ?>
        <?php else : ?>
            <?= $t['add_event']['msg_noperm'] ?>
            <a href='/../../../index.php'><?= $t['add_event']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../../index.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>