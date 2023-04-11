<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page affichant le profil.">
    <title>Profil</title>
    <link rel="stylesheet" href="assets/css/styledash.css">
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
    <script src="assets/js/verif_sub.js" defer></script>
</head>
<body>
    <header>
        <?php
            include("assets/templates/navigation.php");
        ?>
    </header>
    <?php if (isset($_SESSION['user']['id'])) : ?>
    <main>
        <section>
            <article>
                <img src="assets/img/avatar.png" alt="Avatar">
                <h2><?php echo $_SESSION['user']['name'] ?></h2>
            </article>
            <article>
                <p><b><?= $t['dash']['email'] ?>: </b><?php echo $_SESSION['user']['email'] ?></p>
                <?php if ($_SESSION['user']['isadmin']) : ?>
                <a href="admin.php"><b><?= $t['nav']['admin'] ?></b></a>
                <?php endif; ?>
                <a href="assets/extras/logout.php"><b><?= $t['nav']['disconnect'] ?></b></a>
            </article>
        </section>
    </main>
    <footer>
        <?php
            include("assets/templates/foot.php");
        ?>
    </footer>
    <?php else : ?>
    <p>
        <b>
        <?= $t['dash']['msg_noconnected'] ?>
        <a href='index.php'><?= $t['dash']['link'] ?></a>
        <?php header("Refresh: 5; url=login.php"); ?>
        </b>
    </p>
    <?php endif; ?>
</body>
</html>