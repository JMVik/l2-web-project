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
        <form action="/assets/extras/admin/add_event.php" method="post" enctype="multipart/form-data">
            <label for="title"><?= $t['admin_nav']['title'] ?></label>
            <input type="text" id="title" name="title"/>
            <p></p>
            <label for="file"><?= $t['admin_nav']['image'] ?></label>
            <input type="file" id="file" name="image"/>
            <p></p>
            <label for="content"><?= $t['admin_nav']['content'] ?></label>
            <textarea name="content" id="content"></textarea>
            <p></p>
            <button type="submit"><?= $t['admin_nav']['create_event'] ?></button>
        </form>
    </article>
<?php else : ?>
    <p>
        <?= $t['admin_nav']['msg_noperm'] ?>
        <a href='/../../../index.php'><?= $t['admin_nav']['link'] ?></a>
    </p>
    <?php header("Refresh: 5; url=/../../../index.php"); ?>
<?php endif; ?>