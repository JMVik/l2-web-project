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
    case 'de':
        include(dirname(__FILE__) . "/../locales/de.php");
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
        case 'de':
            $_SESSION['lang'] = 'de';
            include(dirname(__FILE__) . "/../locales/de.php");
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
                <li><a href="index.php"><?= $t['nav']['home'] ?></a></li>
                <li><a href="#"><?= $t['nav']['event'] ?></a></li>
                <li><a href="#"><?= $t['nav']['article'] ?></a></li>
                <li><a href="signin.php"><?= $t['nav']['signin'] ?></a></li>
                <li><a href="login.php"><?= $t['nav']['login'] ?></a></li>
                <?php if ($userLoaded['isAdmin']) : ?>
                <li><a href="#"><?= $t['nav']['admin'] ?></a></li>
                <?php endif; ?>
                <li><a href="#"><?= $t['nav']['contact'] ?></a></li>
                <li><a href="#"><?= $t['nav']['about'] ?></a></li>
            </ul>
        </li>
        <li>
            <a href="index.php"><?= $t['nav']['home'] ?></a>
            <a href="#"><?= $t['nav']['contact'] ?></a>
            <a href="#"><?= $t['nav']['about'] ?></a>
        </li>
        <li>
            <form action="#">
                <input type="text" placeholder="<?= $t['nav']['search'] ?>">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </li>
        <li>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <select name="lang" onchange="this.form.submit()">
                    <option value="fr" <?php if ($_SESSION['lang'] == 'fr') echo 'selected'; ?>>Français</option>
                    <option value="en" <?php if ($_SESSION['lang'] == 'en') echo 'selected'; ?>>English</option>
                    <option value="de" <?php if ($_SESSION['lang'] == 'de') echo 'selected'; ?>>Deutsch</option>
                </select>
            </form>
        </li>
    </ul>
</nav>