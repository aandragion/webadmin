<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class icashctr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/icashmdl");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["icash"] = $this->icashmdl->getAll();
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/icash/v_icash.php", $data);
        $this->load->view('template/footer');
    }
 
    public function add()
    {
        $icash = $this->icashmdl;
        $validation = $this->form_validation;
        $validation->set_rules($icash->rules());

        if ($validation->run()) {
            $icash->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("konten/icash/v_tambah");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('konten/icash/v_icash.php');
       
        $icash = $this->icashmdl;
        $validation = $this->form_validation;
        $validation->set_rules($icash->rules());

        if ($validation->run()) {
            $icash->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["icash"] = $icash->getById($id);
        if (!$data["icash"]) show_404();
        
        $this->load->view("konten/icash/v_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->icashmdl->delete($id)) {
            redirect(site_url('konten/icash/v_icash.php'));
        }
    }
}