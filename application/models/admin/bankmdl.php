<?php defined('BASEPATH') OR exit('No direct script access allowed');

class bankmdl extends CI_Model
{
    private $_table = "bank";//nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_bank;
    public $nama_bank;
    public $no_rekening;
    public $nama_pemilik;
    public $logo_bank = 'default.jpg';


    public function rules()
    {
    	return [
    		['field' => 'nama_bank',
    		'label' => 'nama_bank',
    		'rules' => 'required'],

    		['field' => 'no_rekening',
    		'label' => 'no_rekening',
    		'rules' => 'required'],

    		['field' => 'nama_pemilik',
    		'label' => 'nama_pemilik',
    		'rules' => 'required'],
    	];
    }

    public function getAll()
    {
    	return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
    	return $this->db->get_where($this->_table, ["id_bank" => $id])->row();
    }

    public function save()
    {
    	$post = $this->input->post();
    	$this->id_bank = uniqid();
    	$this->nama_bank = $post["nama_bank"];
    	$this->no_rekening = $post["no_rekening"];
    	$this->nama_pemilik = $post["nama_pemilik"];
    	$this->logo_bank = $this->_uploadImage();
    	$this->db->insert($this->_table, $this);
    }

    public function update()
    {
    	$post = $this->input->post();
    	$this->id_bank = $post["id"];
    	$this->nama_bank = $post["nama_bank"];
    	$this->no_rekening = $post["no_rekening"];
    	$this->nama_pemilik = $post["nama_pemilik"];

    	if (!empty($_FILES["logo_bank"]["name"])) {
    		$this->logo_bank = $this->_uploadImage();
    	} else {
    		$this->logo_bank = $post["old_image"];
    	}
    	$this->db->update($this->_table, $this, array('id_bank' => $post['id']));
    }

    public function delete($id)
    {
    	$this->_deleteImage($id);
    	return $this->db->delete($this->_table, array("id_bank" => $id));
    }

    private function _uploadImage()
    {
    	$config['upload_path']          = './upload/gbrfilm/';
    	$config['allowed_types']        = 'jpg|gif|png|jpeg|JPG|PNG';
    	$config['file_name']            = $this->id_bank;
    	$config['overwrite']            = true;
    $config['post_max_size']        = 102400; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('logo_bank')) {
         // print_r($this->upload->display_errors());
    	return $this->upload->data("file_name");
    }
    print_r($this->upload->display_errors());
    return "default.jpg";
}

private function _deleteImage($id)
{
	$bank = $this->getById($id);
	if ($bank->logo_bank != "default.jpg") {
		$filename = explode(".", $bank->logo_bank)[0];
		return array_map('unlink', glob(FCPATH."upload/gbrfilm/$filename.*"));
	}
}
}