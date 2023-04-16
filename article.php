<?php

session_start();

require_once "assets/models/PostArticle.php";
require_once "assets/models/Image.php";

$postarticle = new PostArticle();
$postarticleexist = new PostArticle();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta name="description" content="Page affichant tous les articles mis en ligne.">
    <title>Articles</title>
    <link rel="icon" href="/favicon.ico"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
    <link rel="stylesheet" href="assets/css/styleeventarticle.css">
    <script src="assets/js/verif_sub.js" defer></script>
</head>
<body>
    <header>
        <?php
            include("assets/templates/navigation.php");
        ?>
    </header>
    <main>
        <h1><?= $t['index']['article'] ?></h1>
        <p></p>
        <?php if ($postarticleexist->getPosts() == NULL) : ?>
        <h2><?= $t['index']['no_article'] ?></h2>
        <?php else : ?>
        <section>
            <?php foreach ($postarticle->getPosts() as $article) : ?>
            <article>
                <h3><?= $article['title']; ?></h3>
                <section>
                <?php
                    $postImageId = new PostArticle();
                    $imageId = $postImageId->getImageId($article['id']);

                    $image = new Image();
                    $imageData = $image->getImageTypeData($imageId);

                    if ($imageData) {
                        $data = base64_encode($imageData['data']);
                        $type = $imageData['type'];
                        echo "<img src='data:$type;base64,$data' alt='Image article'>";
                    }
                ?>
                </section>
                <section>
                    <p><?= $article['content']; ?></p>
                </section>
                <p></p>
            </article>
            <?php endforeach; ?>
        </section>
        <?php endif; ?>
    </main>
    <footer>
        <?php
            include("assets/templates/foot.php");
        ?>
    </footer>
</body>
</html>