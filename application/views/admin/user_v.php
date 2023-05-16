<div class="container mt-4">
	<div class="text-center">
		<h1 class="list">List User</h1>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12">
			<div class="mt-3">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
					Add
				</button>
			</div>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form action="<?= base_url('admin/c_user/store') ?>" method="POST">
							<input type="hidden" name="baseurl" class="form-control" value="<?= base_url() ?>">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" id="<?= $this->security->get_csrf_token_name() ?>" class="form-control" value="<?= $this->security->get_csrf_hash() ?>">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="mb-3">
									<label for="" class="form-label">Username</label>
									<input type="text" class="form-control" name="username">
								</div>
								<div class="mb-3">
									<label for="" class="form-label">Full Name</label>
									<input type="text" class="form-control" name="full_name">
								</div>
								<div class="mb-3">
									<label for="" class="form-label">Password</label>
									<input type="password" class="form-control" name="password">
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
		<?= var_dump($sum) ?>
		<table class="table table-success table-striped">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Name</th>
					<th scope="col">Password</th>
					<th scope="col">Full Name</th>
					<th scope="col">Photo</th>
					<th scope="col">Total Data</th>
					<th scope="col">Action</th>
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
								<td><?= $key->username ?></td>
								<td><?= $key->password ?></td>
								<td><?= $key->full_name ?></td>
								<td><?= $key->photo ?></td>
								<td>111</td>
								<td style="">
									<div class="d-flex">
										<form method="POST" action="<?= base_url('admin/c_user/delete') ?>">
											<input type="hidden" name="id" value="<?= $key->id ?>">
											<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" id="<?= $this->security->get_csrf_token_name() ?>" class="form-control" value="<?= $this->security->get_csrf_hash() ?>">
											<button type="submit" class="btn btn-danger btn-sm">Delete</button>
										</form>
									</div>
								</td>
							</tr>
				<?php endforeach;
					endif;
				endif;

				?>
			</tbody>
		</table>
	</div>
</div>
