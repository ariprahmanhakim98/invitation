<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyApps</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/styled.css">

</head>

<body>
	<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
		<div class="container">
			<a class="navbar-brand myapps" href="#">MyApps</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active">Welcome <?php echo $this->session->userdata("nama"); ?> !</a>
					</li>
					<?php if ($this->session->userdata("nama") == 'admin') : ?>
						<li class="nav-item">
							<a href="../../invite/c_invitation" class="nav-link active">list</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link active">Info</a>
						</li>
					<?php endif; ?>
				</ul>
				<form class="d-flex">
					<a href="../c_auth/logout">
						<button type="button" class="btn btn-light">Logout</button>
					</a>
				</form>
			</div>
		</div>
	</nav>
	<div class="container mt-4" style="margin-bottom: 100px">
		<div class="text-center">
			<h1 class="list">Welcome <?php echo $this->session->userdata("nama"); ?></h1>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="card text-bg-primary mb-3">
					<div class="card-header">Total User</div>
					<div class="card-body">
						<h1 class="card-title"><?= $user ?></h1>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card text-bg-secondary mb-3">
					<div class="card-header">Total Data</div>
					<div class="card-body">
						<h1 class="card-title"><?= $data ?></h1>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card text-bg-success mb-3">
					<div class="card-header">New Data</div>
					<div class="card-body">
						<h1 class="card-title">50</h1>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer fixed-bottom text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 py-2">
					<span>&copy; 2023</span><br>
					<span>by: ariprahmanhakim</span>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
