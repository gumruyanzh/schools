<?php 
	
	require 'core.php';
	require 'connecti.php';

	if (isset($_FILES['schoolImage'])) {
		$name = $_FILES['schoolImage']['name'];
		$tmp_name = $_FILES['schoolImage']['tmp_name'];
		$location = 'uploads/';
		$path = $location.$name;
		$exactID= $_GET['id'];
		if (!empty($name)) {
			move_uploaded_file($tmp_name, $path);
			$query = "UPDATE dprocner SET image_path= '$path' WHERE id = '$exactID'";
			$result=mysqli_query($conn, $query);
			if ($result) {
				header('Location: update.php?id='.$exactID);
			} else { echo "DB problem";}
			echo "success";
		}else {echo "try again";}
	}
?>