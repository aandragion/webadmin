<meta http-equiv="refresh" content="5" /><!--   Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<!DOCTYPE html>
	<html lang="en">

	<body>
		<!-- DataTables -->
		<div class="card mb-3">
			<div class="card-body">
				<div class="panel-body">
					<ul class="pull-right">
						<input class="form-control" id="myInput" type="text" placeholder="Search..">
					</ul>
					<hr>
					<div class="panel panel-primary">
						<div class="panel-heading">

							<i class="fa fa-credit-card"></i> Data Transfer
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table-hover" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>

									<!-- 		<th>Rekening pemilik</th> -->
											<th>Nama pemilik</th>
											<th>Jumlah Transfer</th>
											<th>Batas Pembayaran</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="myTable">
										<?php $no=1; foreach ($transfer as $transfer): ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td width="150">
													<?php echo $transfer->username ?>
												</td>

											<!-- 	<td>
													<?php echo $topup->rek_pemilik ?>
												</td> -->
												<td>
													<?php echo $transfer->nama ?>
												</td>
												 <td width="150">
													<?php echo $transfer->total_harga ?>
												</td>
												<td>
													<?php echo $transfer->bts_transfer ?>
												</td>
												<td>
													<?php echo $transfer->status ?>
												</td>
												<td width="250">
													<a href="<?php echo site_url('admin/transctr/edit/'.$transfer->id_transfer) ?>" method="post"
														name="id_status" Value = '2'class="btn btn-small" type="submit" name="btn">

														<!-- <i class="fa fa-edit"></i>  -->

													ubah status</a>

														<!-- <a onclick="deleteConfirm('<?php echo site_url('admin/dfcontroller/delete/'.$icash->id_icash) ?>')"
															href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i> Hap1us</a> -->
														</td>
													</tr>
												<?php endforeach; ?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<script>
								$(document).ready(function(){
									$("#myInput").on("keyup", function() {
										var value = $(this).val().toLowerCase();
										$("#myTable tr").filter(function() {
											$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
										});
									});
								});
							</script>
						</div>
					</div>
				</div>

			</body>


			</html>
			<!-- /.content -->

			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
