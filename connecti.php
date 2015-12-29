<?php 
	$host = 'localhost';
	$user = 'zhiro_zhiro';
	$pass = '9dJip0pE';
	$myDb = 'zhiro_schools';
	$conn = mysqli_connect($host, $user, $pass);

	if (!$conn || !mysqli_select_db($conn, $myDb)) {
		echo "DB error: " . $conn->connect_error;
	}

	mysqli_set_charset($conn,"utf8");
