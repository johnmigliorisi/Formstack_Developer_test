<?php
require_once ('controller/UserController.php');

$userObj = new UserController();
$users = $userObj->find();
?>
<html>
    <head>
        <title>Formstack Developer Test!</title>
    </head>
    <body>
        <?php if ($users): ?>
            <ul>
                <?php foreach ($users as $user): ?>
                <li><span><?= $user['firstName'] ?> <?= $user['lastName'] ?></span> <a href="edit.php?id=<?= $user['id'] ?>">Edit</a></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No users yet!!</p>
        <?php endif; ?>
    </body>
</html>