<!--   Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!DOCTYPE html>
  <html lang="en">
  <script>
  function printContent(el){

    var judul = document.getElementById('judul');
    var judul1 = document.getElementById('judul1');
    var logo = document.getElementById('logo');
    judul.style.textAlign ="center";
    judul.innerHTML = 'LAPORAN REKAPITULASI';
    judul1.style.textAlign ="center";
    judul1.innerHTML = 'BIOSKOP NEW STAR CINEPLEX BANYUWANGI';
   //  logo.style.textAlign ="center";
   //  // logo.innerHTML = 'PERIODE 01/12/2019 sampai 31/12/2019';
   // logo.innerHTML = "'Periode.'<?php
   //  echo $awal
   //  ?>'sampai'";
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<body>
  <!-- DataTables -->
  <div class="card mb-3">
    <div class="card-body">
      <div div class="row">
        <div class="col-lg-4 col-md-4 col-md-auto">
          <?php echo form_open('admin/recordctr/cari_jadwal'); ?>
          <div class="panel-body">
            <div class="form-group">
              <label for="sel1">Pilih Film :</label>
              <select name="film" class="form-control" id="kelas">
                <option selected="" disabled="">  Pilih Film  </option>
                <option value="">  Pilih Semua  </option>
                <?php
                $data_film = $this->db->query('SELECT * FROM film')->result();
                foreach ($data_film as $value) {
                  echo '<option value="'.$value->id_film.'">'.$value->judul_film.'</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="sel1">Pilih Studio :</label>
              <select name="studio" class="form-control" id="kelas">
                <option selected="" disabled="">  Pilih Studio  </option>
                  <option value="">  Pilih Semua  </option>
                <?php
                $data_film = $this->db->query('SELECT * FROM studio')->result();
                foreach ($data_film as $value) {
                  echo '<option value="'.$value->id_studio.'">'.$value->studio.'</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="sel1">Range Tanggal :</label>
              <div  class="row">
                <div class='col-md-6'><input type="date" name="tgl_awal"   class="form-control" ></div>
                <div class='col-md-6'><input type="date" name="tgl_akhir"  class="form-control" ></div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" value="true" class="btn btn-primary">Cari</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        <!-- <div class="col-lg-12 col-md-12 col-md-auto">
          <div class="form-group">
          <?php
          $film = $this->input->post('film');
          $studio = $this->input->post('studio');
          $awal = $this->input->post('tgl_awal');
          $akhir= $this->input->post('tgl_akhir');
    //       if($film || $j_studio || $minggu ) {
    //       $data_film = $this->db->query("SELECT * FROM film where id_film='$film'")->result();
    //       foreach ($data_film as $value) {
    //       $j_film = $value->judul_film;
    //     }
    //     $data_studio = $this->db->query("SELECT * FROM studio where id_studio='$studio'")->result();
    //     foreach ($data_studio as $value) {
    //     $j_studio =$value->studio;
    //   }
    // }
    if($film || $studio || $awal != null) {
    echo 'Pencarian : <br>Film : <strong>'.$film. ', </strong> Studio : <strong>' .$studio. ', </strong> <br>Periode : <strong>' .$awal.'</strong> sampai  <strong>' .$akhir.'</strong>';
  }
  ?>
</div>
</div> -->
</div>
</div>

<div class="panel-body">
  <ul class="pull-right">
    <button class="btn btn-primary" onclick="printContent('div1')"><i class="fa fa-print"></i>Print</button>
  </ul>
  <ul class="pull-right">
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
  </ul>

  <hr>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <i class="fa fa-file-text"></i> Data Laporan
    </div>
    <div class="panel-body">

      <div id="div1" class="table-responsive">

        <div id="judul">
        </div>
        <div id="judul1">
        </div><div id="logo">
        </div>
        <!-- <div class="title">
        <center>
        DAFTAR MAHASISWA<br/>
        FAKULTAS TEKNIK<br/>
        UNIVERSITAS MUHAMMADIYAH SIDOARJO
      </center>
    </div> -->
    <?php   if($awal || $akhir != null) {
      echo 'Periode : <strong>' .$awal.'</strong> sampai <strong>' .$akhir.'</strong><br>';
    } ?>
    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th><center/>No</th>
          <th><center/>Film</th>
          <th><center/>Tanggal Tayang</th>
          <th><center/>Studio</th>
          <th><center/>Jumlah Pesanan</th>
          <th><center/>Jumlah Kursi Terpesan</th>
          <th><center/>Jumlah Kursi Tersedia</th>
          <th><center/>Pemasukkan(RP)</th>
          <!-- <th><center/>Password</th> -->
          <!-- <th><center/>Action</th> -->
        </tr>
      </thead>
      <tbody id="myTable">
        <?php $no=1; $total=0; foreach ($recort as $recort): ?>
          <tr class="odd gradeX" >

            <td><center/><?php echo $no++; ?></td>
            <td>
              <?php echo $recort->judul_film ?>
            </td>
            <td>
              <?php
              // $tanggal = $recort->tgl_jadwal;
              // echo date('d/m/Y', strtotime($tanggal))
              echo $recort->tgl_jadwal;
              ?>
            </td>
            <td><center/>
              <?php echo $recort->studio?>
            </td>
            <td><center/>
              <?php $k=" Pesanan"; echo $recort->j_pesan, $k ?>
            </td>
            <td><center/>
              <?php $k=" Kursi"; echo  $recort->j_kursi, $k ?>
            </td>
            <td><center/>

              <?php $data_kursi = $this->db->query("SELECT COUNT(id_kursi) as kurs FROM kursi")->result();
              foreach ($data_kursi as $value) {
                $jml_kursi = $value->kurs;
              }
              $j_kur= $recort->j_kursi;
              $j_kursib = $jml_kursi-$j_kur;
              $k=" Kursi"; echo $j_kursib, $k ?>
            </td>
            <td ><center/>
              <?php
              echo number_format($recort->masuk, 2, ",", "."); ?>
            </td>
            <?php
            $pemasukkan = $recort->masuk;
            $total += $pemasukkan;
            ?>
            <!-- 	<td width="250"><center/>
            <a href="<?php echo site_url('admin/recordctr/edit/'.$recort->id_recort) ?>"
            class="btn btn-small"><i class="fa fa-edit"></i> Edit</a>
            <a onclick="deleteConfirm('<?php echo site_url('admin/userctr/delete/'.$user->id_user) ?>')"
            href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i> Hapus</a>
          </td> -->
        </tr>

      <?php endforeach; ?>
      <tr>
        <td colspan="7">TOTAL</td>
        <td><center/>
          <?php  echo number_format($total, 2, ",", ".");?>
        </td>
      </tr>
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
