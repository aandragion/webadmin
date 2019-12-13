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

							<i class="fa fa-star"></i> Data Rating
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table-hover" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th><center/>No</th>
											<th><center/>Tanggal</th>
											<th><center/>Nama</th>
											<th><center/>Film</th>
											<th><center/>Nilai</th>
											<th>Ulasan</th>
											<!-- <th><center/>Password</th> -->
											<!-- <th><center/>Action</th> -->
										</tr>
									</thead>
									<tbody id="myTable">
										<?php $no=1;  foreach ($rating as $rating): ?>
										<tr class="odd gradeX" >

											<td width="50" ><center/><?php echo $no++; ?></td>
											<td width="125"><center/>
												<?php echo $rating->tanggal ?>
											</td>
											<td width="150">
												<?php echo $rating->username ?>
											</td>
											<td width="150">
												<?php echo $rating->judul_film ?>
											</td>
											<td width="80"><center/>
												<?php echo $rating->nilai ?>
											</td>
											<td>
												<?php echo $rating->ulasan ?>
											</td>
											<!-- <td><center/>
												<?php echo $user->password ?>
											</td> -->	

										<!-- 	<td width="250"><center/>
												<a href="<?php echo site_url('admin/userctr/edit/'.$user->id_user) ?>"
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


		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

