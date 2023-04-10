<?php

session_start();

require_once dirname(__FILE__) . '/../extras/lang.php';

require_once dirname(__FILE__) . "/../models/User.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();

    $emailExist = $user->checkEMailUnique($email);

    if ($emailExist) {
        $loggedInUser = $user->loginUser($email, $password);
        if ($loggedInUser) {
            $_SESSION['user'] = $loggedInUser;
            header("Refresh: 5; url=/../../dashboard.php");
        } else {
            header("Refresh: 10; url=/../../login.php");
        }
    } else {
        header("Refresh: 10; url=/../../login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion au compte</title>
    <link rel="stylesheet" href="/../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>
        <?php if (isset($_POST['email']) && isset($_POST['password'])) : ?>
            <?php if ($loggedInUser && $emailExist) : ?>
                <?= $t['account_connection']['msg_success'] ?>
                <a href='/../../login.php'><?= $t['account_connection']['linkdash'] ?></a>
            <?php elseif ($emailExist) : ?>
                <?= $t['account_connection']['msg_failure_mdp'] ?>
                <a href='/../../signin.php'><?= $t['account_connection']['linklog'] ?></a>
            <?php else : ?>
                <?= $t['account_connection']['msg_failure_email'] ?>
                <a href='/../../signin.php'><?= $t['account_connection']['linklog'] ?></a>
            <?php endif; ?>
        <?php else : ?>
            <?= $t['account_connection']['msg_failure'] ?>
            <a href='/../../signin.php'><?= $t['account_connection']['linklog'] ?></a>
            <?php header("Refresh: 5; url=/../../login.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>