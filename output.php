<?php

	require 'core.php';
	require 'connecti.php';

	if (isset($_GET['id']) && $_GET['id']>0) {
		$schoolID= $_GET['id'];
		$query = "SELECT dprocner.id, type_id, schoolName, address, city, number, directorName,
					directorSurname, ashXorhurd, qndpnft, himnadirner, patmutyun, region_id, image_path, region, type
				FROM dprocner
				INNER JOIN regions ON dprocner.region_id = regions.id
				INNER JOIN school_types ON dprocner.type_id = school_types.id WHERE dprocner.id='$schoolID'";
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$result=$stmt->get_result();
		if ($result) {
			$row=$result->fetch_assoc();
			header('Content-type: application/json');
			echo json_encode($row, JSON_PRETTY_PRINT);

		} else {header('Location: error.php');}
	}else {

		$order = isset($_GET['order']) ? $_GET['order'] : 'id';
		echo $order;
		$q = isset($_GET['q']) ? $_GET['q'] : '';
		$query = "SELECT dprocner.id, type_id, schoolName, address, city, number, directorName,
					directorSurname, ashXorhurd, qndpnft, himnadirner, patmutyun, region_id, image_path, region, type
				FROM dprocner
				INNER JOIN regions ON dprocner.region_id = regions.id
				INNER JOIN school_types ON dprocner.type_id = school_types.id";

		$allowedOrder = ['id', 'region', 'schoolName', 'city', 'number', 'directorName'];
		if( !in_array($order, $allowedOrder) ){
			$order = 'id';
		}

		$query_order = " ORDER BY " . $order . " ASC ";

		if( $q != '' ){
			$query .= " WHERE schoolName LIKE ? OR region LIKE ? " . $query_order ." ";
			$q = "%$q%";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('ss', $q, $q);
		}else{
			$query .= $query_order;
			$stmt = $conn->prepare($query);
		}

		$stmt->execute();
		$result = $stmt->get_result();


		if ( $result ) {
			$array = [];
			while ( $row = $result->fetch_assoc() ) {
				array_push($array, $row);
			}
			header('Content-type: application/json');
			echo json_encode($array);
			$stmt->close();
		} else {
			echo "MySql Error: " . $stmt->error;
		}

	}

	$conn->close();
