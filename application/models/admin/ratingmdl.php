<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ratingmdl extends CI_Model
{
    private $_table = "rating";//nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_rating;
    public $tanggal;
    public $id_user;
    public $id_film;
    public $nilai;
    public $ulasan;

    public function rules()
    {
        return [
            ['field' => 'tanggal',
            'label' => 'tanggal',
            'rules' => 'required'],

            ['field' => 'id_user',
            'label' => 'id_user',
            'rules' => 'required'],
            
            ['field' => 'id_film',
            'label' => 'id_film',
            'rules' => 'required'],

            ['field' => 'nilai',
            'label' => 'nilai',
            'rules' => 'required'],

            ['field' => 'ulasan',
            'label' => 'ulasan',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
         $this->db->select('*');
     $this->db->from('rating');
     $this->db->join('user','user.id_user=rating.id_user');
     $this->db->join('film','film.id_film=rating.id_film');
     $query = $this->db->get();
     return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_rating" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_rating = uniqid();
        $this->tanggal = $post["tanggal"];
        $this->id_user = $post["id_user"];
        $this->id_film = $post["id_film"];
        $this->nilai = $post["nilai"];
        $this->ulasan = $post["ulasan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_rating = $post["id"];
        $this->tanggal = $post["tanggal"];
        $this->id_user = $post["id_user"];
        $this->id_film = $post["id_film"];
        $this->nilai = $post["nilai"];
        $this->ulasan = $post["ulasan"];
        $this->db->update($this->_table, $this, array('id_rating' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_rating" => $id));
    }
}