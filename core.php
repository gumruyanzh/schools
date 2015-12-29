<?php
	ob_start();
	session_start();

	function loggedin () {
		if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
			return true;
		} else {return false;}
	}



	function insertIntoDb ($z, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k ,$conn) {
		$query = "INSERT INTO dprocner (`type_id`,`schoolName`, `city`, `region_id`, `address`, `number`, `directorName`, `directorSurname`, `ashXorhurd`, `qndpnft`, `himnadirner`, `patmutyun`) VALUES ('$z','$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k')";
		$result= mysqli_query($conn, $query);
		if ($result) {
			header('Location: update.php?id='.$conn->insert_id);
		} else {
			echo "try again !!!";
		}
	}

	function updateSchoolInfo($z, $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $schoolID, $conn){
		$query = "UPDATE dprocner SET type_id ='$z', schoolName='$a', city='$b', region_id='$c', address='$d', number='$e', directorName='$f', directorSurname='$g', ashXorhurd='$h', qndpnft='$i', himnadirner='$j', patmutyun='$k' WHERE id='$schoolID'";
		$result=mysqli_query($conn, $query);
		if ($result) {
			header('Location: update.php?id='.$schoolID);
		} else {
			echo "try again !!!";
		}
	}

?>
