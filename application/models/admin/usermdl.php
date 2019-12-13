<?php defined('BASEPATH') OR exit('No direct script access allowed');

class usermdl extends CI_Model
{
    private $_table = "user";//nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_user;
    public $username;
    public $alamat;
    public $email;
    public $no_tlp;
    public $password;

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'username',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required'],
            
            ['field' => 'email',
            'label' => 'email',
            'rules' => 'required'],

            ['field' => 'no_tlp',
            'label' => 'no_tlp',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_user = uniqid();
        $this->username = $post["username"];
        $this->alamat = $post["alamat"];
        $this->email = $post["email"];
        $this->no_tlp = $post["no_tlp"];
        $this->password = $post["password"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_user = $post["id"];
        $this->username = $post["username"];
        $this->alamat = $post["alamat"];
        $this->email = $post["email"];
        $this->no_tlp = $post["no_tlp"];
        $this->password = $post["password"];
        $this->db->update($this->_table, $this, array('id_user' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }
}