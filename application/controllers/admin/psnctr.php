<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class psnctr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/psnmdl");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['jadwal'] = $this->psnmdl->tampil_jadwal();
        $data['film'] = $this->psnmdl->tampil_film();
        $data["pesan"] = $this->psnmdl->getAll();
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/pesanan/v_pesanan.php", $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $pesan = $this->psnmdl;
        $validation = $this->form_validation;
        $validation->set_rules($pesan->rules());

        if ($validation->run()) {
            $pesan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
         // redirect(site_url('admin/dfcontroller'));
       $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/pesanan/v_tambah.php");
        $this->load->view('template/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/psnctr');
       
        $pesan = $this->psnmdl;
        $validation = $this->form_validation;
        $validation->set_rules($pesan->rules());

        if ($validation->run()) {
            $pesan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pesan"] = $pesan->getById($id);
        if (!$data["pesan"]) show_404();
        
        $this->load->view("konten/pesanan/v_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->psnmdl->delete($id)) {
            redirect(site_url('admin/psnctr'));
        }
    }
}