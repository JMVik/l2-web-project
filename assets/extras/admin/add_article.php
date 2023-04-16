<?php

session_start();

require_once 'langadmin.php';

require_once __DIR__ . '/../../models/PostArticle.php';
require_once __DIR__ . '/../../models/Image.php';

$postarticle = new PostArticle();
$image = new Image();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) {
    $errMsg = null;
    if (empty($_POST['title'])) {
        $errMsg = $t['add_article']['msg_empty_title'];
    }
    if (empty($_POST['image'])) {
        $errMsg .= $t['add_article']['msg_empty_img'];
    }
    if (empty($_POST['content'])) {
        $errMsg .= $t['add_article']['msg_empty_content'];
    } else {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $allowed_ext = array('png', 'jpg', 'jpeg', 'gif');
        $img_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        if (strlen($title) < 2 || strlen($title) > 100 || !is_string($title)) {
            $errMsg = $t['add_article']['msg_failure_title'];
        } if (!in_array($img_ext, $allowed_ext)) {
            $errMsg .= $t['add_article']['msg_failure_img'];
        } if (strlen($content) < 2 || strlen($content) > 300 || !is_string($content)) {
            $errMsg .= $t['add_article']['msg_failure_content'];
        } else {
            $name = $_FILES['image']['name'];
            $type = $_FILES['image']['type'];
            $data = file_get_contents($_FILES['image']['tmp_name']);

            $image->createImage($name, $type, $data);

            $image_id = $image->getPDO()->lastInsertId();

            $postarticle->createPost($_POST['title'], $_POST['content'], $image_id);

            header("Refresh: 5; url=/../../../index.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page d'ajout d'un article.">
    <title>Ajout Article</title>
    <link rel="icon" href="/favicon.ico"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="/../../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>
        <?php if ((strlen($title) >= 2 && strlen($title) <= 100) && (strlen($content) >= 2 && strlen($content) <= 100) && (in_array($img_ext, $allowed_ext)) && isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
            <?= $t['add_article']['msg_success'] ?>
            <a href='/../../../index.php'><?= $t['add_article']['link'] ?></a>
        <?php elseif (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
            <?php echo $errMsg ?>
            <?= $t['add_article']['msg_redir_fail'] ?>
            <a href='/../../../index.php'><?= $t['add_article']['link'] ?></a>
            <?php header("Refresh: 10; url=/../../../index.php"); ?>
        <?php else : ?>
            <?= $t['add_article']['msg_noperm'] ?>
            <a href='/../../../index.php'><?= $t['add_article']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../../index.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>