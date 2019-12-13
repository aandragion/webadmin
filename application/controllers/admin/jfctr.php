<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class jfctr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/jfmodel");
        $this->load->library('form_validation');
    }

    public function index() 
    {
     $data['film'] = $this->jfmodel->tampil_data();
     $data['jamtayang'] = $this->jfmodel->tampil_data1();
     $data['harga'] = $this->jfmodel->tampil_data2();
     $data['studio'] = $this->jfmodel->tampil_data3();
     $data["jadwal"] = $this->jfmodel->getAll();
     $this->load->view('template/header');
     $this->load->view('template/aside');
     $this->load->view("konten/jfilm/v_jfilm.php", $data);
     $this->load->view('template/footer');
 }
 
 public function add()
 {
    $jadwal = $this->jfmodel;
     $validation = $this->form_validation;
     $validation->set_rules($jadwal->rules());

     if ($validation->run()) {
        $jadwal->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect('admin/jfctr');
    }

    $this->load->view('template/header');
    $this->load->view('template/aside');
    $this->load->view("konten/jfilm/v_jfilm");
    $this->load->view('template/footer');
}

    public function edit($id)
    {
        $jadwal = $this->jfmodel;
        $validation = $this->form_validation;
        $validation->set_rules($jadwal->rules());

        if ($validation->run()) {
            $jadwal->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('admin/jfctr'));
        }

        $data["jadwal"] = $jadwal->getById($id);
        $data['film'] = $this->jfmodel->tampil_data();
        $data['jamtayang'] = $this->jfmodel->tampil_data1();
        $data['harga'] = $this->jfmodel->tampil_data2();
        $data['studio'] = $this->jfmodel->tampil_data3();
        if (!$data["jadwal"]) show_404();
        
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/jfilm/v_edit", $data);
        $this->load->view('template/footer');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();

        if ($this->jfmodel->delete($id)) {
            redirect(site_url('admin/dfcontroller'));
        }
    }
}