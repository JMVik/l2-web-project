<nav>
    <section>
        <h3><?= $t['foot']['contact'] ?></h3>
        <p><?= $t['foot']['phone'] ?>: 01 23 45 67 89</p>
        <p><?= $t['foot']['email'] ?>: contact@ex.com</p>
        <p><?= $t['foot']['adress'] ?>: 1 rue Exemple, 78000 Paris</p>
    </section>
    <section>
        <h3><?= $t['foot']['newsletter_title'] ?></h3>
        <p><?= $t['foot']['newsletter_p'] ?></p>
        <form>
            <input type="email" placeholder="<?= $t['foot']['email_entry'] ?>" required>
            <button type="submit"><?= $t['foot']['subscribe_button'] ?></button>
        </form>
    </section>
    <section>
        <h3><?= $t['foot']['navigation'] ?></h3>
        <ul>
            <li><a href="index.php"><?= $t['nav']['home'] ?></a></li>
            <li><a href="#"><?= $t['nav']['event'] ?></a></li>
            <li><a href="#"><?= $t['nav']['article'] ?></a></li>
            <li><a href="signin.php"><?= $t['nav']['signin'] ?></a></li>
            <li><a href="login.php"><?= $t['nav']['login'] ?></a></li>
            <li><a href="#"><?= $t['nav']['contact'] ?></a></li>
            <li><a href="#"><?= $t['nav']['about'] ?></a></li>
        </ul>
    </section>
    <section>
        <h3><?= $t['foot']['social'] ?></h3>
        <ul>
            <li><a href="#"><?= $t['foot']['facebook'] ?></a></li>
        </ul>
    </section>
</nav>