<?php 
	require 'core.php';
	require 'connecti.php';

	if (loggedin()) {
		$schoolID=$_GET['id'];
		$query = "DELETE FROM dprocner WHERE id='$schoolID'";
		$result=mysqli_query($conn, $query);
		if ($result) {
			header('Location: allschools.php');
		} else {header('Location: error.php');}
	} else {header('Location: login.php');}

?>