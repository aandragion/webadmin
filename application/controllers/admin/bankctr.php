<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class bankctr extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model("admin/bankmdl");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["bank"] = $this->bankmdl->getAll();
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/bank/v_bank.php", $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $bank = $this->bankmdl;
        $validation = $this->form_validation;
        $validation->set_rules($bank->rules());

        if ($validation->run()) {
            $bank->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('admin/bankctr');
        }

        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/bank/v_bank");
        $this->load->view('template/footer');
    }

    public function edit($id = null)
    {
          $bank = $this->bankmdl;
        $validation = $this->form_validation;
        $validation->set_rules($bank->rules());

        if ($validation->run()) {
            $bank->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/bankctr'));
        }

        $data["bank"] = $bank->getById($id);
        if (!$data["bank"]) show_404();
        
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/bank/v_edit", $data);
        $this->load->view('template/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->bankmdl->delete($id)) {
            redirect(site_url('konten/bank/v_bank.php'));
        }
    }
}