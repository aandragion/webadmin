<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class topctr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/topmdl");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["topup"] = $this->topmdl->getAll();
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/icash/v_topup.php", $data);
        $this->load->view('template/footer');
    }

    public function add() 
    {
        $topup = $this->topmdl;
        $validation = $this->form_validation;
        $validation->set_rules($topup->rules());

        if ($validation->run()) {
            $topup->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("konten/icash/v_tambah");
    }

    public function edit($id = null)
    {
        // if (!isset($id)) redirect('konten/icash/v_topup.php');

        $topup = $this->topmdl;
        $validation = $this->form_validation;
        $validation->set_rules($topup->rules());

        if ($validation->run()) {
            $topup->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/topctr'));
        }

        $data["topup"] = $topup->getById($id);
        if (!$data["topup"]) show_404();
        
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/icash/e_topup.php", $data);
        $this->load->view('template/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->topmdl->delete($id)) {
            redirect(site_url('konten/icash/v_topup.php'));
        }
    }
}