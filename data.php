<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once 'assets/models/User.php';

$user = new User();
$users = $user->getUsers();
?>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</body>
</html>