<?php defined('BASEPATH') OR exit('No direct script access allowed');

class studiomdl extends CI_Model
{
    private $_table = "kursi";//nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_kursi;
    public $Kursi;


    public function rules()
    {
        return [
            ['field' => '$id_kursi',
            'label' => '$id_kursi',
            'rules' => 'required'],

            ['field' => '$Kursi',
            'label' => '$Kursi',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
      $this->db->select('*');
      $this->db->from('kursi');
      $query = $this->db->get();
      return $query->result();
  }
  public function tampil_nonton()
  {
    return $this->db->get('nonton')->result();
}
// public function tampil_jadwal()
// {
//     return $this->db->get('jadwal')->result();
// }

public function getById($id)
{
    return $this->db->get_where($this->_table, ["$id_kursi" => $id])->row();
}

}
