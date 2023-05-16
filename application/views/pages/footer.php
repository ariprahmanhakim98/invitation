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
			title: 'Success',
			message: "<?= $this->session->flashdata('success') ?>",
			position: 'topRight',
			color: 'green'
		});
	<?php endif ?>
</script>
</body>

</html>
