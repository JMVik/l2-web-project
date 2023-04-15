<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page permettant de créer un compte.">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'inscription</title>
    <link rel="icon" href="/favicon.ico"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="assets/css/stylesignup.css">
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
    <script src="assets/js/verif_signup.js" defer></script>
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
        <?= $t['signup']['msg_connected'] ?>
        <a href='index.php'><?= $t['signup']['link'] ?></a>
        <?php header("Refresh: 5; url=index.php"); ?>
        </b>
    </p>
    <?php else : ?>
    <main>
        <form method="post" action="/assets/extras/account_creation.php">
            <h1><?= $t['signup']['signup_form'] ?></h1>
            <label><b><?= $t['signup']['name'] ?></b>
            <input type="text" name="name" >
            </label>
            <p></p>
            <label><b><?= $t['signup']['email'] ?></b>
            <input type="email" name="email" >
            </label>
            <p></p>
            <label><b><?= $t['signup']['password'] ?></b>
            <input type="password" name="password" >
            </label>
            <p></p>
            <button type="submit"><b><?= $t['signup']['signup_button'] ?></b></button>
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