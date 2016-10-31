<?php 

require_once ('controller/UserController.php');

$userObj = new UserController();

if (!empty($_POST['email'])) {
    // Update and redirect to home
    //hash the password
    $hashed = hash_password($_POST['password']);
    $userObj->add($_POST['firstName'], $_POST['lastName'], $_POST['email'], $hashed);
    header('Location: index.php');
}
?>
<html>
    <head>
        <title>Formstack Developer Test - Add User</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="styles/base.css" />
    </head>
    <body>
        <header>
            <h1>Formstack Developer Test</h1>
        </header>
        <main>
            <article>
                <form action="add.php" method="POST">
                    <label for="email">Email</label><br>
                    <input type="email" name="email" value=""><br>
                    <label for="firstName">First Name</label><br>
                    <input type="text" name="firstName" value=""><br>
                    <label for="lastName">Last Name</label><br>
                    <input type="text" name="lastName" value=""><br>
                    <label for="password">Last Name</label><br>
                    <input type="password" name="password" value=""><br>
                    <button type="submit">Add</button>
                </form>
            </article>
        </main>
    </body>
</html>