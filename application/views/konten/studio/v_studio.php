<!--   Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<div class="container">
	<!-- Content Header (Page header) -->
	<div class="row">

		<form method="post" action="<?php echo site_url("admin/studioctr/pencarian")?>">
			<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-3" align="center"> <br>
				<select class="form-control" name="id_jadwal">
					<option>-Pilih Jadwal-</option>
					<?php
					foreach ($jadwal as $row) : ?>
					<option value="<?php echo $row->id_jadwal ?>"><?php echo $row->judul_film ?>	<?php echo $row->tgl_jadwal ?></option>
				<?php endforeach; ?>
			</select>
			</div>
		</div><br>
		<button  type="submit" class="btn btn-primary">Cari</button>
		<!-- <br><input type="submit" class="btn btn-primary" value="Cari"> -->
	</form>

	<?php

	foreach( $kursi as $key) {
		$kursih[] = explode(' ', $key->Kursi);
	}
	$kurs = array_merge(... $kursih);
	// echo '<pre>';
	// print_r($kurs);
	// echo '</pre>';
	echo "<br><div class='row'>";
	if(isset($booking)){
		foreach( $booking as $booked) {
			$kursib[] = explode(' ', $booked->kursi);
		}
		if(isset($kursib)){
			$kursis = array_merge(... $kursib);
			$filkur = array_unique($kursis);
		}else {
			$kursib =[];
			$filkur = $kursib;
		}
	}
	else{
		$filkur = [];
	}
	// echo '<pre>';
	// print_r($filkur);
	// echo '</pre>';
	foreach($kurs as $key) {
		echo "

		<div class='col-xs-1' >
		<div class='panel panel-default' >
		<div  class='panel-body' style='text-align: center'><input type='checkbox' nama='seat[]'";
		foreach($filkur as $bookings){
			echo ($bookings === $key) ? 'checked':'';

		}
		echo ">".$key.'</input></div>
		</div>

		</div>';
	}
	echo "	</div>";
	?>
	<!-- <div class="row">
		<!-- looping products -->
		<?php foreach($kursi as $key) : ?>
		<!-- <div class="col-xs-1" >
		<div class="panel panel-default" >
		<div  class="panel-body" style='text-align: center'>
		<label><input type="checkbox" name="kursi"> <?php echo $key->Kursi; ?></label>
	</div>
</div>
</div> -->
<?php endforeach; ?>
<!-- end looping -->
<!-- </div> -->
<!-- /.content -->
</div>
</div>
</div>
<!-- /.content-wrapper -->
