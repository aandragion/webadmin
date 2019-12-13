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

		<!-- Card  -->
		<div class="card mb-3">
			<div class="card-header">

				<a href="<?php echo site_url('admin/bankctr') ?>"><i class="fa fa-arrow-left"></i>
				Back</a>
			</div>
			<div class="card-body"> 

				<form action="<?php base_url(" admin/bankctr/edit") ?>" method="post"
					enctype="multipart/form-data" >

					<input type="hidden" name="id" value="<?php echo $bank->id_bank?>" />

					<div class="form-group">
						<label for="nama_bank">Nama Bank</label>
						<input class="form-control <?php echo form_error('nama_bank') ? 'is-invalid':'' ?>"
						type="text" name="nama_bank" placeholder="Judul film" value="<?php echo $bank->nama_bank ?>" />
						<div class="invalid-feedback">
							<?php echo form_error('nama_bank') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="name">Logo Bank</label>
						<input class="form-control-file <?php echo form_error('logo_bank') ? 'is-invalid':'' ?>"
						type="file" name="logo_bank" />
						<input type="hidden" name="old_image" value="<?php echo $bank->logo_bank ?>" />
						<div class="invalid-feedback">
							<?php echo form_error('logo_bank') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="no_rekening">No Rekening</label>
						<input class="form-control <?php echo form_error('no_rekening') ? 'is-invalid':'' ?>"
						type="text" name="no_rekening" placeholder="Sinopsis" value="<?php echo $bank->no_rekening ?>" />
						<div class="invalid-feedback">
							<?php echo form_error('no_rekening') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="nama_pemilik">Nama Pemilik</label>
					<input class="form-control <?php echo form_error('nama_pemilik') ? 'is-invalid':'' ?>"
						type="text" name="nama_pemilik" placeholder="Sinopsis" value="<?php echo $bank->nama_pemilik ?>" />
						<div class="invalid-feedback">
							<?php echo form_error('nama_pemilik') ?>
						</div>
					</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
				</form>

			</div>

			<!-- <div class="card-footer small text-muted">
				* required fields
			</div> -->


		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->

</body>

</html>

	</div>
	<!-- /.content-wrapper -->






