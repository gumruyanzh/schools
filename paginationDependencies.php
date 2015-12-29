<?php 

	$per_page=5;
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	}
	else {
	$page=1;
	}


	$start_from = ($page-1) * $per_page;

 ?>