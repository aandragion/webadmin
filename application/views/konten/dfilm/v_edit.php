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

				<a href="<?php echo site_url('admin/dfcontroller') ?>"><i class="fa fa-arrow-left"></i>
				Back</a>
			</div>
			<div class="card-body">

				<form action="<?php base_url(" admin/dfcontroller/edit") ?>" method="post"
					enctype="multipart/form-data" >

					<input type="hidden" name="id_film" value="<?php echo $film->id_film?>" />

					<div class="form-group">
						<label for="judul_film">Name</label>
						<input class="form-control <?php echo form_error('judul_film') ? 'is-invalid':'' ?>"
						type="text" name="judul_film" placeholder="Judul film" value="<?php echo $film->judul_film ?>" />
						<div class="invalid-feedback">
							<?php echo form_error('judul_film') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="sinopsis">Sinopsis</label>
						<input class="form-control <?php echo form_error('sinopsis') ? 'is-invalid':'' ?>"
						type="text" name="sinopsis" placeholder="Sinopsis" value="<?php echo $film->sinopsis ?>" />
						<div class="invalid-feedback">
							<?php echo form_error('sinopsis') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Photo</label>
						<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
						type="file" name="gambar" />
						<input type="hidden" name="old_image" value="<?php echo $film->gambar ?>" />
						<div class="invalid-feedback">
							<?php echo form_error('gambar') ?>
						</div>
					</div>
					<div class="form-group">
				<label for="trailer">Trailer</label>
				<input class="form-control <?php echo form_error('trailer') ? 'is-invalid':'' ?>"
				type="text" name="trailer" placeholder="Sinopsis" value="<?php echo $film->trailer ?>" />
				<div class="invalid-feedback">
					<?php echo form_error('trailer') ?>
				</div>
			</div>
					<!-- <div class="form-group">
						<label for="trailer">Trailer</label>
						<input class="form-control-file <?php echo form_error('trailer') ? 'is-invalid':'' ?>"
						type="file" name="trailer" />
						<input type="hidden" name="old_video" value="<?php echo $film->trailer ?>" />
						<div class="invalid-feedback">
							<?php echo form_error('trailer') ?>
						</div>
					</div> -->
					<!-- 		<input type="hidden" name="id_genre" value="<?php echo $film->id_genre?>" /> -->
					<!-- <input type="hidden" name="durasi" value="<?php echo $film->durasi?>" /> -->
					<input type="hidden" name="rilis" value="<?php echo $film->rilis?>" />

					<div class="form-group">
				<label for="durasi">Durasi</label>
				<input class="form-control <?php echo form_error('durasi') ? 'is-invalid':'' ?>"
				type="text" name="durasi" placeholder="Durasi" value="<?php echo $film->durasi ?>" />
				<div class="invalid-feedback">
					<?php echo form_error('durasi') ?>
				</div>
			</div>

			<div class="form-group">
				<label for="rilis">Rilis</label>
				<input class="form-control <?php echo form_error('rilis') ? 'is-invalid':'' ?>"
				type="date" name="rilis" placeholder="rilis" value="<?php echo $film->rilis ?>" />
				<div class="invalid-feedback">
					<?php echo form_error('rilis') ?>
				</div>
			</div>

					<div class="form-group">
						<label for="status_film">Gendre</label>
						<div >
							<select class="form-control" name="id_genre" id="">
								<?php

								$opsi_tersimpan = $film->id_genre;
								foreach( $genre as $opsi  ) {
									?>
									<option name="status" <?php echo ($opsi->id_genre == $opsi_tersimpan) ? 'selected'
									: '' ; ?> value="<?php echo $opsi->id_genre ?>"><?php echo $opsi->genre ?></option>';
									<?php
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="status_film">Status Film</label>
						<div >
							<select class="form-control" name="status_film">
								<?php

								$opsis = array(
									'playing'     => 'playing',
									'Coming Soon' => 'coming soon',
									'selesai'	  => 'selesai'

								);
								$opsi_tersimpan =  $film->status_film;
								foreach( $opsis as $opsi  ) {
									?>
									<option name="status" <?php echo ($opsi == $opsi_tersimpan) ? 'selected'
									: '' ; ?> value="<?php echo $opsi ?>"><?php echo $opsi ?></option>';
									<?php
								}
								?>
							</select>
						</div>
					</div>

					<input class="btn btn-success" type="submit" name="btn" value="Save" />
				</form>

			</div>



		</div>

	</body>

	</html>
</div>
<!-- /#wrapper -->
