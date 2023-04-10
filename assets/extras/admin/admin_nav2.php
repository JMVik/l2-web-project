<?php

session_start();

require_once 'langadmin.php';

?>

<style>
    article > form {
        display: flex;
        flex-direction: column;
    }
    article > form > input, article > form > button {
        margin-bottom: 10px;
    }
    article > form > textarea {
        height: 200px;
    }
    article > p {
        margin: 20px;
        margin-top: 60px;
        text-align: center;
    }
</style>

<?php if (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
    <article>
        <form action="/assets/extras/admin/add_article.php" method="post" enctype="multipart/form-data">
            <label><?= $t['admin_nav']['title'] ?></label>
            <input type="text" name="title"/>
            <label><?= $t['admin_nav']['image'] ?></label>
            <input type="file" name="image"/>
            <label><?= $t['admin_nav']['content'] ?></label>
            <textarea name="content"></textarea>
            <button type="submit"><?= $t['admin_nav']['create_article'] ?></button>
        </form>
    </article>
<?php else : ?>
    <p>
        <?= $t['admin_nav']['msg_noperm'] ?>
        <a href='/../../../index.php'><?= $t['admin_nav']['link'] ?></a>
    </p>
<?php header("Refresh: 5; url=/../../../index.php"); ?>
<?php endif; ?>
