<?php

require_once 'assets/extras/lang.php';

?>

<nav>
    <section>
        <h3><?= $t['foot']['contact'] ?></h3>
        <p><?= $t['foot']['email'] ?>: <a href="mailto:info@opusmutzig.fr">info@opusmutzig.fr</a></p>
        <p><?= $t['foot']['adress'] ?>: 15 rue du Génie, 67190 Mutzig</p>
    </section>
    <section>
        <h3><?= $t['foot']['newsletter_title'] ?></h3>
        <form action="assets/extras/subscription.php" method="post">
            <label for="emailsub"><?= $t['foot']['newsletter_p'] ?></label>
            <input type="email" name="emailsub" id="emailsub" placeholder="<?= $t['foot']['email_entry'] ?>" required>
            <button type="submit" name="submitsub"><?= $t['foot']['subscribe_button'] ?></button>
        </form>
        <p></p>
    </section>
    <section>
        <h3><?= $t['foot']['navigation'] ?></h3>
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
    </section>
    <section>
        <h3><?= $t['foot']['social'] ?></h3>
        <ul>
            <li><a href="https://www.facebook.com/people/LEnsemble-Vocal-F%C3%A9minin-Opus/100063105438213/"><?= $t['foot']['facebook'] ?></a></li>
        </ul>
    </section>
</nav>