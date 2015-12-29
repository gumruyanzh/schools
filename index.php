<?php
	require 'core.php';
	require 'connecti.php';

	if (!loggedin()) {
		header('Location: login.php');
	} else {header('Location: front.php');}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SchoolsAdmin</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
</head>
<body>
	<script type="text/javascript">
		tinymce.init({
			selector: "textarea",
			plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});
	</script>
	<div class="container">

			<div class="logout">
				<a class="btn btn-primary"href="<?php echo "logout.php"?>">logout</a>
			</div>

		<div class="col-md-12">
			<div class="schoolForm">
				<form action="insert.php" class="" method="POST">
					<div class="col-md-4">
						<div class="form-group">
							<label for="schoolName" class="">School Name</label>
							<input name="schoolName" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="city" class="">city</label>
							<input name="city" class="form-control" type="text" placeholder="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="region" class="">Region</label>
							<input name="region" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="address" class="">Address</label>
							<input name="address" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="number" class="">Number</label>
							<input name="number" class="form-control" type="text" placeholder="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="tnorenName" class="">Tnoreni anun</label>
							<input name="tnorenName" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="tnorenSurname" class="">Tnoreni azganun</label>
							<input name="tnorenSurname" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="ashXorhurd" class="">ashxorhrdi txu anun azganun</label>
							<input name="ashXorhurd" class="form-control" type="text" placeholder="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="qndpnft" class="">qaxaqaci naxagic dasht</label>
							<textarea class="form-control" rows="10" name="qndpnft"></textarea>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="himnadirner" class="">himnadirner</label>
							<textarea class="form-control" rows="10" name="himnadirner"></textarea>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="patmutyun" class="">patmutyun</label>
							<textarea class="form-control" rows="10" name="patmutyun"></textarea><br>
						</div>
					</div>
					<div class="form-group">
						<label for="addSchool" class="">Add school</label><br>
						<input type="submit" class="btn btn-primary" value="add">
					</div>
				</form>
			</div>
		</div>

	</div>




</body>
</html>
