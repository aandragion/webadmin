<!--   Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<!DOCTYPE html>
	<html lang="en">

	<body id="page-top">

		

		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		<?php endif; ?>

		<div class="card mb-3">
			<div class="card-header">
				<a href="<?php echo site_url('admin/dfcontroller') ?>"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
			<div class="card-body">

				<form action="<?php base_url('admin/product/add') ?>" method="post" enctype="multipart/form-data" >
					<div class="form-group">
						<label for="judul_film">Judul*</label>
						<input class="form-control <?php echo form_error('judul_film') ? 'is-invalid':'' ?>"
						type="text" name="judul_film" placeholder="Product judul_film" />
						<div class="invalid-feedback">
							<?php echo form_error('judul_film') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="sinopsis">sinopsis*</label>
						<input class="form-control <?php echo form_error('sinopsis') ? 'is-invalid':'' ?>"
						type="text" name="sinopsis" min="0" placeholder="Product sinopsis" />
						<div class="invalid-feedback">
							<?php echo form_error('sinopsis') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="gambar">gambar</label>
						<input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
						type="file" name="gambar" />
						<div class="invalid-feedback">
							<?php echo form_error('gambar') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="trailer">trailer</label>
						<input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
						type="file" name="trailer" />
						<div class="invalid-feedback">
							<?php echo form_error('trailer') ?>
						</div>
					</div>


					

					<div class="form-group">
						<label for="name">status film*</label>
						<textarea class="form-control <?php echo form_error('status_film') ? 'is-invalid':'' ?>"
							name="status_film" placeholder="Product status_film..."></textarea>
							<div class="invalid-feedback">
								<?php echo form_error('status_film') ?>
							</div>
						</div>

						<input class="btn btn-success" type="submit" name="btn" value="Save" />
					</form>

				</div>

				<div class="card-footer small text-muted">
					* required fields
				</div>


			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->



</body>

</html>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



