<?php 

require_once ('controller/UserController.php');

$userObj = new UserController();

if (!empty($_POST['email'])) {
    // Update and redirect to home
    $userObj->add($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password']);
    header('Location: index.php');
}
?>
<html>
    <head>
        <title>Formstack Developer Test - Add User</title>
    </head>
    <body>
        <form action="add.php" method="POST">
            <input type="email" name="email" value=" ">
            <input type="text" name="firstName" value=" ">
            <input type="text" name="lastName" value=" ">
            <input type="password" name="password" value=" ">
            <button type="submit">Add</button>
        </form>
    </body>
</html>