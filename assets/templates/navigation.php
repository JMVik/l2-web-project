<?php
session_start();
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'fr'; // Définir la langue par défaut ici
}

// Inclure le fichier de traduction correspondant à la langue courante
switch ($_SESSION['lang']) {
    case 'fr':
        include(dirname(__FILE__) . "/../locales/fr.php");
        break;
    case 'en':
        include(dirname(__FILE__) . "/../locales/en.php");
        break;
    default:
        include(dirname(__FILE__) . "/../locales/fr.php");
        break;
}

// Vérifier si la langue a été changée
if (isset($_GET['lang'])) {
    switch ($_GET['lang']) {
        case 'fr':
            $_SESSION['lang'] = 'fr';
            include(dirname(__FILE__) . "/../locales/fr.php");
            break;
        case 'en':
            $_SESSION['lang'] = 'en';
            include(dirname(__FILE__) . "/../locales/en.php");
            break;
        default:
            $_SESSION['lang'] = 'fr';
            include(dirname(__FILE__) . "/../locales/fr.php");
            break;
    }
}

?>
<nav>
    <ul>
        <li>
            <button><img src="assets/img/nav_img.png" alt=""></button>
            <ul>
                <li><a href="index.php"><?= $translations['home'] ?></a></li>
                <li><a href="#"><?= $translations['event'] ?></a></li>
                <li><a href="#"><?= $translations['article'] ?></a></li>
                <li><a href="signin.php"><?= $translations['signin'] ?></a></li>
                <li><a href="login.php"><?= $translations['login'] ?></a></li>
                <?php if ($userLoaded['isAdmin']) : ?>
                <li><a href="#"><?= $translations['admin'] ?></a></li>
                <?php endif; ?>
                <li><a href="#"><?= $translations['contact'] ?></a></li>
                <li><a href="#"><?= $translations['about'] ?></a></li>
            </ul>
        </li>
        <li>
            <a href="index.php"><?= $t['nav']['home'] ?></a>
            <a href="#"><?= $translations['contact'] ?></a>
            <a href="#"><?= $translations['about'] ?></a>
        </li>
        <li>
            <form action="#">
                <input type="text" placeholder="<?= $translations['search'] ?>">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </li>
        <li>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <select name="lang" onchange="this.form.submit()">
                    <option value="fr" <?php if ($_SESSION['lang'] == 'fr') echo 'selected'; ?>>Français</option>
                    <option value="en" <?php if ($_SESSION['lang'] == 'en') echo 'selected'; ?>>English</option>
                </select>
            </form>
        </li>
    </ul>
</nav>