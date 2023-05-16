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
						<form action="<?= base_url('invite/c_invitation/store') ?>" method="POST">
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
	<div class="mt-5 table-responsive" id="mb-table">
		<table class="table table-success table-striped">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Name</th>
					<th scope="col">Price</th>
					<th scope="col">Info</th>
					<th scope="col">Address</th>
					<?php if($this->session->userdata("nama") == 'admin') : ?>
					<th scope="col">Action</th>
					<?php endif; ?>
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
								<?php if($this->session->userdata("nama") == 'admin') : ?>
								<td style="">
									<div class="d-flex">
										<a href="<?= base_url() ?>invite/c_invitation/edit/<?= $key->id ?>" type="button" class="btn btn-info btn-sm mx-2">Edit</a>
										<form method="POST" action="<?= base_url('invite/c_invitation/delete') ?>">
											<input type="hidden" name="id" value="<?= $key->id ?>">
											<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" id="<?= $this->security->get_csrf_token_name() ?>" class="form-control" value="<?= $this->security->get_csrf_hash() ?>">
											<button type="submit" class="btn btn-danger btn-sm">Delete</button>
										</form>
									</div>
								</td>
								<?php endif; ?>
							</tr>
				<?php endforeach;
					endif;
				endif;

				?>
			</tbody>
		</table>
	</div>
</div>
