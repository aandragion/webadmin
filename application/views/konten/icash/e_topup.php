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

				<a href="<?php echo site_url('admin/topctr') ?>"><i class="fa fa-arrow-left"></i>
				Back</a>
			</div>
			<div class="card-body">

				<form action="<?php base_url(" admin/topctr/edit") ?>" method="post"
					enctype="multipart/form-data" >

					<input type="hidden" name="id_topup" value="<?php echo $topup->id_topup?>" />
					<input type="hidden" name="tanggal" value="<?php echo $topup->tanggal?>" />
					<input type="hidden" name="id_user" value="<?php echo $topup->id_user?>" />
					<input type="hidden" name="id_bank" value="<?php echo $topup->id_bank?>" />
					<input type="hidden" name="jumlah_transfer" value="<?php echo $topup->jumlah_transfer?>" />
			<!-- 		<input type="hidden" name="rek_pemilik" value="<?php echo $topup->rek_pemilik?>" /> -->
					<input type="hidden" name="n_pemilik" value="<?php echo $topup->n_pemilik?>" />
					<input type="hidden" name="bts_topup" value="<?php echo $topup->bts_topup?>" />
					<input type="hidden" name="id_status" value="1" />	
					<input type="text" name="" value="Berhasil" disabled />	
				

					<input class="btn btn-success" type="submit" name="btn" value="Save" />
				</form>

			</div>
<!-- 
			<div class="card-footer small text-muted">
				* required fields
			</div> -->


		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->


</body>

</html>
	</div>
	<!-- /.content-wrapper -->





