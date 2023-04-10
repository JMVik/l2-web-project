<?php

session_start();

require_once 'langadmin.php';

require_once __DIR__ . '/../../models/PostEvent.php';
require_once __DIR__ . '/../../models/Image.php';
    
$postevent = new PostEvent();

$postevents = $postevent->getPosts();

?>

<?php if (isset($_SESSION['user']['id']) && $_SESSION['user']['isadmin']) : ?>
<h1><?= $t['admin_nav']['event_lst'] ?></h1>
<table>
    <thead>
        <tr>
            <th><?= $t['admin_nav']['title_th'] ?></th>
            <th><?= $t['admin_nav']['actions'] ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($postevents as $postevent) : ?>
            <tr>
                <td><?php echo $postevent['title']; ?></td>
                <td>
                    <form method="post" action="/assets/extras/admin/del_event.php" onsubmit="return confirm('<?= $t['admin_nav']['confirm'] ?>');">
                        <input type="hidden" name="id" value="<?php echo $postevent['id']; ?>">
                        <button type="submit" name="delete"><?= $t['admin_nav']['delete'] ?></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else : ?>
<p style="margin: 20px; margin-top: 60px; text-align: center;">
    <?= $t['admin_nav']['msg_noperm'] ?>
    <a href='/../../../index.php'><?= $t['admin_nav']['link'] ?></a>
</p>
<?php header("Refresh: 5; url=/../../../index.php"); ?>
<?php endif; ?>