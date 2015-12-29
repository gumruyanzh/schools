<?php
	require 'core.php';
	require 'connecti.php';

	if (isset($_POST['name'])&&isset($_POST['password'])) {
		$username=$_POST['name'];
		$password=$_POST['password'];
		$password = md5($password);
		if (!empty($_POST['name']) && !empty($_POST['password'])) {

			$query = "SELECT `id` FROM users WHERE `name` ='" . htmlspecialchars($username) . "' AND `password` ='". htmlspecialchars($password) ."'";

			if ($result = $conn->query($query)) {
				$query_num_rows = $result->num_rows;
				if ($query_num_rows==0) {
					echo "invalid username or password";
				}else if ($query_num_rows == 1) {
					$row = $result->fetch_assoc();
					$user_id = $row['id'];
					$_SESSION['user_id']=$user_id;
					header('Location: allschools.php');
				}
			}
		} else {
			echo "try again";
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
		<div class="col-md-4 customLogin">
			<form method="POST" class="form-signin" action="">
				<h2 class="form-signin-heading">Please sign in</h2>
				<label for="inputEmail" class="sr-only">Email address</label>
				<input type="text"name="name" id="inputEmail" class="form-control" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input name="password" type="password" id="inputPassword" class="form-control" required>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="remember-me"> Remember me
					</label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>
		</div>
		<div class="col-md-4"></div>

	</div> <!-- /container -->

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
