<?php
	require 'core.php';
	require 'connecti.php';
	require_once 'paginator.class.php';

	if (!loggedin()) {
		header('Location: login.php');
	}


	$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
	$page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
	$links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
	$query      = "SELECT dprocner.id, schoolName, city, region_id, region
				FROM dprocner
				INNER JOIN regions ON dprocner.region_id = regions.id ";
	$order=false;

	if (isset($_GET['q']) && !empty($_GET['q'])) {
		$q = $_GET['q'];
		$query.=" WHERE schoolName LIKE '%$q%'";
	}

	if (isset($_GET['region']) && !empty($_GET['region'])) {
		$query .= "ORDER BY region DESC";
		$order=true;
	}

	if (isset($_GET['byname']) && !empty($_GET['byname'])) {
		$query .= "ORDER BY schoolName DESC";
		$order=true;
	}

	if (!$order) {
		$query .="ORDER BY id DESC";
	}


	$Paginator  = new Paginator( $conn, $query );

	$results    = $Paginator->getData( $limit, $page );

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>schools</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>
<?php include 'header.php'; ?>
	<div class="container">
	<a class="btn btn-default" href="?order=region">order by region</a>
	<a class="btn btn-warning" href="?order=schoolName">order by name</a>
	<a id = "forCsssv" class="btn btn-default" target="_blank" href="download.php?k=13">Export csv</a>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Դպրոցի անուն</th>
					<th>Համայնք</th>
					<th>Մարզ</th>
					<th>Խմբագրել</th>
				</tr>
			</thead>
			<tbody>
				<?php for( $i = 0; $i < count( $results->data ); $i++ ) : ?>
					<tr>
					<td><?php echo $results->data[$i]['schoolName']; ?></td>
						<td><?php echo $results->data[$i]['city']; ?></td>
						<td><?php
							$regionId = $results->data[$i]['region_id'];
							$sql="SELECT * FROM regions WHERE id = $regionId";
							$result = mysqli_query($conn, $sql);
							while ($oneRow = mysqli_fetch_assoc($result)) {
								echo $oneRow['region'];
							}
							 ?></td>
						<td><a href = "update.php?id=<?php echo $results->data[$i]['id']; ?>"><i class='glyphicon glyphicon-pencil'></i></a>
						<a href = "delete.php?id=<?php echo $results->data[$i]['id']; ?>" onclick="return confirm('Are you sure?')"><i class='glyphicon glyphicon-trash'></i></a>
						<a target="_blank" href = "front.php#/school<?php echo $results->data[$i]['id']; ?>"><i class='glyphicon glyphicon-eye-open'></i></a>
						</td>
					</tr>
				<?php endfor; ?>
			</tbody>
		</table>
		<?php echo $Paginator->createLinks( $links, 'pagination pagination-sm' ); ?>
	</div>

</body>
</html>
