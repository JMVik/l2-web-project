<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="assets/css/stylesignin.css">
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
    <script src="assets/js/verif_signin.js" defer></script>
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
        <?= $t['signin']['msg_connected'] ?>
        <a href='index.php'><?= $t['signin']['link'] ?></a>
        <?php header("Refresh: 5; url=index.php"); ?>
        </b>
    </p>
    <?php else : ?>
    <main>
        <form method="post" action="/assets/extras/account_creation.php">
            <h1><?= $t['signin']['signin_form'] ?></h1>
            <label for="name"><b><?= $t['signin']['name'] ?></b></label>
            <input type="text" name="name" required>
            <p></p>
            <label for="email"><b><?= $t['signin']['email'] ?></b></label>
            <input type="email" name="email" id="email" required>
            <p></p>
            <label><b><?= $t['signin']['password'] ?></b></label>
            <input type="password" name="password" required>
            <p></p>
            <button type="submit"><b><?= $t['signin']['signin_button'] ?></b></button>
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