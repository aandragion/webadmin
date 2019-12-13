<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class userctr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/usermdl");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["user"] = $this->usermdl->getAll();
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view("konten/user/v_user.php", $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $user = $this->usermdl;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("konten/user/v_tambah");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('konten/user/v_user.php');
       
        $user = $this->usermdl;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        $this->load->view("konten/user/v_edit", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->usermdl->delete($id)) {
            redirect(site_url('konten/user/v_user.php'));
        }
    }
}