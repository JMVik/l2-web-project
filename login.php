<?php

$langueNavigateur = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        parse_str($_SERVER['QUERY_STRING'], $params);
        if (!isset($params['lang'])) {
            header('Location: ' . $_SERVER['QUERY_STRING'] . '?lang=' . $langueNavigateur);
            exit();
        }

require_once 'assets/models/User.php';

session_start();

$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loggedInUser = $user->loginUser($email, $password);

    if ($loggedInUser) {
        $_SESSION['user'] = $loggedInUser;
        http_response_code(200);
    } else {
        http_response_code(401);
    }
} else {
    http_response_code(400);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de connexion</title>
    <script src="assets/js/verif_form.js" defer></script>
    <script src="assets/js/login_form.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/stylelogin.css">
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
</head>
<body>
    <header>
        <?php
            include("assets/templates/navigation.php");
        ?>
    </header>
    <main>
        <form method="post" action="login.php">
            <h1><?= $t[$_GET['lang']]['login_form'] ?></h1>
            <label for="email"><b><?= $t[$_GET['lang']]['email'] ?></b></label>
            <input id="email" type="email">
            <p></p>
            <label><b>Mot de passe</b></label>
            <input type="password" id="password">
            <p></p>
            <button type="submit" name="submit"><b><?= $t[$_GET['lang']]['login'] ?></b></button>
        </form>
        <?php if (isset($errorMessage)): ?>
        <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </main>
    <footer>
        <?php
            include("assets/templates/foot.php");
        ?>
    </footer>
</body>
</html>