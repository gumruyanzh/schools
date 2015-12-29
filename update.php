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
			$row = mysqli_fetch_assoc($result);
			$isNew = false;
		} else {header('Location: error.php');}
	}

	$GLOBALS['$connection'] = $conn;
	function selectFromRegions(){
		$sql = "SELECT * FROM regions";
		$result = mysqli_query($GLOBALS['$connection'], $sql);
		$regions = array();
		while( $regRow = mysqli_fetch_assoc($result)) {
			array_push($regions, $regRow);
		}
		return $regions;
	}

	function selectFromSchoolTypes (){
		$sql = "SELECT * FROM school_types";
		$result = mysqli_query($GLOBALS['$connection'], $sql);
		$types = array();
		while( $typesRow = mysqli_fetch_assoc($result)) {
			array_push($types, $typesRow);
		}
		return $types;
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
							<label for="schoolName" class="">Դպրոցի անուն</label>
							<input value="<?php echo !$isNew ? $row['schoolName'] : '';?>" name="schoolName" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="city" class="">Համայնք</label>
							<input value="<?php echo !$isNew ? $row['city'] : '';?>" name="city" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="region" class="">Մարզ</label>
							<select name="region" id="" class="form-control">
								<?php
									$regions = selectFromRegions();
									$options = '';
									$selected = '';
									for ($i = 0; $i < count($regions); $i++) {
										if (!$isNew && $row['region_id']==$regions[$i]['id']) {
											$selected = 'selected';
										}else { $selected = '';}
										$options .= '<option '.$selected.' value="'. $regions[$i]['id'] .'">'. $regions[$i]['region'] . '</option>';
									}
									echo $options;
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="address" class="">Հասցե</label>
							<input value="<?php echo !$isNew ? $row['address'] : '';?>" name="address" class="form-control" type="text" placeholder="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="number" class="">Հեռախոսահամր</label>
							<input value="<?php echo !$isNew ? $row['number'] : '';?>" name="number" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="tnorenName" class="">Տնօրենի անուն</label>
							<input value="<?php echo !$isNew ? $row['directorName'] : '';?>" name="tnorenName" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="tnorenSurname" class="">Տնօրենի ազգանուն</label>
							<input value="<?php echo !$isNew ? $row['directorSurname'] : '';?>" name="tnorenSurname" class="form-control" type="text" placeholder="">
						</div>
						<div class="form-group">
							<label for="schoolTypes" class="">Դպրոցի տիպը</label>
							<select name="schoolTypes" id="" class="form-control">
								<?php
									$types = selectFromSchoolTypes();
									$options = '';
									$selected = '';
									for ($i = 0; $i < count($types); $i++) {
										if (!$isNew && $row['type_id']==$types[$i]['id']) {
											$selected = 'selected';
										}else { $selected = '';}
										$options .= '<option '.$selected.' value="'. $types[$i]['id'] .'">'. $types[$i]['type'] . '</option>';
									}
									echo $options;
								?>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group">
								<label for="qndpnft" class="">Քաղաքացի նախագիծ դաշտ</label>
								<textarea class="form-control" rows="10" name="qndpnft"><?php echo !$isNew ? $row['qndpnft'] : '';?></textarea>
								<script>
									CKEDITOR.replace( 'qndpnft');
								</script>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="himnadirner" class="">Հիմնադիրներ</label>
								<textarea class="form-control" rows="10" name="himnadirner"><?php echo !$isNew ? $row['himnadirner'] : '';?></textarea>
								<script>
									CKEDITOR.replace( 'himnadirner');
								</script>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="patmutyun" class="">Պատմություն</label>
								<textarea class="form-control" rows="10" name="patmutyun"><?php echo !$isNew ? $row['patmutyun'] : '';?></textarea><br>
								<script>
									CKEDITOR.replace( 'patmutyun');
								</script>
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
		<div id="viewButton" class="<?php echo !$isNew ? "" : "hidden";?>">
			<a id = "forView" class="btn btn-warning" target="_blank" href="front.php#/school<?php echo $_GET['id'];?>">view page</a>
		</div>
	</div>




</body>
</html>
