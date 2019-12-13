<?php defined('BASEPATH') OR exit('No direct script access allowed');

class transmdl extends CI_Model
{
    private $_table = "transfer";//nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_transfer;
    public $id_pesan;
    public $id_user;
    public $id_bank;
    // public $jumlah_transfer; 
    // public $rek_pemilik;
    public $nama;
    public $bts_transfer;
    public $id_status;

    public function rules()
    {
        return [
            ['field' => 'id_user',
            'label' => 'id_user',
            'rules' => 'required'],

            ['field' => 'id_pesan',
            'label' => 'id_pesan',
            'rules' => 'required'],

            // ['field' => 'jumlah_transfer',
            // 'label' => 'jumlah_transfer',
            // 'rules' => 'required'],
            
            // ['field' => 'rek_pemilik',
            // 'label' => 'rek_pemilik',
            // 'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'id_bank',
            'label' => 'id_bank',
            'rules' => 'required'],

            ['field' => 'bts_transfer',
            'label' => 'bts_transfer',
            'rules' => 'required'],

            ['field' => 'id_status',
            'label' => 'id_status',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
     $this->db->select('*');
     $this->db->from('transfer');
     $this->db->join('user','user.id_user=transfer.id_user');
     $this->db->join('pesan','pesan.id_pesan=transfer.id_pesan');
     $this->db->join('status','status.id_status=transfer.id_status');
     $query = $this->db->get();
     return $query->result();
 }

 public function getById($id)
 {
    return $this->db->get_where($this->_table, ["id_transfer" => $id])->row();
}

public function save()
{
    $post = $this->input->post();
    $this->id_transfer = uniqid();
    $this->id_user = $post["id_user"];
    // $this->jumlah_transfer = $post["jumlah_transfer"];
        // $this->rek_pemilik = $post["rek_pemilik"];
    $this->nama = $post["nama"];
    $this->id_pesan = $post["id_pesan"];
    $this->id_status = $post["id_status"];
    $this->db->insert($this->_table, $this);
}

public function update()
{
    $post = $this->input->post();
    $this->id_transfer = $post["id_transfer"];
    $this->id_pesan = $post["id_pesan"];  
    $this->id_user = $post["id_user"];
    $this->id_bank = $post["id_bank"];
    // $this->jumlah_transfer = $post["jumlah_transfer"];
        // $this->rek_pemilik = $post["rek_pemilik"];
    $this->nama = $post["nama"];
    $this->bts_transfer = $post["bts_transfer"];
    $this->id_status = $post["id_status"];
    $this->db->update($this->_table, $this, array('id_transfer' => $post['id_transfer']));
}

public function delete($id)
{
    return $this->db->delete($this->_table, array("id_transfer" => $id));
}
}