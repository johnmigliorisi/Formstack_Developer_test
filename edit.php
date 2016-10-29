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
		</head>
		<body>
			<form action="edit.php" method="POST">
				<input type="email" name="email" value="<?= $user['email'] ?>">
				<input type="text" name="firstName" value="<?= $user['firstName'] ?>">
				<input type="text" name="lastName" value="<?= $user['lastName'] ?>">
				<input type="hidden" name="id" value="<?= $userId ?>">


				<button type="submit">Edit</button>
			</form>
		</body>
</html>