<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Marine</title>

	<link rel="manifest" href="img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href='css/jquery-ui.min.css' type='text/css' rel='stylesheet' >

	<link href="css/style.css" rel="stylesheet">
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
	<script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>

	<link rel="stylesheet" type="text/css" href="css/custom-icon.css">
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">

			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">

				</ul>
				<ul class="nav navbar-nav navbar-right">

				</ul>
			</div>
		</div>
	</nav>

	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
				</div>
				<div class="col-md-2">
					<div class="dropdown create">
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
							<li><a href="#">Add Post</a></li>
							<li><a href="#">Add User</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section id="breadcrumb">

		<div class="container">
			<ol class="breadcrumb">
			</ol>
		</div>
	</section>

	<section id="main">
		<div class="container" >
			<div class="row">
				<div class="col-md-2">
					<div class="list-group">

						<a href="#" class="list-group-item active main-color-bg">
							Welcome, </br><?php echo $_SESSION['name']; ?>
						</a>
						<div class="list-group-item">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a href="index.php?page=home&session=1">Home</a>
								</h4>
							</div>
						</div>

						<div class="list-group-item">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a href="index.php?page=inspection_details&session=1"></span> Create New Inspection</a>
								</h4>
							</div>
						</div>

						<!-- <div class="list-group-item">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a href="#">Corrective Action Plan</a>
								</h4>
							</div>
						</div> -->

						<div class="list-group-item">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a href="index.php?page=logout">Log Out</a>
								</h4>
							</div>
						</div>
					</div>
				</div>
