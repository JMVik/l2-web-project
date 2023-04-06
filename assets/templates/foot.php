<nav>
    <section>
        <h3><?= $t[$_GET['lang']]['contact'] ?></h3>
        <p><?= $t[$_GET['lang']]['phone'] ?>: 01 23 45 67 89</p>
        <p><?= $t[$_GET['lang']]['email'] ?>: contact@ex.com</p>
        <p><?= $t[$_GET['lang']]['adress'] ?>: 1 rue Exemple, 78000 Paris</p>
    </section>
    <section>
        <h3><?= $t[$_GET['lang']]['newsletter_title'] ?></h3>
        <p><?= $t[$_GET['lang']]['newsletter_p'] ?></p>
        <form>
            <input type="email" placeholder="<?= $t[$_GET['lang']]['email_entry'] ?>" required>
            <button type="submit"><?= $t[$_GET['lang']]['subscribe_button'] ?></button>
        </form>
    </section>
    <section>
        <h3><?= $t[$_GET['lang']]['navigation'] ?></h3>
        <ul>
            <li><a href="index.php"><?= $t[$_GET['lang']]['home'] ?></a></li>
            <li><a href="#"><?= $t[$_GET['lang']]['event'] ?></a></li>
            <li><a href="#"><?= $t[$_GET['lang']]['article'] ?></a></li>
            <li><a href="signin.php"><?= $t[$_GET['lang']]['signin'] ?></a></li>
            <li><a href="login.php"><?= $t[$_GET['lang']]['login'] ?></a></li>
            <li><a href="#"><?= $t[$_GET['lang']]['contact'] ?></a></li>
            <li><a href="#"><?= $t[$_GET['lang']]['about'] ?></a></li>
        </ul>
    </section>
    <section>
        <h3><?= $t[$_GET['lang']]['social'] ?></h3>
        <ul>
            <li><a href="#"><?= $t[$_GET['lang']]['facebook'] ?></a></li>
        </ul>
    </section>
</nav>