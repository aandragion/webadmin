<?php defined('BASEPATH') OR exit('No direct script access allowed');

class recordmdl extends CI_Model
{
  private $_table = "recort";//nama tabel
  // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
  public $id_recort;
  public $id_jadwal;
  public $j_pesanan;
  public $j_kursi;
  public $j_kursib;
  public $pemasukkan;

  public function rules()
  {
    return [
      ['field' => 'id_jadwal',
      'label' => 'id_jadwal',
      'rules' => 'required'],

      ['field' => 'j_pesanan',
      'label' => 'j_pesanan',
      'rules' => 'required'],

      ['field' => 'j_kursi',
      'label' => 'j_kursi',
      'rules' => 'required'],

      ['field' => 'j_kursib',
      'label' => 'j_kursib',
      'rules' => 'required'],

      ['field' => 'pemasukkan',
      'label' => 'pemasukkan',
      'rules' => 'required'],
    ];
  }

  public function tampil_data()
  {
    $tgl_awal 	= date('Y-m-d', strtotime('last month') );
    $tgl_akhir 	= date('Y-m-d');
    $this->db->select('film.judul_film');
    $this->db->select('jadwal.tgl_jadwal');
    $this->db->select('studio.studio');
    $this->db->select('COUNT(id_pesan) AS j_pesan');
    $this->db->select('SUM(pesan.jumlah_pesanan) AS j_kursi');
    $this->db->select('SUM(pesan.total_harga) AS masuk');
    $this->db->from('jadwal');
    $this->db->join('pesan','pesan.id_jadwal=jadwal.id_jadwal','Left');
    $this->db->join('film','film.id_film=jadwal.id_film','Left');
    $this->db->join('studio','studio.id_studio=jadwal.id_studio','Left');
  $this->db->where("(pesan.id_status= 1 or pesan.id_status= 3)");
    $this->db->where('tgl_jadwal >=',$tgl_awal);
    $this->db->where('tgl_jadwal <=',$tgl_akhir);
    $this->db->group_by('jadwal.id_jadwal');
    $query = $this->db->get();
    return $query->result();
  }
  public function pencarian()
  {
    $post = $this->input->post();
    $film 		  = $this->input->post('film');
    $studio     = $this->input->post('studio');
    $tgl_awal 	= $this->input->post('tgl_awal');
    $tgl_akhir 	= $this->input->post('tgl_akhir');
    $this->db->select('film.judul_film');
    $this->db->select('jadwal.tgl_jadwal');
    $this->db->select('studio.studio');
    $this->db->select('COUNT(id_pesan) AS j_pesan');
    $this->db->select('SUM(pesan.jumlah_pesanan) AS j_kursi');
    $this->db->select('SUM(pesan.total_harga) AS masuk');
    $this->db->from('jadwal');
    $this->db->join('pesan','pesan.id_jadwal=jadwal.id_jadwal','Left');
    $this->db->join('film','film.id_film=jadwal.id_film','Left');
    $this->db->join('studio','studio.id_studio=jadwal.id_studio','Left');
    // $this->db->where('tgl_jadwal >=',$tgl_awal);
    // $this->db->where('tgl_jadwal <=',$tgl_akhir);
  $this->db->where("(pesan.id_status= 1 or pesan.id_status= 3)");
// $this->db->where('pesan.id_status',3);
    If(! empty($film)) {
      $this->db->where("jadwal.id_film",$film);
    }
    If(! empty($studio)) {
      $this->db->where('jadwal.id_studio', $studio);
    }
    if (! empty( $tgl_awal) && ! empty( $tgl_akhir)) {
      // $this->db->between.....
      // $this->db->where('jadwal.tgl_jadwal between', $tgl_awal 'and' $tgl_akhir);
      $this->db->where('tgl_jadwal >=',$tgl_awal);
      $this->db->where('tgl_jadwal <=',$tgl_akhir);
    }
$this->db->group_by('jadwal.id_jadwal');
    $query = $this->db->get();
    // $query = ("select * from recort
    // join jadwal on jadwal.id_jadwal=recort.id_jadwal
    // join film.id_film=jadwal.id_film
    // join studio.id_studio=jadwal.id_studio
    // where ")
    return $query->result();
  }

  public function getAll()
  {
    return $this->db->get($this->_table)->result();
  }

  public function getById($id)
  {
    return $this->db->get_where($this->_table, ["id_recort" => $id])->row();
  }

  public function save()
  {
    $post = $this->input->post();
    $this->id_user = uniqid();
    $this->username = $post["id_jadwal"];
    $this->alamat = $post["j_pesanan"];
    $this->email = $post["j_kursi"];
    $this->no_tlp = $post["j_kursib"];
    $this->password = $post["pemasukkan"];
    $this->db->insert($this->_table, $this);
  }

  public function update()
  {
    $post = $this->input->post();
    $this->id_user = $post["id"];
    $this->username = $post["id_jadwal"];
    $this->alamat = $post["j_pesanan"];
    $this->email = $post["j_kursi"];
    $this->no_tlp = $post["j_kursib"];
    $this->password = $post["pemasukkan"];
    $this->db->update($this->_table, $this, array('id_recort' => $post['id']));
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id_recort" => $id));
  }
}
