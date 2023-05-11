<?php
if ($user->photo == "") {
	$imgfoto	 = base_url() . "assets/img/user.png";
} else {
	$imgfoto 	 = base_url() . "assets/potoprofile/" . $user->photo;
}

?>

<div class="container" style="margin-bottom: 100px">
	<div class="row mt-5">
		<div class="col-md-4">
			<div class="text-center" id="picture" style="cursor: pointer;">
				<form id="formProfile" action="<?= base_url('c_auth/updatepicture') ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" id="<?= $this->security->get_csrf_token_name() ?>">
					<input type="file" name="file_img" id="file_img" class="form-control ">
					<input type="hidden" name="forname" class="form-control" value="<?= $user->username ?>">
					<input type="hidden" name="forid" class="form-control" value="<?= $user->id ?>">
					<img src="<?= $imgfoto ?>" id="image" class="img-thumbnail" style="height: 300px; width: 300px; border-radius: 50%;" alt="img mountain">
				</form>
			</div>
			<div class="d-grid gap-2 mb-3">
				<h2 id="username" class="text-center"><?php echo $this->session->userdata("nama"); ?></h2>
				<button class="btn btn-primary" id="edit">Edit Profile</button>
				<div id="hide">
					<form action="<?= base_url('profile/c_profile/update') ?>" method="post">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" id="<?= $this->security->get_csrf_token_name() ?>">
						<div class="mb-3">
							<label class="form-label">Username</label>
							<input type="text" name="username" class="form-control" value="<?= $user->username ?>">
						</div>
						<div class="mb-3">
							<label class="form-label">Password</label>
							<button type="button" id="cpass" class="btn btn-danger btn-sm">Change Password ?</button>
							<input type="text" id="password" name="password" class="form-control">
						</div>
						<div class="mb-3">
							<label class="form-label">Full Name</label>
							<input type="text" name="fname" class="form-control" value="<?= $user->full_name ?>">
							<!-- <input type="password" name="password" class="form-control"> -->
						</div>
						<div class="text-center">
							<button class="btn btn-primary" type="submit">Save</button>
							<button class="btn btn-danger" type="button" id="cancel">Cancel</button>
						</div>
					</form>
				</div>

			</div>
		</div>
		<div class="col-md-8">
			<div>
				<h1>Hallo <?= $user->full_name ?> !</h1>
			</div>
			Bootstrap is developed mobile first, a strategy in which we optimize code for mobile devices first and then scale up components as necessary using CSS media queries. To ensure proper rendering and touch zooming for all devices, add the responsive viewport meta tag to your
			<div class="mt-4">
				<h4>History</h4>
				<div class="alert alert-primary" role="alert">
					Name : John Doe || Price : 20000 || Address : Los Angles
				</div>
				<div class="alert alert-primary" role="alert">
					Name : John Doe || Price : 20000 || Address : Los Angles
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#file_img').hide();
		$("#hide").hide();
		$("#password").hide();
		$("#svpicture").hide();
		$('body').on('click', '#edit', function(e) {
			$("#hide").show();
			$("#edit").hide();
			$("#username").hide();
		});

		$('#image').click(function() {
			$('#file_img').trigger('click');
			$("#svpicture").show();
		});

	});

	$('body').on('change', '#file_img', function(e) {
		e.preventDefault();
		setTimeout(function() {
			$('#formProfile').submit()
		}, 500);
	});

	$('body').on('click', '#cpass', function(e) {
		$("#cpass").hide();
		$("#password").show();
	});

	$('body').on('click', '#cancel', function(e) {
		$("#hide").hide();
		$("#edit").show();
		$("#username").show();
	});

	<?php if ($this->session->flashdata('success')) : ?>
		iziToast.show({
			title: 'success',
			message: "<?= $this->session->flashdata('success') ?>",
			position: 'topRight',
			color: 'green'
		});
	<?php endif ?>
</script>
