<?php

session_start();

require_once __DIR__ . '/../extras/lang.php';

require_once __DIR__ . "/../models/Newsletter.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errMsg = null;
    if (empty($_POST['emailsub'])) {
        $errMsg = $t['subscription']['msg_empty_email'];
    } else {
        $email = $_POST['emailsub'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 200 || !is_string($emailsub)) {
            $errMsg = $t['subscription']['msg_failure_email'];
        } else {
            $newsletter = new Newsletter();
            $news = $newsletter->createNewsUser($email);

            if ($news) {
                header("Refresh: 5; url=/../../index.php");
            }
            else {
                $errMsg = $t['subscription']['msg_email_exist'];
                header("Refresh: 5; url=/../../index.php");
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
    <meta name="description" content="Page d'inscription à la newsletter.">
    <title>Inscription Newsletter</title>
    <link rel="icon" href="/favicon.ico"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="/../../assets/css/styleextra.css">
</head>
<body>
    <p>
        <b>    
        <?php if ($news) : ?>
            <?= $t['subscription']['success'] ?>
            <?= $t['logout']['msg_redir'] ?>
        <?php else : ?>
            <?php echo $errMsg ?>
            <?= $t['subscription']['msg_redir'] ?>
            <a href='/../../index.php'><?= $t['subscription']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../index.php"); ?>
        <?php endif; ?>
        </b>
    </p>
</body>
</html>