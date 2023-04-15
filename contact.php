<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page donnant les informations pour contacter l'association.">
    <title>Contact</title>
    <link rel="icon" href="/favicon.ico"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
    <link rel="stylesheet" href="assets/css/stylecontact.css">
    <script src="assets/js/verif_sub.js" defer></script>
</head>
<body>
    <header>
        <?php
            include("assets/templates/navigation.php");
        ?>
    </header>
    <main>
        <h1><?= $t['contact']['title'] ?></h1>
        <section></section>
        <article>
            <h2>Zivile Schmitt : <?= $t['contact']['chief'] ?></h2>
            <section></section>
            <p><?= $t['contact']['email'] ?>: <a href="mailto:info@opusmutzig.fr">info@opusmutzig.fr</a></p>
        </article>
        <article>
            <h2>Joanne David : <?= $t['contact']['president'] ?></h2>
            <section></section>
            <p><?= $t['contact']['email'] ?>: <a href="mailto:info@opusmutzig.fr">info@opusmutzig.fr</a></p>
        </article>
        <article>
            <h2>Muriel Rustenholz : <?= $t['contact']['treasurer'] ?></h2>
            <section></section>
            <p><?= $t['contact']['email'] ?>: <a href="mailto:info@opusmutzig.fr">info@opusmutzig.fr</a></p>
        </article>
        <article>
            <h2>Christine Schreiner : <?= $t['contact']['secretary'] ?></h2>
            <section></section>
            <p><?= $t['contact']['email'] ?>: <a href="mailto:info@opusmutzig.fr">info@opusmutzig.fr</a></p>
        </article>
    </main>
    <footer>
        <?php
            include("assets/templates/foot.php");
        ?>
    </footer>
</body>
</html>