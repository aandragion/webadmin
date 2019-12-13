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

							<i class="fa fa-shopping-cart"></i> Data Pesanan
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table-hover " id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th><center/>User</th>
											<th><center/>Tanggal Pesan</th>
											<th><center/>Film</th>
											<th><center/>Jadwal</th>
											<th><center/>Kursi</th>
											<th><center/>Jumlah Pesanan</th>
											<th><center/>Total Harga</th>
											<th><center/>Status Pesanan</th>
											<!-- <th><center/>Action</th> -->
										</tr>
									</thead>
									<tbody id="myTable">
										<?php $no=1; foreach ($pesan as $row): ?>
										<tr class="odd gradeX">
											<td><?php echo $no++; ?></td>
											<td  >
												<?php echo $row->username ?>
											</td>
											<td width="125"><center/>
												<?php echo $row->tanggal_pesan ?>
											</td>
											<td width="100"><center/>
												<?php echo $row->judul_film ?>
											</td>
											<td width="100"><center/>
												<?php echo $row->tgl_jadwal ?>
											</td>
									<!-- 			<td class="small">
													<?php echo $row->id_jamtayang ?>
												</td>
												<td class="small">
													<?php echo $row->id_studio ?>
												</td> -->
												<td ><center/>
													<?php echo $row->id_kursi ?>
												</td>
							<!-- 					<td class="small">
													<?php echo $row->id_harga ?>
												</td> -->
												<td width="105"><center/>
													<?php echo $row->jumlah_pesanan ?>
												</td>
												<td ><center/>
													<?php echo $row->total_harga ?>
												</td>
												<td width="100"><center/>
													<?php echo $row->status ?>
												</td>
								<!-- 				<td width="100"><center/>
													<a href="<?php echo site_url('admin/dfcontroller/edit/'.$row->id_pesan) ?>"
														class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
														<!-- <a onclick="deleteConfirm('<?php echo site_url('admin/dfcontroller/delete/'.$row->id_pesan) ?>')"
															href="<?php echo site_url('admin/dfcontroller/delete/'.$row->id_pesan) ?>" class="btn btn-small text-danger"><i class="fa fa-trash"></i> Hapus</a> -->
													<!-- 	</td> --> 
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
		</div>
		<!-- /.content-wrapper -->

