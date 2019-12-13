<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class transctr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/transmdl");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["transfer"] = $this->transmdl->getAll();
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/transfer/v_trans.php", $data);
        $this->load->view('template/footer');
    }

    public function add() 
    {
        $transfer = $this->transmdl;
        $validation = $this->form_validation;
        $validation->set_rules($transfer->rules());

        if ($validation->run()) {
            $transfer->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("konten/transfer/v_tambah");
    }

    public function edit($id = null)
    {
        // if (!isset($id)) redirect('konten/icash/v_topup.php');

        $transfer = $this->transmdl;
        $validation = $this->form_validation;
        $validation->set_rules($transfer->rules());

        if ($validation->run()) {
            $transfer->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/transctr'));
        }

        $data["transfer"] = $transfer->getById($id);
        if (!$data["transfer"]) show_404();
        
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/transfer/v_edit.php", $data);
        $this->load->view('template/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->transmdl->delete($id)) {
            redirect(site_url('konten/transfer/v_trans.php'));
        }
    }
}