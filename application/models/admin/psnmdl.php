<?php defined('BASEPATH') OR exit('No direct script access allowed');

class psnmdl extends CI_Model
{
    private $_table = "pesan";//nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_pesan;
    public $id_user;
    public $tanggal_pesan;
    public $id_film;
    public $id_jadwal;
    public $id_jamtayang;
    public $id_studio;
    public $id_kursi;
    public $id_harga;
    public $jumlah_pesanan;
    public $total_harga;
    public $id_status;

    public function rules()
    {
        return [
            ['field' => 'id_user',
            'label' => 'id_user',
            'rules' => 'required'],

            ['field' => 'tanggal_pesan',
            'label' => 'tanggal_pesan',
            'rules' => 'required'],

            ['field' => 'id_film',
            'label' => 'id_film',
            'rules' => 'required'],

            ['field' => 'id_jadwal',
            'label' => 'id_jadwal',
            'rules' => 'required'],

            ['field' => 'id_jamtayang',
            'label' => 'id_jamtayang',
            'rules' => 'required'],

            ['field' => 'id_studio',
            'label' => 'id_studio',
            'rules' => 'required'],
            
            ['field' => 'id_kursi',
            'label' => 'id_kursi',
            'rules' => 'required'],

            ['field' => 'id_harga',
            'label' => 'id_harga',
            'rules' => 'required'],

            ['field' => 'jumlah_pesanan',
            'label' => 'jumlah_pesanan',
            'rules' => 'required'],

            ['field' => 'total_harga',
            'label' => 'total_harga',
            'rules' => 'required'],

            ['field' => 'id_status',
            'label' => 'id_status',
            'rules' => 'required']
        ];
    } 

    public function getAll()
    { 
      $this->db->select('*');
      $this->db->from('pesan');
       $this->db->join('user','user.id_user=pesan.id_user');
      $this->db->join('film','film.id_film=pesan.id_film');
      $this->db->join('jadwal','jadwal.id_jadwal=pesan.id_jadwal');
      $this->db->join('status','status.id_status=pesan.id_status');
      $query = $this->db->get();
      return $query->result();
  }
  public function tampil_film()
  {  
    return $this->db->get('film')->result();
}
public function tampil_jadwal()
{  
    return $this->db->get('jadwal')->result();
}

public function getById($id)
{
    return $this->db->get_where($this->_table, ["id_pesan" => $id])->row();
}

    // function code_ots(){
    //         $this->db->select('Right(pesan.id_pesan,6) as kode ',false);
    //         $this->db->order_by('id_pesan', 'desc');
    //         $this->db->limit(1);
    //         $query = $this->db->get('pesan');
    //         if($query->num_rows()<>0){
    //             $data = $query->row();
    //             $kode = intval($data->kode)+1;
    //         }else{
    //             $kode = 1;

    //         }
    //         $kodemax = str_pad($kode,6,"0",STR_PAD_LEFT);
    //         $kodejadi  = "PSN".$kodemax;
    //         return $kodejadi;

    //     }

public function save()
{
    $post = $this->input->post();
        $this->id_pesan = uniqid(); //$this->code_ots();
        $this->id_user = $post["id_user"];
        $this->tanggal_pesan = $post["tanggal_pesan"];
        $this->id_film = $post["id_film"];
        $this->id_jadwal = $post["id_jadwal"];
        $this->id_jamtayang = $post["id_jamtayang"];
        $this->id_kursi = $post["id_kursi"];
        $this->id_harga = $post["id_harga"];
        $this->jumlah_pesanan = $post["jumlah_pesanan"];
        $this->total_harga = $post["total_harga"];
        $this->id_status = $post["id_status"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pesan = $post["id"];
        $this->id_user = $post["id_user"];
        $this->tanggal_pesan = $post["tanggal_pesan"];
        $this->id_film = $post["id_film"];
        $this->id_jadwal = $post["id_jadwal"];
        $this->id_jamtayang = $post["id_jamtayang"];
        $this->id_kursi = $post["id_kursi"];
        $this->id_harga = $post["id_harga"];
        $this->jumlah_pesanan = $post["jumlah_pesanan"];
        $this->total_harga = $post["total_harga"];
        $this->id_status = $post["id_status"];
        
        $this->db->update($this->_table, $this, array('id_pesan' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pesan" => $id));
    }
}