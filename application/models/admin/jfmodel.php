<?php defined('BASEPATH') OR exit('No direct script access allowed');

class jfmodel extends CI_Model
{
    private $_table = "jadwal";//nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_jadwal;
    public $id_film; 
    public $tgl_jadwal;
    public $id_jamtayang;
    public $id_harga;
    public $id_studio;

    public function rules()
    {
        return [
            ['field' => 'id_film',
            'label' => 'id_film',
            'rules' => 'required'],

            ['field' => 'tgl_jadwal',
            'label' => 'tgl_jadwal',
            'rules' => 'required'],
            
            ['field' => 'id_jamtayang',
            'label' => 'id_jamtayang',
            'rules' => 'required'],

            ['field' => 'id_harga',
            'label' => 'id_harga',
            'rules' => 'required'],

            ['field' => 'id_studio',
            'label' => 'id_studio',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
     $this->db->select('*');
     $this->db->from('jadwal');
     $this->db->join('film','film.id_film=jadwal.id_film');
     $this->db->join('jamtayang','jamtayang.id_jamtayang=jadwal.id_jamtayang');
     $this->db->join('harga','harga.id_harga=jadwal.id_harga');
     $this->db->join('studio','studio.id_studio=jadwal.id_studio');

     $query = $this->db->get();
     return $query->result();
 }

public function tampil_data()
{  
    return $this->db->get('film')->result();
}

public function tampil_data1()
{  
    return $this->db->get('jamtayang')->result();
}

public function tampil_data2()
{  
    return $this->db->get('harga')->result();
}
public function tampil_data3()
{  
    return $this->db->get('studio')->result();
}

 public function getById($id)
 {
    return $this->db->get_where($this->_table, ["id_jadwal" => $id])->row();
}

public function save()
{
    $post = $this->input->post();
    $this->id_jadwal = uniqid();
    $this->id_film = $post["id_film"];
    $this->tgl_jadwal = $post["tgl_jadwal"];
    $this->id_jamtayang = $post["id_jamtayang"];
    $this->id_harga = $post["id_harga"];
    $this->id_studio = $post["id_studio"];
    $this->db->insert($this->_table, $this);
}

public function update()
{
    $post = $this->input->post();
    $this->id_jadwal = $post["id"];
    $this->id_film = $post["id_film"];
    $this->tgl_jadwal = $post["tgl_jadwal"];
    $this->id_jamtayang = $post["id_jamtayang"];
    $this->id_harga = $post["id_harga"];
    $this->id_studio = $post["id_studio"];
    $this->db->update($this->_table, $this, array('id_jadwal' => $post['id']));
}

public function delete($id)
{
    return $this->db->delete($this->_table, array("id_jadwal" => $id));
}
}