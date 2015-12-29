<?php 
	require 'core.php';
	require 'connecti.php';

	$type_id = $_POST['schoolTypes'];
	$schoolName= $_POST['schoolName'];
	$city= $_POST['city'];
	$region_id= $_POST['region'];
	$address= $_POST['address'];
	$number= $_POST['number'];
	$directorName= $_POST['tnorenName'];
	$directorSurname= $_POST['tnorenSurname'];
	$ashXorhurd= $_POST['ashXorhurd'];
	$qndpnft= $_POST['qndpnft'];
	$himnadirner= $_POST['himnadirner'];
	$patmutyun= $_POST['patmutyun'];
	insertIntoDb($type_id, $schoolName, $city, $region_id, $address, $number, $directorName, $directorSurname, $ashXorhurd, $qndpnft, $himnadirner, $patmutyun, $conn);
?>