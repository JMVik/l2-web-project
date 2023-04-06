<?php
    session_start();
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'fr'; // Définir la langue par défaut ici
      }
      
    include("assets/locales/translations.php");
    $lang = $_SESSION['lang'];

if (isset($t[$lang])) {
  $translations = $t[$lang];
} else {
  $translations = $t['fr']; // Charger les traductions en français si la langue sélectionnée n'est pas disponible
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
            <a href="index.php"><?= $translations['home'] ?></a>
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
            <select onchange="location = this.value;">
                <?php foreach ($languages as $code => $name) : ?>
                    <option value="?lang=<?php echo $code; ?>" <?php if ($_GET['lang'] == $code) echo 'selected'; ?>>
                        <?php echo $name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </li>
    </ul>
</nav>