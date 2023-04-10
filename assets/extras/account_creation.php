<?php

session_start();

require_once dirname(__FILE__) . '/../extras/lang.php';

require_once dirname(__FILE__) . "/../models/User.php";

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();

    $emailUnique = $user->checkEMailUnique($email);

    if ($emailUnique > 0){
        $user = null;
        header("Refresh: 10; url=/../../signin.php");
    } else {
        $user->createUser($name, $email, $password);
        header("Refresh: 5; url=/../../login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création du compte</title>
    <link rel="stylesheet" href="/../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>
        <?php if (isset($_POST['email']) && isset($_POST['password'])) : ?>
            <?php if ($user) : ?>
            <?= $t['account_creation']['msg_success'] ?>
            <a href='/../../login.php'><?= $t['account_creation']['linklog'] ?></a>
            <?php else : ?>
            <?= $t['account_creation']['msg_failure_email'] ?>
            <a href='/../../signin.php'><?= $t['account_creation']['linksign'] ?></a>
            <?php endif; ?>
        <?php else : ?>
        <?= $t['account_creation']['msg_failure'] ?>
        <a href='/../../signin.php'><?= $t['account_creation']['linklog'] ?></a>
        <?php header("Refresh: 5; url=/../../login.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>