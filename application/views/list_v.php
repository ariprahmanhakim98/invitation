<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyApps</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/styled.css">

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
							<a href="#" class="nav-link active">list</a>
						</li>
						<li class="nav-item">
							<a href="../invite/c_invitation/info" class="nav-link active">Info</a>
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
	<div class="container mt-4">
		<div class="text-center">
			<h1 class="list">List Invitation <?php echo $this->session->userdata("nama"); ?></h1>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-2 col-md-6">
				<h3>Search Name :</h3>
			</div>
			<div class="col-lg-5 col-md-12">
				<div>
					<form class="d-flex" role="search" action="" method="POST">
						<input class="form-control me-2" name="data" type="search" placeholder="Search" aria-label="Search">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" id="<?= $this->security->get_csrf_token_name() ?>">
						<button class="btn btn-outline-success">Search</button>
					</form>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="mt-3">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Add
					</button>
				</div>
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<form action="c_invitation/store" method="POST">
								<input type="hidden" name="baseurl" class="form-control" value="<?= base_url() ?>">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" id="<?= $this->security->get_csrf_token_name() ?>" class="form-control" value="<?= $this->security->get_csrf_hash() ?>">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="exampleModalLabel">Add Person</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="mb-3">
										<label for="" class="form-label">Name</label>
										<input type="text" class="form-control" name="name">
									</div>
									<div class="mb-3">
										<label for="" class="form-label">Price</label>
										<input type="text" class="form-control" name="price">
									</div>
									<div class="mb-3">
										<label for="" class="form-label">Address</label>
										<input type="text" class="form-control" name="address">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mt-5" id="mb-table">
			<table class="table table-success table-striped">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Name</th>
						<th scope="col">Price</th>
						<th scope="col">Info</th>
						<th scope="col">Address</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($list != null) :
						$no = 1;
						if ($list->num_rows() > 0) :
							foreach ($list->result() as $key) :
					?>
								<tr>
									<th scope="row"><?= $no++ ?></th>
									<td><?= $key->name ?></td>
									<td><?= $key->price ?></td>
									<td><?= $key->information ?></td>
									<td><?= $key->address ?></td>
								</tr>
					<?php endforeach;
						endif;
					endif;

					?>
				</tbody>
			</table>
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
	<script>
		// $(document).ready(function() {
		<?php if ($this->session->flashdata('success')) : ?>
			iziToast.show({
				title: 'Success',
				message: "<?= $this->session->flashdata('success') ?>",
				position: 'topRight',
				color: 'green'
			});
		<?php endif ?>
		// });
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
