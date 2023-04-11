<?php

require_once 'assets/extras/lang.php';

?>
<nav>
    <ul>
        <li>
            <button><img src="assets/img/nav_img.webp" alt="Bouton Paramètre"></button>
            <ul>
                <li><a href="index.php"><?= $t['nav']['home'] ?></a></li>
                <li><a href="event.php"><?= $t['nav']['event'] ?></a></li>
                <li><a href="article.php"><?= $t['nav']['article'] ?></a></li>
                <?php if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] !== null ) : ?>
                <li><a href="dashboard.php"><?= $t['nav']['dashboard'] ?></a></li>
                <li><a href="assets/extras/logout.php"><?= $t['nav']['disconnect'] ?></a></li>
                <?php else : ?>
                <li><a href="signin.php"><?= $t['nav']['signin'] ?></a></li>
                <li><a href="login.php"><?= $t['nav']['login'] ?></a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
                <li><a href="admin.php"><?= $t['nav']['admin'] ?></a></li>
                <?php endif; ?>
                <li><a href="contact.php"><?= $t['nav']['contact'] ?></a></li>
                <li><a href="about.php"><?= $t['nav']['about'] ?></a></li>
            </ul>
        </li>
        <li>
            <a href="index.php"><?= $t['nav']['home'] ?></a>
            <a href="contact.php"><?= $t['nav']['contact'] ?></a>
            <a href="about.php"><?= $t['nav']['about'] ?></a>
            <?php if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] !== null ) : ?>
            <a href="dashboard.php"><?= $t['nav']['dashboard'] ?></a>
            <a href="assets/extras/logout.php"><?= $t['nav']['disconnect'] ?></a>
            <?php else : ?>
            <a href="login.php"><?= $t['nav']['login'] ?></a>
            <a href="signin.php"><?= $t['nav']['signin'] ?></a>
            <?php endif; ?>
        </li>
        <li>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <label for="lang">Language</label>
                <select name="lang" id="lang" onchange="this.form.submit()">
                    <option value="fr" <?php if ($_SESSION['lang'] == 'fr') echo 'selected'; ?>>Français</option>
                    <option value="en" <?php if ($_SESSION['lang'] == 'en') echo 'selected'; ?>>English</option>
                    <option value="de" <?php if ($_SESSION['lang'] == 'de') echo 'selected'; ?>>Deutsch</option>
                </select>
            </form>
        </li>
    </ul>
</nav>