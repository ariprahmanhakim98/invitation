<div class="container">
	<div class="text-center mt-3">
		<h1>Edit Data</h1>
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="card" style="margin-bottom: 100px;">
				<div class="card-body">
					<form action="<?= base_url('invite/c_invitation/update') ?>" method="POST">
						<input type="hidden" name="baseurl" class="form-control" value="<?= base_url() ?>">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" id="<?= $this->security->get_csrf_token_name() ?>" class="form-control" value="<?= $this->security->get_csrf_hash() ?>">
						<div class="modal-body">
							<div class="mb-3">
								<label for="" class="form-label">Name</label>
								<input type="hidden" class="form-control" name="id" value="<?= $edit->id ?>">
								<input type="text" class="form-control" name="name" value="<?= $edit->name ?>">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">Address</label>
								<input type="text" class="form-control" name="address" value="<?= $edit->address ?>">
							</div>
							<div class="mb-3">
								<label for="" class="form-label">Price</label>
								<input type="text" class="form-control" name="price" value="<?= $edit->price ?>">
							</div>
						</div>
						<div class="modal-footer">
							<a href="<?= base_url() ?>invite/c_invitation" type="button" class="btn btn-danger">Back</a>
							<button type="submit" class="btn btn-primary mx-2">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
