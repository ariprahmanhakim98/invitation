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
					<a href="<?= base_url() ?>admin/c_user" type="button" class="btn btn-dark btn-sm mx-2">More</a>
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
