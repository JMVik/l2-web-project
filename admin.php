<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page qui permet d'effectuer toutes les commandes administratives.">
    <title>Administration</title>
    <link rel="icon" href="/favicon.ico"/>
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
    <link rel="stylesheet" href="assets/css/styleadmin.css">
    <script src="assets/js/admin_nav.js" defer></script>
    <script src="assets/js/verif_sub.js" defer></script>
</head>
<body>
    <header>
        <?php
            include("assets/templates/navigation.php");
        ?>
    </header>
    <?php if (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
        <main>
            <section>
                <ul>
                    <li><a href="#" onclick="loadTabContent('admin_nav1', 'event')"><?= $t['admin']['add_event'] ?></a></li>
                    <li><a href="#" onclick="loadTabContent('admin_nav2', 'event')"><?= $t['admin']['add_article'] ?></a></li>
                    <li><a href="#" onclick="loadTabContent('admin_nav3', 'event')"><?= $t['admin']['del_event'] ?></a></li>
                    <li><a href="#" onclick="loadTabContent('admin_nav4', 'event')"><?= $t['admin']['del_article'] ?></a></li>
                </ul>
            </section>
            <section><?= $t['admin']['select'] ?></section>
        </main>
        <footer>
            <?php
                include("assets/templates/foot.php");
            ?>
        </footer>
    <?php else : ?>
        <article>
            <p><?= $t['admin']['msg_noperm'] ?></p>
            <a href="index.php"><?= $t['admin']['link'] ?></a>
            <?php header("Refresh: 5; url=/../../../index.php"); ?>
        </article>
    <?php endif; ?>
</body>
</html>