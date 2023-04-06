<?php

require_once 'assets/models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = new User();
    $user->createUser($email, $password);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/stylelogin.css">
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
    <script src="assets/js/verif_form.js" defer></script>
    <script src="assets/js/signin_form.js" defer></script>
</head>
<body>
    <header>
        <?php
            include("assets/templates/navigation.php");
        ?>
    </header>
    <main>
        <form method="post" action="signin.php">
            <h1><?= $t[$_GET['lang']]['signin_form'] ?></h1>
            <label for="email"><b><?= $t[$_GET['lang']]['email'] ?></b></label>
            <input type="email" required>
            <p></p>
            <label><b>Mot de passe</b></label>
            <input type="password" required>
            <p></p>
            <button type="submit"><b><?= $t[$_GET['lang']]['signin'] ?></b></button>
        </form>
    </main>
    <footer>
        <?php
            include("assets/templates/foot.php");
        ?>
    </footer>
</body>
</html>