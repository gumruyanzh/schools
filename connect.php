<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$myDb = 'schools';

	if (!mysql_connect($host, $user, $pass) || !mysql_select_db($myDb)) {
		die(mysql_error());
	}
 ?>