<?php

session_start();

require_once dirname(__FILE__) . '/../extras/lang.php';

if( isset($_SESSION['user']['id']) && $_SESSION['user']['id'] !== null ) {
    session_destroy();
    header("Refresh: 5; url=/../../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page de déconnexion.">
    <title>Déconnexion</title>
    <link rel="stylesheet" href="/../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>
        <?php if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] !== null) : ?>
            <?= $t['logout']['msg_success'] ?>
            <a href='/../../index.php'><?= $t['logout']['link'] ?></a>
        <?php else : ?>
            <?= $t['logout']['msg_failure'] ?>
            <a href='/../../index.php'><?= $t['logout']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../index.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>