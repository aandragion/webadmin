<!--   Content Wrapper. Contains page content -->
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

							<i class="fa fa-wallet"></i> Data I-cash
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table-hover" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>id_user</th>
											<th>Saldo</th>
								<!-- 			<th>Pemasukkan</th>
											<th>Pengeluaran</th> -->
										<!-- 	<th>Action</th> -->
										</tr>
									</thead>
									<tbody id="myTable">
										<?php foreach ($icash as $icash): ?>
											<tr>
												<td width="150">
													<?php echo $icash->id_user ?>
												</td>
												<td width="150">
													<?php echo $icash->saldo_icash ?>
												</td>
									<!-- 			<td>
													<?php echo $icash->pemasukan ?>
												</td>
												<td>
													<?php echo $icash->pengeluaran ?>
												</td> -->
								<!-- 				<td width="250">
													<a href="<?php echo site_url('admin/dfcontroller/edit/'.$icash->id_icash) ?>"
														class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
														<a onclick="deleteConfirm('<?php echo site_url('admin/dfcontroller/delete/'.$icash->id_icash) ?>')"
															href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i> Hapus</a>
														</td> -->
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
