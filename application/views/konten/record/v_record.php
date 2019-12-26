<!--   Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!DOCTYPE html>
  <html lang="en">
  <script>
  function printContent(el){
    var judul = document.getElementById('judul');
    judul.style.textAlign ="center";
    judul.innerHTML = 'LAPORAN REKAPITULASI NEW STAR CINEPLEX';

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
                  <div class='col-md-6'><input type="date" name="tgl_awal"  required placeholder="Masukkan Modal Name" class="form-control" ></div>
                  <div class='col-md-6'><input type="date" name="tgl_akhir"  required placeholder="Masukkan Modal Name" class="form-control" ></div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" value="true" class="btn btn-primary">Cari</button>
              </div>
            </div>
            <?php echo form_close(); ?>

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

                <!-- <div class="title">
                <center>
                DAFTAR MAHASISWA<br/>
                FAKULTAS TEKNIK<br/>
                UNIVERSITAS MUHAMMADIYAH SIDOARJO
              </center>
            </div> -->
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
                      <?php $k=" Pesanan"; echo $recort->j_pesanan, $k ?>
                    </td>
                    <td><center/>
                      <?php $k=" Kursi"; echo  $recort->j_kursi, $k ?>
                    </td>
                    <td><center/>
                      <?php $k=" Kursi"; echo $recort->j_kursib, $k ?>
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
