<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyApps</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4 mt-5">
				<div class="card">
				<img src="assets/img/bg.jpg" class="card-img-top" style="max-height: 125px" alt="img mountain">
					<div class="card-body">
						<form action="c_auth/aksi_login" method="post">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" id="<?= $this->security->get_csrf_token_name() ?>">
							<div class="mb-3">
								<label class="form-label">Username</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="mb-3">
								<label class="form-label">Password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="d-grid gap-2">
								<button class="btn btn-primary" type="submit">LOGIN</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
	<script>
		<?php if ($this->session->flashdata('failed')) : ?>
			iziToast.show({
				title: 'Failed',
				message: "<?= $this->session->flashdata('failed') ?>",
				position: 'topRight',
				color: 'red'
			});
		<?php endif ?>
		<?php if ($this->session->flashdata('success')) : ?>
			iziToast.show({
				title: 'success',
				message: "<?= $this->session->flashdata('success') ?>",
				position: 'topRight',
				color: 'green'
			});
		<?php endif ?>
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
