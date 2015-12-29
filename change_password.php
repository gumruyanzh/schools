<?php
	require 'core.php';
	require 'connecti.php';
	if (isset($_POST['old-password']) && isset($_POST['new-password']) && isset($_POST['repeat-password'])) {
		$oldPassword = $_POST['old-password'];
		$newPassword = $_POST['new-password'];
		$repeatPassword = $_POST['repeat-password'];


		if (!empty($_POST['old-password']) && !empty($_POST['new-password']) && !empty($_POST['repeat-password'])) {
			if ($newPassword === $repeatPassword) {
				$password = md5($newPassword);
				$oldPassword = md5($oldPassword);
				$sql = "UPDATE users SET password=\"" . $password . "\" WHERE id =" . $_SESSION['user_id'] . " AND password = '" . htmlspecialchars($oldPassword) . "'";
				echo "<pre>$sql</pre>";
				if (mysqli_query($conn, $sql)) {
					echo "Record updated successfully";
					header('Location: login.php');
				} else {
					echo "Error updating record: " . $conn->error;
				}

			} else {
				echo "ERROR: password mismatch !!!";
			}

		} else {
			echo "lav chi";
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="container">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form method="POST" class="form-signin" action="">
				<h2 class="form-heading">Password Change</h2>
				<label for="oldPassword" >old password</label>
				<input type="text" name="old-password" id="old-password" class="form-control" required autofocus><br>
				<label for="newPassword" >New Password</label>
				<input name="new-password" type="password" id="new-password" class="form-control" required><br>
				<label for="repeatPassword" >Repeat New Password</label>
				<input name="repeat-password" type="password" id="repeat-password" class="form-control" required><br>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Change</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
