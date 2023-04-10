<?php

session_start();

require_once "assets/models/PostEvent.php";
require_once "assets/models/Image.php";

$postevent = new PostEvent();
$posteventexist = new PostEvent();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evénement</title>
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
        <h2><?= $t['index']['nextevent'] ?></h2>
        <p></p>
        <?php if ($posteventexist->getPosts() == NULL) : ?>
        <h2><?= $t['index']['no_event'] ?></h2>
        <?php else : ?>
        <section>
            <?php foreach ($postevent->getPosts() as $event) : ?>
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