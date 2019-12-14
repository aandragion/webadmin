<?php defined('BASEPATH') OR exit('No direct script access allowed');

class dfmodel extends CI_Model
{
    private $_table = "film";//nama tabel
// nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $id_film;
    public $judul_film;
    public $sinopsis;
    public $gambar = 'default.jpg';
    public $trailer = 'default.mp4';
    public $id_genre;
    public $status_film;
    public $durasi;
    public $rilis;

    public function rules()
    {
        return [
            ['field' => 'judul_film',
            'label' => 'judul_film',
            'rules' => 'required'],

            ['field' => 'sinopsis',
            'label' => 'sinopsis',
            'rules' => 'required'],

        // ['field' => 'trailer',
        // 'label' => 'trailer',
        // 'rules' => 'required'],

        // ['field' => 'gambar',
        // 'label' => 'gambar',
        // 'rules' => 'required'],

            ['field' => 'id_genre',
            'label' => 'id_genre',
            'rules' => 'required'],

            ['field' => 'status_film',
            'label' => 'status_film',
            'rules' => 'required'],

              ['field' => 'durasi',
            'label' => 'durasi',
            'rules' => 'required'],

              ['field' => 'rilis',
            'label' => 'rilis',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
    // return $this->db->get($this->_table)->result();
        $this->db->select('*');
        $this->db->from('film');
        $this->db->join('genre','genre.id_genre=film.id_genre');
        $query = $this->db->get();
        return $query->result();
    }


    public function tampil_data()
    {
        return $this->db->get('genre')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_film" => $id])->row();
    }

// function buat_kode()   {
//   $this->db->select('RIGHT(film.id_film,2) as kode', FALSE);
//   $this->db->order_by('id_film','DESC');
//   $this->db->limit(1);
//   $query = $this->db->get('film');      //cek dulu apakah ada sudah ada kode di tabel.
//   if($query->num_rows() <> 0){
//    //jika kode ternyata sudah ada.
//      $data = $query->row();
//      $kode = intval($data->kode) + 1;
//  }
//  else{
//    //jika kode belum ada
//      $kode = 1;
//  }
//  $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);
//  $kodejadi = "F".$kodemax;
//  return $kodejadi;
// }


    public function save()
    {
        $post = $this->input->post();
        $this->id_film = uniqid(); //$this->buat_kode();
        $this->judul_film = $post["judul_film"];
        $this->sinopsis = $post["sinopsis"];
        $this->gambar = $this->_uploadImage();
        // $this->trailer = $this->_uploadVideo();
        $this->trailer = $post["trailer"];
        $this->id_genre = $post["id_genre"];
        $this->status_film = $post["status_film"];
        $this->durasi = $post["durasi" + 'menit'];
        $this->rilis = $post["rilis"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_film = $post["id_film"];
        $this->judul_film = $post["judul_film"];
        $this->sinopsis = $post["sinopsis"];

        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadImage();
        } else {
            $this->gambar = $post["old_image"];
        }

        // if (!empty($_FILES["trailer"]["name"])) {
        //     $this->trailer = $this->_uploadVideo();
        // } else {
        //     $this->trailer = $post["old_video"];
        // }
        $this->trailer = $post["trailer"];
        $this->id_genre = $post["id_genre"];
        $this->status_film = $post["status_film"];
        $this->durasi = $post["durasi"];
        $this->rilis = $post["rilis"];
        $this->db->update($this->_table, $this, array('id_film' => $post['id_film']));
    }

    public function delete($id)
    {
        // $this->_deleteVideo($id);
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_film" => $id));
    }

//     private function _uploadVideo()
//     {
//         $config['upload_path']          = './upload/vdfilm/';
//         $config['allowed_types']        = 'avi|flv|wmv|mp3|mp4|mkv|MKV|MPEG|WMP|3gp|gif';
//         $config['file_name']            = $this->id_film;
//         $config['overwrite']            = true;
//     $config['post_max_size']        = 102400; // 1MB
//         // $config['max_width']            = 1024;
//         // $config['max_height']           = 768;
//
//     $this->load->library('upload', $config);
//
//     if ($this->upload->do_upload('trailer')) {
//          // print_r($this->upload->display_errors());
//         return $this->upload->data("file_name");
//     }
//     // print_r($this->upload->display_errors());
//         return "default.mp4";
// }
//
// private function _deleteVideo($id)
// {
//     $film = $this->getById($id);
//     if ($film->trailer != "default.mp4") {
//         $filename = explode(".", $film->trailer)[0];
//         return array_map('unlink', glob(FCPATH."upload/vdfilm/$filename.*"));
//     }
// }

private function _uploadImage()
{
    $config['upload_path']          = './upload/gbrfilm/';
    $config['allowed_types']        = 'jpg|gif|png|jpeg|JPG|PNG';
    $config['file_name']            = $this->id_film;
    $config['overwrite']            = true;
    $config['post_max_size']        = 102400; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
         // print_r($this->upload->display_errors());
        return $this->upload->data("file_name");
    }
    print_r($this->upload->display_errors());
    return "default.jpg";
}

private function _deleteImage($id)
{
    $film = $this->getById($id);
    if ($film->gambar != "default.jpg") {
        $filename = explode(".", $film->gambar)[0];
        return array_map('unlink', glob(FCPATH."upload/gbrfilm/$filename.*"));
    }
}
}
