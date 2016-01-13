<?php

	require 'core.php';
	require 'connecti.php';

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

	<!-- jquery UI -->
	<link rel="stylesheet" href="css/the-modal.css">
	<script src="js/jquerytmpl.js"></script>
	<script src="js/jquery.the-modal.js"></script>


</head>
<body>
<?php include 'frontheader.php'; ?>
	<script id="dialogScript" type="text/x-jquery-tmpl">
		<div class="inContent">
			<div class="row">
				<div class="img"><img src="${image_path}" alt=""></div>
				<div class="schoolName"><h2>${schoolName}</h2></div>
				<div class="col-md-4 leftSide">
					<div class="city"><span class="glyphicon glyphicon-home"></span>&nbsp;<span class="description">Համայնք՝</span> ${city}, ${region}</div>
					<div class="address"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;<span class="description">Հասցե՝</span> ${address}</div>
					<div class="phone"><span class="glyphicon glyphicon-earphone"></span>&nbsp;<span class="description">Հեռ.՝</span> ${number}</div>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4 rightSide">
					<div class="director"><span class="description"><strong>Տնօրեն՝</strong></span> ${directorName} ${directorSurname}</div>
					<div class="email"><span class="description"><strong>Email: </strong></span> ${ashXorhurd} </div>
					<div class="type"><span class="description"><strong>Տիպը՝ </strong></span> ${type}</div>
				</div>
			</div>
			<div class="row">
				<div class="qaxNax"><span class="description"><strong>
					{{if qndpnft != ''}}
						Քաղաքացի նախագիծ՝
					{{/if}}
					</strong></span> <br>{{html qndpnft}}</div><br><br>
				<div class="himnadirner"><span class="description"><strong>
					{{if himnadirner != ''}}
						Հիմնախնդիրներ՝
					{{/if}}
				</strong></span> <br>{{html himnadirner}}</div><br>
				<div class="patmutyun"><span class="description"><strong>
					{{if patmutyun != ''}}
						Պատմություն՝
					{{/if}}
				</strong></span> <br>{{html patmutyun}}</div>
			</div>
		</div>
	</script>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="cubes">
					<div class="modal" id="dialog" style="display: none">
						<span class="close">×</span>
						<?php if (loggedin()): ?>
							<span id="edit"></span>
						<?php endif; ?>
						<div id="dialogContent"></div>
						<span class="btn btn-default btnLeft"><i class="glyphicon glyphicon-chevron-left"></i></span>
						<span class="btn btn-default btnRight"><i class="glyphicon glyphicon-chevron-right"></i></span>
					</div>

				</div>
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
</body>
</html>
