<?php

session_start();

require_once dirname(__FILE__) . '/../extras/lang.php';

require_once dirname(__FILE__) . "/../models/Newsletter.php";

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $newsletter = new Newsletter();
    $news = $newsletter->createNewsUser($email);

    header("Refresh: 5; url=/../../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page d'inscription à la newsletter.">
    <title>Inscription Newsletter</title>
    <link rel="stylesheet" href="/../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>    
        <?php if (isset($_POST['email'])) : ?>
            <?php if ($news) : ?>
                <?= $t['subscription']['success'] ?>
            <?php else : ?>
                <?= $t['subscription']['failure_email'] ?>
            <?php endif; ?>
                <a href='/../../index.php'><?= $t['subscription']['link'] ?></a>
        <?php else : ?>
            <?= $t['subscription']['failure'] ?>
            <a href='/../../index.php'><?= $t['subscription']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../index.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>