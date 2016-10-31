<?php 

require_once ('controller/UserController.php');

$userObj = new UserController();

if (!empty($_POST['id'])) {
    // Update and redirect to home
    $userObj->edit($_POST['id'], $_POST['firstName'], $_POST['lastName'], $_POST['email']);
    header('Location: index.php');
} else {
    $userId = $_GET['id'];
    $user = $userObj->find($userId);
    $user = $user[0];
}
?>
<html>
    <head>
        <title>Formstack Developer Test - Edit User</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="styles/base.css" />
    </head>
    <body>
        <header>
            <h1>Formstack Developer Test</h1>
        </header>
        <main>
            <article>
                <form action="edit.php" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?= $user['email'] ?>">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" value="<?= $user['firstName'] ?>">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" value="<?= $user['lastName'] ?>">
                    <input type="hidden" name="id" value="<?= $userId ?>">
                    <button type="submit">Edit</button>
                </form>
            </article>
        </main>
    </body>
</html>