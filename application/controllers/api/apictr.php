<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package  : API - Ruby Pedia
 * @author   : Fika Ridaul Maulayya <ridaulmaulayya@gmail.com>
 * @since    : 2017
 * @license  : https://www.rubypedia.com/
 */
class apictr extends CI_Controller {

    function __construct() {

        parent::__construct();
        //load model api
        $this->load->model('api/api');
    }

    public function index()
    {
        //get data dari model
        $blog = $this->api->get_blog();
        //masukkan data kedalam variabel
        $data['admin'] = $blog;
        //deklarasi variabel array
        $response = array();
        $posts = array();
        //lopping data dari database
        foreach ($blog as $hasil)
        {
            $posts[] = array(
                "id_film"   =>  $hasil->id_film,
                "judul_film"  =>  $hasil->judul_film,
                "sinopsis"    =>  $hasil->sinopsis,
                "gambar"     =>  $hasil->gambar,
                "trailer"    => $hasil->trailer,
                "status_film"    => $hasil->status_film
               
            );
        }
        $response['admin'] = $posts;
        header('Content-Type: application/json');
        echo json_encode($response,TRUE);

    }
}