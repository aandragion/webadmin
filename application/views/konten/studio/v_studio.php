<!--   Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="row">
<div class="col-sm-1 col-md-1" >
</div>

			<!-- looping products -->
			  <?php foreach($kursi as $key) : ?>
			  <div class="col-sm-1 col-md-1" >
								  <div class="panel panel-primary" >
					<div  class="panel-body" style="min-height:1px , min-width:1px"><center>
<?php echo $key->Kursi ?>
</div>
</div>
			  </div>
			  <?php endforeach; ?>
			<!-- end looping -->
			<div class="col-sm-1 col-md-1" >
			</div>
			</div>


	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
