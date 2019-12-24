<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class recordctr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/recordmdl");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['recort'] = $this->recordmdl->tampil_data();
        // $data['recort'] = $this->recordmdl->getAll();
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view('konten/record/v_record.php', $data);
        $this->load->view('template/footer');

    }

    public function add()
    {

        $film = $this->recordmdl;
        $validation = $this->form_validation;
        $validation->set_rules($film->rules());

        if ($validation->run()) {
            $film->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/dfcontroller/');
        }

       $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view('konten/dfilm/v_dfilm');
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        // if (!isset($id)) redirect('admin/products');

        $film = $this->recordmdl;
        $validation = $this->form_validation;
        $validation->set_rules($film->rules());

        if ($validation->run()) {
            $film->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/dfcontroller'));
        }

        $data["film"] = $film->getById($id);
        $data['genre'] = $this->recordmdl->tampil_data();
        if (!$data["film"]) show_404();

        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/dfilm/v_edit", $data);
        $this->load->view('template/footer');
    }


    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->recordmdl->delete($id)) {
            redirect(site_url('admin/dfcontroller'));
        }
    }

    //     public function genre()
    // {
    //     $data['genre'] = $this->dfmodel->tampil_data();
    //     $this->load->view("konten/dfilm/v_dfilm.php",$data);

    // }
}
