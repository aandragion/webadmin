<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ratingctr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/ratingmdl");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["rating"] = $this->ratingmdl->getAll();
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/rating/v_rating.php", $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $rating = $this->ratingmdl;
        $validation = $this->form_validation;
        $validation->set_rules($rating->rules());

        if ($validation->run()) {
            $urating->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("konten/rating/v_tambah");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('konten/rating/v_rating.php');
       
        $rating = $this->ratingmdl;
        $validation = $this->form_validation;
        $validation->set_rules($rating->rules());

        if ($validation->run()) {
            $rating->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["rating"] = $rating->getById($id);
        if (!$data["rating"]) show_404();
        
        $this->load->view("konten/rating/v_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->ratingmdl->delete($id)) {
            redirect(site_url('konten/rating/v_rating.php'));
        }
    }
}