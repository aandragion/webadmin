<?php defined('BASEPATH') OR exit('No direct script access allowed');

class topmdl extends CI_Model
{
    private $_table = "topup";//nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_topup;
    public $tanggal;
    public $id_user;
    public $id_bank;
    public $jumlah_transfer; 
    // public $rek_pemilik;
    public $n_pemilik;
    public $bts_topup;
    public $id_status;

    public function rules()
    {
        return [
            ['field' => 'id_user',
            'label' => 'id_user',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'tanggal',
            'rules' => 'required'],

            ['field' => 'jumlah_transfer',
            'label' => 'jumlah_transfer',
            'rules' => 'required'],
            
            // ['field' => 'rek_pemilik',
            // 'label' => 'rek_pemilik',
            // 'rules' => 'required'],

            ['field' => 'n_pemilik',
            'label' => 'n_pemilik',
            'rules' => 'required'],

            ['field' => 'id_bank',
            'label' => 'id_bank',
            'rules' => 'required'],

            ['field' => 'bts_topup',
            'label' => 'bts_topup',
            'rules' => 'required'],

            ['field' => 'id_status',
            'label' => 'id_status',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
     $this->db->select('*');
     $this->db->from('topup');
     $this->db->join('user','user.id_user=topup.id_user');
     $this->db->join('bank','bank.id_bank=topup.id_bank');
     $this->db->join('status','status.id_status=topup.id_status');
     $query = $this->db->get();
     return $query->result();
 }

 //   public function tampil_data()
 //    {
 //     $this->db->select('count(id_topup)');
 //     $this->db->from('topup');
 //     $this->db->get_where('id_status = 2');
 //     $query = $this->db->get();
 //     return $query->result();
 // }


 public function getById($id)
 {
    return $this->db->get_where($this->_table, ["id_topup" => $id])->row();
}

public function save()
{
    $post = $this->input->post();
    $this->id_topup = uniqid();
    $this->id_user = $post["id_user"];
    $this->jumlah_transfer = $post["jumlah_transfer"];
        // $this->rek_pemilik = $post["rek_pemilik"];
    $this->n_pemilik = $post["n_pemilik"];
    $this->tanggal = $post["tanggal"];
    $this->id_status = $post["id_status"];
    $this->db->insert($this->_table, $this);
}

public function update()
{
    $post = $this->input->post();
    $this->id_topup = $post["id_topup"];
    $this->tanggal = $post["tanggal"];  
    $this->id_user = $post["id_user"];
    $this->id_bank = $post["id_bank"];
    $this->jumlah_transfer = $post["jumlah_transfer"];
        // $this->rek_pemilik = $post["rek_pemilik"];
    $this->n_pemilik = $post["n_pemilik"];
    $this->bts_topup = $post["bts_topup"];
    $this->id_status = $post["id_status"];
    $this->db->update($this->_table, $this, array('id_topup' => $post['id_topup']));
}

public function delete($id)
{
    return $this->db->delete($this->_table, array("id_topup" => $id));
}
}