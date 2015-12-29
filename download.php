<?php

	require 'core.php';
	require 'connecti.php';

//test
if ( isset($_GET['k']) ) {
	$schoolID= $_GET['id'];
	$query = "SELECT dprocner.id, schoolName, address, city, number, directorName,
				directorSurname, qndpnft, himnadirner, patmutyun, region, type
			FROM dprocner
			INNER JOIN regions ON dprocner.region_id = regions.id
			INNER JOIN school_types ON dprocner.type_id = school_types.id";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$result=$stmt->get_result();
	if ($result) {
		//$row=$result->fetch_assoc();

		if ( !empty($_GET['k']) ) {


			$csv_filename = 'school_' .date('Y-M-D'). '.csv';

			// create empty variable to be filled with export data

			$fieldNames = [
				"id" => "Դպրոցի ID",
				"schoolName" => "Դպրոցի անուն",
				"address" => "Հասցե",
				"city" => "Համայնք",
				"number" => "Հեռախոսահամար",
				"directorName" => "Տնօրենի անուն",
				"directorSurname" => "Տնօրենի ազգանուն",
				"qndpnft" => "Քաղաքացի նախագիծ",
				"himnadirner" => "Հիմնախնդիրներ",
				"patmutyun" => "Պամություն",
				"region" => "Մարզ",
				"type" => "Դպրոցի տիպ"
			];

			$csv_export = '';

			// query to get data from database

			$field = mysqli_num_fields($result);
			// create line with field names
			for($i = 0; $i < $field; $i++) {
				$k = mysqli_fetch_field_direct($result, $i)->name;
				$csv_export.= $fieldNames[$k] . ',';
			}
			// newline (seems to work both on Linux & Windows servers)
			$csv_export .= "\n";
			// loop through database query and fill export variable

			while ( $row=$result->fetch_assoc() ) {

				// create line with field values
				for($i = 0; $i < $field; $i++) {
					$des = $row[mysqli_fetch_field_direct($result, $i)->name];
					$clear = strip_tags($des);
					$Content = preg_replace("/&#?[a-z0-9]{2,8};/i","",$clear);
					$csv_export.= '"'. $Content .'",';
				}
				$csv_export .= "\n";
			}

			// Export the data and prompt a csv file for download
			header("Content-type: text/x-csv");
			header("Content-Disposition: attachment; filename=".$csv_filename."");
			echo($csv_export);
		}

	}


}
//test
