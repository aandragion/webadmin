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
						<input class="form-control" id="myInput" type="date" placeholder="Search..">
					</ul>
					<hr>
					<div class="panel panel-primary">
						<div class="panel-heading">

							<i class="fa fa-users"></i> Data User
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table-hover" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th><center/>No</th>
											<th><center/>Film</th>
											<th><center/>Tanggal Tayang</th>
											<th><center/>Jumlah Pesanan</th>
											<th><center/>Jumlah Kursi Terpesan</th>
                      <th><center/>Jumlah Kursi Tersedia</th>
                      <th><center/>Pemasukkan</th>
											<!-- <th><center/>Password</th> -->
											<!-- <th><center/>Action</th> -->
										</tr>
									</thead>
									<tbody id="myTable">
										<?php $no=1;  foreach ($recort as $recort): ?>
										<tr class="odd gradeX" >

											<td><center/><?php echo $no++; ?></td>
											<td width="150">
												<?php echo $recort->judul_film ?>
											</td>
											<td>
												<?php echo $recort->tgl_jadwal ?>
											</td>
											<td><center/>
												<?php echo $recort->j_pesanan ?>
											</td>
											<td><center/>
												<?php echo $recort->j_kursi ?>
											</td>
											<td><center/>
												<?php echo $recort->j_kursib ?>
											</td>
                      <td><center/>
												<?php echo $recort->pemasukkan ?>
											</td>

										<!-- 	<td width="250"><center/>
												<a href="<?php echo site_url('admin/recordctr/edit/'.$recort->id_recort) ?>"
													class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
													<a onclick="deleteConfirm('<?php echo site_url('admin/userctr/delete/'.$user->id_user) ?>')"
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
</div>
<!-- /.content-wrapper -->
