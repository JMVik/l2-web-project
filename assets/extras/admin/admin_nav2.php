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
    .error {
        background-color: rgba(255, 0,0, 0.1);
        border: 1px solid red;
    }
    article form p {
        color: red;
        font-weight: bold;
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
            <label><?= $t['admin_nav']['title'] ?>
            <input type="text" name="title"/>
            </label>
            <p></p>
            <label><?= $t['admin_nav']['image'] ?>
            <input type="file" name="image"/>
            </label>
            <p></p>
            <label><?= $t['admin_nav']['content'] ?>
            <textarea name="content"></textarea>
            </label>
            <p></p>
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
