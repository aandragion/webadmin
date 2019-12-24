<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/dist/img/helmet.jpg');?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-film"></i>
          <span> Film <i class="caret"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url() ?>index.php/admin/dfcontroller/index"><i class="fa fa-circle-o"></i> Daftar Film</a></li>
          <li><a href="<?php echo base_url() ?>index.php/admin/jfctr/index"><i class="fa fa-circle-o"></i> Jadwal Film</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url() ?>index.php/admin/psnctr/index">
          <i class="fa fa-shopping-cart"></i> <span>Pesanan</span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-money"></i>
          <span> Saldo  <span class="badge"><?php
          $query = "SELECT COUNT( id_topup ) AS jumlah FROM topup WHERE id_status = 2";
          $hasil = $this->db->query( $query )->result();
          foreach ($hasil as $data) {
            echo $data->jumlah;
          }
          ?></span><i class="caret"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url() ?>index.php/admin/icashctr/index"><i class="fa fa-circle-o"></i>i-cash</a></li>
          <li><a href="<?php echo base_url() ?>index.php/admin/topctr/index"><i class="fa fa-circle-o"></i> Top-up</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url() ?>index.php/admin/userctr/index">
          <i class="fa fa-user"></i>
          <span>user</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url() ?>index.php/admin/bankctr/index">
          <i class="fa fa-university"></i>
          <span>Bank</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url() ?>index.php/admin/transctr/index">
          <i class="fa fa-credit-card"></i>
          <span>Transfer <span class="badge"><?php
          $query = "SELECT COUNT( id_transfer ) AS jumlah FROM transfer WHERE id_status = 2";

          $hasil = $this->db->query( $query )->result();
          foreach ($hasil as $data) {
            echo $data->jumlah;
          }
          ?></span></span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url() ?>index.php/admin/ratingctr/index">
          <i class="fa fa-star"></i>
          <span>Rating</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url() ?>index.php/admin/studioctr/index">
          <i class="fa fa-th"></i>
          <span>Informasi Kursi</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url() ?>index.php/admin/studioctr/index">
          <i class="fa fa-th"></i>
          <span>Laporan</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
