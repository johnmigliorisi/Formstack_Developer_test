<?php
require_once ('controller/UserController.php');

$userObj = new UserController();
$users = $userObj->find();
if (!empty($_GET['id'])) {
    // Update and redirect to home
    $userObj->delete($_GET['id']);
    header('Location: index.php');
} 
?>
<html>
    <head>
        <title>Formstack Developer Test!</title>
    </head>
    <body>
        <?php if ($users): ?>
            <ul>
                <?php foreach ($users as $user): ?>
                <li><span><?= $user['firstName'] ?> <?= $user['lastName'] ?></span> <a href="edit.php?id=<?= $user['id'] ?>">Edit</a> <a href="index.php?id=<?= $user['id'] ?>">Delete</a></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No users yet!!</p>
        <?php endif; ?>
        <p><a href="add.php">Add a user</a></p>
    </body>
</html>