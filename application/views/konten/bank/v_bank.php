
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

						<i class="fa fa-university"></i> Data Akun Bank

					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table-hover " id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th><center/> Nama Bank </th>
										<th><center/> Logo Bank </th>
										<th><center/> No Rekening </th>
										<th><center/> Nama Pemilik </th>
										<th><center/> Action </th>
									</tr>
								</thead>
								<tbody id="myTable">
									<?php $no=1; foreach ($bank as $row): ?>
									<tr class="odd gradeX">
										<td><?php echo $no++; ?></td>
										<td  >
											<?php echo $row->nama_bank ?>
										</td>
										<td><center/>
											<img src="<?php echo base_url('upload/gbrfilm/'.$row->logo_bank) ?>" width="64" />
										</td>
										<td class="small">
											<?php echo $row->no_rekening ?>
										</td>
										<td class="small">
											<?php echo $row->nama_pemilik ?>
										</td>
										<td width="250"><center/>
											<a href="<?php echo site_url('admin/bankctr/edit/'.$row->id_bank) ?>"
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
							<form action="<?php echo site_url('admin/bankctr/add'); ?>" method="post" enctype="multipart/form-data"> 
								<div class="modal-content">
									<div class="modal-header bg-primary">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Tambah Data</h4>
									</div>
									<div class="modal-body">

										<div class="form-group">
											<label class='col-md-3'>Nama Bank</label>
											<div class='col-md-9'><input type="text" name="nama_bank"  required placeholder="Masukkan Modal Name" class="form-control" ></div>
										</div>
										<br>
										<div class="form-group">
											<label class='col-md-3'>Logo Bank</label>
											<div class='col-md-9'><input type="file" name="logo_bank" id='logo_bank' class="form-control-file" ></div>
										</div>
										<br>
										<div class="form-group">
											<label class='col-md-3'>No Rekening</label>
											<div class='col-md-9'><input type="text" name="no_rekening"  required placeholder="Masukkan Modal Name" class="form-control" ></div>
										</div>
										<br>
										<div class="form-group">
											<label class='col-md-3'>Nama Pemilik</label>
											<div class='col-md-9'><input type="text" name="nama_pemilik"  required placeholder="Masukkan Modal Name" class="form-control" ></div>
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

					<div class="modal fade" id="modal-edit" role="dialog">
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
						</div>

					</div>
				</body>
				</html>
			</div>
		</div>

