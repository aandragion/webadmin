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

				<a href="<?php echo site_url('admin/jfctr') ?>"><i class="fa fa-arrow-left"></i>
				Back</a>
			</div>
			<div class="card-body"> 

				<form action="<?php base_url(" admin/jfctr/edit") ?>" method="post"
					enctype="multipart/form-data" >

					<input type="hidden" name="id" value="<?php echo $jadwal->id_jadwal?>" />

					<div class="form-group">
						<label for="judul_film">Film</label>
						<div >
							<select class="form-control" name="id_film" id="">
								<?php 

								$opsi_tersimpan = $jadwal->id_film;
								foreach( $film as $opsi  ) {
									?>
									<option name="status" <?php echo ($opsi->id_film == $opsi_tersimpan) ? 'selected' 
									: '' ; ?> value="<?php echo $opsi->id_film ?>"><?php echo $opsi->judul_film ?></option>';
									<?php 
								}
								?> 
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="tgl_jadwal">Tanggal Tayang</label>
						<input class="form-control <?php echo form_error('tgl_jadwal') ? 'is-invalid':'' ?>"
						type="date" name="tgl_jadwal" placeholder="Product tgl_jadwal" value="<?php echo $jadwal->tgl_jadwal ?>" />
						<div class="invalid-feedback">
							<?php echo form_error('tgl_jadwal') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="sinopsis">Jam Tayang</label>
						<div >
							<select class="form-control" name="id_jamtayang" id="">
								<?php 

								$opsi_tersimpan = $jadwal->id_jamtayang;
								foreach( $jamtayang as $opsi  ) {
									?>
									<option name="status" <?php echo ($opsi->id_jamtayang == $opsi_tersimpan) ? 'selected' 
									: '' ; ?> value="<?php echo $opsi->id_jamtayang ?>"><?php echo $opsi->jam_tayang ?></option>';
									<?php 
								}
								?> 
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="sinopsis">Harga</label>
						<div >
							<select class="form-control" name="id_harga" id="">
								<?php 

								$opsi_tersimpan = $jadwal->id_harga;
								foreach( $harga as $opsi  ) {
									?>
									<option name="status" <?php echo ($opsi->id_harga == $opsi_tersimpan) ? 'selected' 
									: '' ; ?> value="<?php echo $opsi->id_harga ?>"><?php echo $opsi->harga ?></option>';
									<?php 
								}
								?> 
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="status_film">Studio</label>
						<div >
							<select class="form-control" name="id_studio" id="">
								<?php 

								$opsi_tersimpan = $jadwal->id_studio;
								foreach( $studio as $opsi  ) {
									?>
									<option name="status" <?php echo ($opsi->id_studio == $opsi_tersimpan) ? 'selected' 
									: '' ; ?> value="<?php echo $opsi->id_studio ?>"><?php echo $opsi->studio ?></option>';
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


