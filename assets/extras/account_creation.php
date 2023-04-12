<?php

session_start();

require_once __DIR__ . '/../extras/lang.php';

require_once __DIR__ . '/../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['name'])) {
        $errMsg = $t['account_creation']['msg_empty_name'];
    }
    if (empty($_POST['email'])) {
        $errMsg .= $t['account_creation']['msg_empty_email'];
    }
    if (empty($_POST['password'])) {
        $errMsg .= $t['account_creation']['msg_empty_password'];
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (strlen($name) < 2 || strlen($name) > 100) {
            $errMsg = $t['account_creation']['msg_failure_name'];
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 200) {
            $errMsg .= $t['account_creation']['msg_failure_email'];
        }
        if (strlen($password) < 6 || strlen($password) > 100) {
            $errMsg .= $t['account_creation']['msg_failure_mdp'];
        } else {
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
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page de création de compte.">
    <title>Création du compte</title>
    <link rel="icon" href="/favicon.ico"/>
    <link rel="stylesheet" href="/../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>
        <?php if ($user) : ?>
            <?= $t['account_creation']['msg_success'] ?>
            <a href='/../../login.php'><?= $t['account_creation']['linklog'] ?></a>
        <?php elseif ($emailUnique > 0) : ?>
            <?= $t['account_creation']['msg_email_exist'] ?>
            <?= $t['account_creation']['msg_redir_fail'] ?>
            <a href='/../../signin.php'><?= $t['account_creation']['linksign'] ?></a>
        <?php else : ?>
            <?php echo $errMsg ?>
            <?= $t['account_creation']['msg_redir_fail'] ?>
            <a href='/../../signin.php'><?= $t['account_creation']['linksign'] ?></a>
            <?php header("Refresh: 10; url=/../../signin.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>