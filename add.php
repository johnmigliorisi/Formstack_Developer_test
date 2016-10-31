<?php 

require_once ('controller/UserController.php');

$userObj = new UserController();

if (!empty($_POST['email'])) {
    // Update and redirect to home
    //hash the password right here so we don't send it unencrypted

    /**
    * encrypt the password before it is passed to the add function
    * @param $password
    * return string
    */
    function hash_password($password)
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        return $hash;
    }
    $hashed = hash_password($_POST['password']);
    $userObj->add($_POST['firstName'], $_POST['lastName'], $_POST['email'], $hashed);
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