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
      $this->db->select('*');
      $this->db->from('recort');
      $this->db->join('jadwal','jadwal.id_jadwal=recort.id_jadwal');
      $this->db->join('film','film.id_film=jadwal.id_film');
      $query = $this->db->get();
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
