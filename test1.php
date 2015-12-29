<?php
	require 'core.php';
	require 'connecti.php';

	if (!loggedin()) {
		header('Location: login.php');
	}

	$isNew=true;
	if (isset($_GET['id']) && $_GET['id'] > 0) {
		$schoolID = $_GET['id'];
		$query = "SELECT * FROM dprocner WHERE id = '$schoolID'";
		$result = mysqli_query($conn, $query);
		if ($result) {
			$row = $result->fetch_assoc;
			$isNew = false;
		} else {header('Location: error.php');}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SchoolsAdmin</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="js/ckeditor/contents.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/ckeditor/ckeditor.js" ></script>

</head>
<body>
<?php include 'header.php'; ?>
	<div class="container">
		<div class="col-md-12">
			<div class="schoolForm">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading"><div class="panel-title">School img</div></div>
						<div class="panel-body">
								<div class="col-md-12">
									<div class="img">
										<img src='<?php echo !$isNew ? $row['image_path'] : 'uploads/grey.jpg';?>' alt="">
									</div>
								</div>
							<div class="uploadForm">
								<?php if(isset($_GET['id'])&&$_GET['id']>0):?>
									<form action="upload.php?id=<?php echo $_GET['id']?>" method="POST" enctype="multipart/form-data">
										<span class="btn btn-default"><input type="file" class="btn-file" name="schoolImage"></span><br><br>
										<input type="submit" class="btn btn-primary" value="upload">
									</form>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
				<form action='<?php echo !$isNew ? "updateSchoolInfo.php?id=".$_GET['id'] : "insert.php";?>' class="" method="POST">
					<div class="col-md-4">
						<div class="form-group">
							<label for="schoolName" class="">School Name</label>
							<input value="<?php echo !$isNew ? $row['schoolName'] : '';?>" name="schoolName" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="city" class="">city</label>
							<input value="<?php echo !$isNew ? $row['city'] : '';?>" name="city" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="region" class="">Region</label>
							<input value="<?php echo !$isNew ? $row['region'] : '';?>" name="region" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="address" class="">Address</label>
							<input value="<?php echo !$isNew ? $row['address'] : '';?>" name="address" class="form-control" type="text" placeholder="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="number" class="">Number</label>
							<input value="<?php echo !$isNew ? $row['number'] : '';?>" name="number" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="tnorenName" class="">Tnoreni anun</label>
							<input value="<?php echo !$isNew ? $row['directorName'] : '';?>" name="tnorenName" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="tnorenSurname" class="">Tnoreni azganun</label>
							<input value="<?php echo !$isNew ? $row['directorSurname'] : '';?>" name="tnorenSurname" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="ashXorhurd" class="">ashxorhrdi txu anun azganun</label>
							<input value="<?php echo !$isNew ? $row['ashXorhurd'] :'';?>" name="ashXorhurd" class="form-control" type="text" placeholder="">
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group">
								<label for="qndpnft" class="">qaxaqaci naxagic dasht</label>
								<textarea class="form-control" rows="10" name="qndpnft"><?php echo !$isNew ? $row['qndpnft'] : '';?></textarea>
								<script>
									CKEDITOR.replace( 'qndpnft');
								</script>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="himnadirner" class="">himnadirner</label>
								<textarea class="form-control" rows="10" name="himnadirner"><?php echo !$isNew ? $row['himnadirner'] : '';?></textarea>
								<script>
									CKEDITOR.replace( 'himnadirner');
								</script>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="patmutyun" class="">patmutyun</label>
								<textarea class="form-control" rows="10" name="patmutyun"><?php echo !$isNew ? $row['patmutyun'] : '';?></textarea>
								<script>
									CKEDITOR.replace( 'patmutyun');
								</script>
								<br>
							</div>
						</div>
						<div class="form-group">
							<div class="addButton">
								<label for="addSchool" class=""><?php echo !$isNew ? 'Update school info' : 'Add school'?></label><br>
								<input type="submit" class="btn btn-primary" value='<?php echo !$isNew ? "Update" : "Add"; ?>'>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>




</body>
</html>