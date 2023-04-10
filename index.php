<?php

session_start();

require_once "assets/models/PostEvent.php";
require_once "assets/models/PostArticle.php";
require_once "assets/models/Image.php";

$postevent = new PostEvent();
$postarticle = new PostArticle();
$posteventexist = new PostEvent();
$postarticleexist = new PostArticle();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opus Ensemble Vocal Féminin</title>
    <link rel="stylesheet" href="assets/css/stylehome.css">
    <link rel="stylesheet" href="assets/css/stylenav.css">
    <link rel="stylesheet" href="assets/css/stylefoot.css">
    <script src="assets/js/verif_sub.js" defer></script>
</head>
<body>
    <header>
        <?php
            include("assets/templates/navigation.php");
        ?>
        <section>
            <img src="assets/img/head_img2.png" alt="">
        </section>
    </header>
    <main>
        <h2><?= $t['index']['namegroup'] ?></h2>
        <section></section>
        <p><?= $t['index']['presentation'] ?></p> 
        <nav>
            <h2><?= $t['index']['nextevent'] ?></h2>
            <p></p>
            <?php if ($posteventexist->getPosts() == NULL) : ?>
            <h2><?= $t['index']['no_event'] ?></h2>
            <?php else : ?>
            <section>
            <?php $count = 0; foreach ($postevent->getPosts() as $event) : 
                if ($count >= 3) break;
                $count++;
            ?>
            <article>
                <h3><?= $event['title']; ?></h3>
                <section>
                <?php
                    $postImageId = new PostEvent();
                    $imageId = $postImageId->getImageId($event['id']);

                    $image = new Image();
                    $imageData = $image->getImageTypeData($imageId);

                    if ($imageData) {
                        $data = base64_encode($imageData['data']);
                        $type = $imageData['type'];
                        echo "<img src='data:$type;base64,$data'>";
                    }
                ?>
                </section>
                <section>
                    <p><?= $event['content']; ?></p>
                </section>
            </article>
            <?php endforeach; ?>
            </section>
            <footer>
                <a href="event.php"><b><?= $t['index']['seemore'] ?></b></a>
            </footer>
            <?php endif; ?>
        </nav>
        <nav>
            <h2><?= $t['index']['article'] ?></h2>
            <p></p>
            <?php if ($postarticleexist->getPosts() == NULL) : ?>
            <h2><?= $t['index']['no_article'] ?></h2>
            <?php else : ?>
            <section>
            <?php $count = 0; foreach ($postarticle->getPosts() as $article) : 
                if ($count >= 6) break;
                $count++;
            ?>
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
                        echo "<img src='data:$type;base64,$data'>";
                    }
                ?>
                </section>
                <section>
                    <p><?= $article['content']; ?></p>
                </section>
            </article>
            <?php endforeach; ?>
            </section>
            <footer>
                <a href="article.php"><b><?= $t['index']['seemore'] ?></b></a>
            </footer>
            <?php endif; ?>
        </nav>
    </main>
    <footer>
        <?php
            include("assets/templates/foot.php");
        ?>
    </footer>
</body>
</html>