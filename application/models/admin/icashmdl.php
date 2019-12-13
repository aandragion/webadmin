<?php defined('BASEPATH') OR exit('No direct script access allowed');

class icashmdl extends CI_Model
{
    private $_table = "icash";//nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_icash;
    public $id_user;
    public $saldo_icash;
    // public $pemasukkan;
    // public $pengeluaran;
    

    public function rules()
    {
        return [
            ['field' => 'saldo_icash',
            'label' => 'saldo_icash',
            'rules' => 'required'],

            // ['field' => 'pemasukkan',
            // 'label' => 'pemasukkan',
            // 'rules' => 'required'],
            
            // ['field' => 'pengeluaran',
            // 'label' => 'pengeluaran',
            // 'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_icash" => $id])->row();
    }

    // public function save()
    // {
    //     $post = $this->input->post();
    //     $this->id_icas = uniqid();
    //     $this->saldo_icash = $post["saldo_icash"];
    //     // $this->pemasukkan = $post["pemasukkan"];
    //     // $this->pengeluaran = $post["pengeluaran"];
    //     $this->db->insert($this->_table, $this);
    // }

    // public function update()
    // {
    //     $post = $this->input->post();
    //     $this->id_icas = $post["id"];
    //     $this->id_user = $post["id_user"];
    //     $this->saldo_icash = $post["saldo_icash"];
    //     // $this->pemasukkan = $post["pemasukkan"];
    //     // $this->pengeluaran = $post["pengeluaran"];
    //     $this->db->update($this->_table, $this, array('id_icash' => $post['id']));
    // }

    // public function delete($id)
    // {
    //     return $this->db->delete($this->_table, array("id_icash" => $id));
    // }
}