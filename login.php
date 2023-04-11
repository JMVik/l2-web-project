<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="assets/css/stylelogin.css">
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
    <script src="assets/js/verif_login.js" defer></script>
    <script src="assets/js/verif_sub.js" defer></script>
</head>
<body>
    <header>
        <?php
            include("assets/templates/navigation.php");
        ?>
    </header>
    <?php if (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
    <p>
        <b>
        <?= $t['login']['msg_connected'] ?>
        <a href='index.php'><?= $t['msg']['link'] ?></a>
        <?php header("Refresh: 5; url=index.php"); ?>
        </b>
    </p>
    <?php else : ?>
    <main>
        <form method="post" action="/assets/extras/account_connection.php">
            <h1><?= $t['login']['login_form'] ?></h1>
            <label for="email"><b><?= $t['login']['email'] ?></b></label>
            <input type="email" name="email">
            <p></p>
            <label><b><?= $t['login']['password'] ?></b></label>
            <input type="password" name="password">
            <p></p>
            <button type="submit" name="submit"><b><?= $t['login']['login_button'] ?></b></button>
        </form>
    </main>
    <footer>
        <?php
            include("assets/templates/foot.php");
        ?>
    </footer>
    <?php endif; ?>
</body>
</html>
