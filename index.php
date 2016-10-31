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
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="styles/base.css" />
    </head>
    <body>
        <header>
            <h1>Formstack Developer Test</h1>
        </header>
        <main>
            <article>
                <?php if ($users): ?>
                    <ul>
                        <?php foreach ($users as $user): ?>
                        <li><a class="edit" href="edit.php?id=<?= $user['id'] ?>">Edit</a> <a class="delete" href="index.php?id=<?= $user['id'] ?>">Delete</a> <span><?= $user['firstName'] ?> <?= $user['lastName'] ?></span></li>
                        <?php endforeach; ?>
                        <li><a class="add" href="add.php">Add a user</a></li>
                    </ul>
                <?php else: ?>
                    <p>No users yet!!</p>
                <?php endif; ?>
            </article>
        </main>
    </body>
</html>