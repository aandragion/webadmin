
<!--   Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<!DOCTYPE html>
	<html lang="en">
	<style>
		hr {
			display: block;
			margin-top: 0.1em;
			margin-bottom: 0.1em;
			margin-left: auto;
			margin-right: auto;
		}
	</style>


	<body>
		<!-- DataTables -->
		<div class="card mb-3">

		<!-- <div class="card-body">
			<div class="card-header">
				<a href="<?php echo site_url('admin/dfcontroller/add') ?>" class="fa fa-plus"> Add New</a>
			</div>  -->
			<div class="panel-body">



				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
					<i class="fa fa-film"></i>
					Tambah
				</button>

				<ul class="pull-right">
					<input class="form-control" id="myInput" type="text" placeholder="Search..">
				</ul>
				<hr>

				<div class="panel panel-primary">
					<div class="panel-heading">

						<i class="fa fa-film"></i> Data Film

					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table-hover " id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th><center/> Judul </th>
										<th><center/> Sinopsis </th>
										<th><center/> Gambar </th>
										<th><center/> Trailer </th>
										<th><center/> Genre </th>
										<th><center/> Status film </th>
										<th><center/> durasi </th>
										<th><center/> rilis </th>
										<th><center/> Rating </th>
										<th><center/> Action </th>
									</tr>
								</thead>
								<tbody id="myTable">
									<?php $no=1; foreach ($film as $row): ?>
									<tr class="odd gradeX">
										<td><?php echo $no++; ?></td>
										<td  >
											<?php echo $row->judul_film ?>
										</td>
										<td  class="small"  width="350">
											<?php echo $row->sinopsis ?>
										</td>
										<td><center/>
											<img src="<?php echo base_url('upload/gbrfilm/'.$row->gambar) ?>" width="64" />
										</td>
										<!-- <td><center/>
											<video src="<?php echo base_url('upload/vdfilm/'.$row->trailer) ?>" width="64" />
											</td> -->
											<td >
												<!-- <?php echo $row->trailer ?> -->
												 <a href="<?php echo ('https://www.youtube.com/watch?v='.$row->trailer); ?>"> <?php echo $row->judul_film ?> </a>
											</td>
											<td >
												<?php echo $row->genre ?>
											</td>
											<td >
												<?php echo $row->status_film ?>
											</td>
											<td >
												<?php $t=" menit"; echo $row->durasi,$t ?>
											</td>
											<td >
												<?php echo $row->rilis ?>
											</td>
												<td >
												<?php echo $row->total_view ?>
											</td>
											<td><center/>
												<a href="<?php echo site_url('admin/dfcontroller/edit/'.$row->id_film) ?>"
													class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
												<a onclick="deleteConfirm('<?php echo site_url('admin/dfcontroller/delete/'.$row->id_film) ?>')"
													href="<?php echo site_url('admin/dfcontroller/delete/'.$row->id_film) ?>" class="btn btn-small text-danger"><i class="fa fa-trash"></i> Hapus</a>
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

					<div id="modal-tambah" class="modal fade">
						<div class="modal-dialog">
							<form action="<?php echo site_url('admin/dfcontroller/add'); ?>" method="post" enctype="multipart/form-data">
								<div class="modal-content">
									<div class="modal-header bg-primary">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Data</h4>
									</div>
									<div class="modal-body">

										<div class="form-group">
											<label class='col-md-3'>judul</label>
											<div class='col-md-9'><input type="text" name="judul_film"  required placeholder="Masukkan Modal Name" class="form-control" ></div>
										</div>
										<br>
										<div class="form-group">
											<label class='col-md-3'>sinopsis</label>
											<div class='col-md-9'><input type="text" name="sinopsis"  required placeholder="Masukkan Modal Name" class="form-control" ></div>
										</div>
										<br>
										<div class="form-group">
											<label class='col-md-3'>trailer</label>
											<div class='col-md-9'><input type="text" name="trailer" id='trailer'  required placeholder="Masukkan Modal Name" class="form-control" ></div>
										</div>
										<br>
										<div class="form-group">
											<label class='col-md-3'>gambar</label>
											<div class='col-md-9'><input type="file" name="gambar" id='gambar' class="form-control-file" ></div>
										</div>
										<br>
										<div class="forFFm-group">
											<label class='col-md-3'>Genre</label>
											<div class='col-md-9'>
												<select class="form-control" name="id_genre">
													<option>-Pilih Genre-</option>
													<?php
													foreach ($genre as $row) : ?>
														<option value="<?php echo $row->id_genre ?>"><?php echo $row->genre ?></option>

													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<br>
										<div class="form-group">
											<label class='col-md-3'>Durasi</label>
											<div class='col-md-9'><input type="text" name="durasi"  required placeholder="Masukkan Durasi berformat menit" class="form-control" ></div>
										</div>
										<br>
										<div class="form-group">
											<label class='col-md-3'>Rilis</label>
											<div class='col-md-9'><input type="date" name="rilis"  required placeholder="Masukkan Modal Name" class="form-control" ></div>
										</div>
										<br>
										<div class="form-group">
											<label class='col-md-3'>status film</label>
											<!-- <div class='col-md-9'><input type="text" name="status_film"  required placeholder="Masukkan Modal Name" class="form-control" ></div> -->
											<div class='col-md-9'>
												<select class="form-control" name="status_film">
													<option>-Pilih Status-</option>
													<option value="playing">Playing</option>
													<option value="coming soon">Coming Soon</option>
												</select>
											</div>
										</div>
										<br>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

				<!-- 	<div class="modal fade" id="modal-edit" role="dialog">
						<div class="modal-dialog">
							<?php foreach ($film as $film): ?>
								<input type="hidden" name="id" value="<?php echo $film->id_film?>">
								<form action="<?php echo site_url('admin/dfcontroller/edit'); ?>" method="post" enctype="multipart/form-data">

									<div class="modal-content">
										<div class="modal-header bg-primary">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Edit Data</h4>
										</div>
										<div class="modal-body">

											<div class="form-group">
												<label class='col-md-3'>judul</label>
												<div class='col-md-9'><input type="text" name="judul_film"  required placeholder="Masukkan Modal Name" class="form-control" value="<?php echo $film->judul_film ?>" ></div>
											</div>
											<br>
											<div class="form-group">
												<label class='col-md-3'>sinopsis</label>
												<div class='col-md-9'><input type="text" name="sinopsis"  required placeholder="Masukkan Modal Name" class="form-control" ></div>
											</div>
											<br>
											<div class="form-group">
												<label class='col-md-3'>trailer</label>
												<div class='col-md-9'><input type="file" name="trailer" id='trailer'  class="form-control-file" ></div>
											</div>
											<br>
											<div class="form-group">
												<label class='col-md-3'>gambar</label>
												<div class='col-md-9'><input type="file" name="gambar" id='gambar' class="form-control-file" ></div>
											</div>
											<br>
											<div class="form-group">
												<label class='col-md-3'>Genre</label>
												<div class='col-md-9'>
													<select class="form-control" name="id_genre">
														<option>-Pilih Genre-</option>
														<?php
														foreach ($genre as $row) : ?>
															<option value="<?php echo $row->id_genre ?>"><?php echo $row->genre ?></option>

														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<br>
											<div class="form-group">
												<label class='col-md-3'>status film</label>
												<div class='col-md-9'><input type="text" name="status_film"  required placeholder="Masukkan Modal Name" class="form-control" ></div>
											</div>
											<br>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
										</div>
									<?php endforeach; ?>
								</form>

							</div>
						</div> -->

					</div>
				</div>

		</body>
		</html>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
