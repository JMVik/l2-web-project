<?php

session_start();

require_once __DIR__ . '/../extras/lang.php';

require_once __DIR__ . '/../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['email'])) {
        $errMsg = $t['account_connection']['msg_empty_email'];
    }
    if (empty($_POST['password'])) {
        $errMsg .= $t['account_connection']['msg_empty_password'];
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 200) {
            $errMsg = $t['account_connection']['msg_failure_email'];
        }
        if (strlen($password) < 6 || strlen($password) > 100) {
            $errMsg .= $t['account_connection']['msg_failure_mdp'];
        } else {
            $user = new User();

            $emailExist = $user->checkEMailUnique($email);
    
            if ($emailExist) {
                $loggedInUser = $user->loginUser($email, $password);
                if ($loggedInUser) {
                    $_SESSION['user'] = $loggedInUser;
                    header("Refresh: 5; url=/../../dashboard.php");
                } else {
                    $errMsg = $t['account_connection']['msg_failure_mdp_co'];
                }
            } else {
                $errMsg = $t['account_connection']['msg_failure_email_co'];
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
    <meta name="description" content="Page de connexion à un compte.">
    <title>Connexion au compte</title>
    <link rel="icon" href="/favicon.ico"/>
    <link rel="stylesheet" href="/../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>
        <?php if ($loggedInUser) : ?>
            <?= $t['account_connection']['msg_success'] ?>
            <a href='/../../login.php'><?= $t['account_connection']['linkdash'] ?></a>
        <?php else : ?>
            <?php echo $errMsg ?>
            <?= $t['add_event']['msg_redir_fail'] ?>
            <a href='/../../signin.php'><?= $t['account_connection']['linklog'] ?></a>
            <?php header("Refresh: 10; url=/../../login.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>