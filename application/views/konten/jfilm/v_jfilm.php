
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

						<i class="fa fa-list-alt"></i> Jadwal Film

					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table-hover " id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th><center/> Film </th>
										<th><center/> Tanggal Tayang </th>
										<th><center/> jamTayang </th>
										<th><center/> Harga </th>
										<th><center/> Studio </th>
										<th><center/> Action </th>
									</tr>
								</thead>
								<tbody id="myTable">
									<?php $no=1; foreach ($jadwal as $row): ?>
									<tr class="odd gradeX">
										<td><?php echo $no++; ?></td>
										<td  >
											<?php echo $row->judul_film ?>
										</td>
										<td class="small">
											<?php echo $row->tgl_jadwal ?>
										</td>
										<td class="small">
											
											<?php 
											echo $row->jam_tayang ?>
										</td>
										<td class="small">
											<?php echo $row->harga ?>
										</td>
										<td class="small">
											<?php echo $row->studio ?>
										</td>
										<td width="250"><center/>
											<a href="<?php echo site_url('admin/jfctr/edit/'.$row->id_jadwal) ?>"
												class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
												<!-- <a onclick="deleteConfirm('<?php echo site_url('admin/bankctr/delete/'.$row->id_bank) ?>')"
													href="<?php echo site_url('admin/bankctr/delete/'.$row->id_bank) ?>" class="btn btn-small text-danger"><i class="fa fa-trash"></i> Hapus</a> -->
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
							<form action="<?php echo site_url('admin/jfctr/add'); ?>" method="post" enctype="multipart/form-data"> 
								<div class="modal-content">
									<div class="modal-header bg-primary">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Data</h4>
									</div>
									<div class="modal-body">
										<div class="forFFm-group">
											<label class='col-md-3'>Film</label>
											<div class='col-md-9'>
												<select class="form-control" name="id_film">
													<option>-Pilih Film-</option>
													<?php
													foreach ($film as $row) : ?>
														<option value="<?php echo $row->id_film ?>"><?php echo $row->judul_film ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<br>

										<div class="form-group">
											<label class='col-md-3'>Tanggal Tayang</label>
											<div class='col-md-9'>
												<input type="date" name="tgl_jadwal"  class="form-control" >
											</div>
										</div>
										<br>
										<div class="forFFm-group">
											<label class='col-md-3'>Jam Tayang</label>
											<div class='col-md-9'>
												<select class="form-control" name="id_jamtayang">
													<option>-Pilih Jam Tayang-</option>
													<?php
													foreach ($jamtayang as $row) : ?>
														<option value="<?php echo $row->id_jamtayang ?>"><?php echo $row->jam_tayang ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<br>
										<div class="forFFm-group">
											<label class='col-md-3'>harga</label>
											<div class='col-md-9'>
												<select class="form-control" name="id_harga">
													<option>-Pilih harga-</option>
													<?php
													foreach ($harga as $row) : ?>
														<option value="<?php echo $row->id_harga ?>"><?php echo $row->harga ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<br>
										<div class="forFFm-group">
											<label class='col-md-3'>Studio</label>
											<div class='col-md-9'>
												<select class="form-control" name="id_studio">
													<option>-Pilih Studio-</option>
													<?php
													foreach ($studio as $row) : ?>
														<option value="<?php echo $row->id_studio ?>"><?php echo $row->studio ?></option>
													<?php endforeach; ?>
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

					<!-- <script>
						$(document).ready(function(){
							$("#tgl_jadwal").datepicker({
							})
						})
					</script> -->

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

