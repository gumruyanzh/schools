<?php


?>


<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Schools</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
<!-- 				<li><a href="#">link1</a></li>
				<li><a href="#">link2</a></li> -->
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Դասավորել ըստ՝ <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="?order=region">Մարզերի անվան</a></li>
						<li><a href="?order=schoolName">Դպրոցների անվան</a></li>
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-left" role="search" action="" method="GET">
				<div class="form-group">
					<input name='q' type="text" value="<?php echo isset($_GET['q']) ? htmlspecialchars(strip_tags($_GET['q'])) : ''; ?>" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
