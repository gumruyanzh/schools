<?php 
	
	require 'core.php';
	require 'connecti.php';

	if (isset($_FILES['image'])) {
		$name = $_FILES['image']['name'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$location = 'uploads/';
		$path = $location.$name;
		$exactID= $_GET['id'];
		if (!empty($name)) {
			move_uploaded_file($tmp_name, $path);
			echo "success";
		}else {echo "try again";}
	}
