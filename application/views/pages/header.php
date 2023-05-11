<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyApps</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styled.css'); ?>">

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
							<a href="<?= base_url('invite/c_invitation'); ?>" class="nav-link active">list</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('invite/c_invitation/info'); ?>" class="nav-link active">Info</a>
						</li>
					<?php endif; ?>
				</ul>
				<form class="d-flex">
					<a href="<?= base_url('c_auth/logout'); ?>">
						<button type="button" class="btn btn-light">Logout</button>
					</a>
				</form>
			</div>
		</div>
	</nav>
