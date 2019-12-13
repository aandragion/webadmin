<?php
class auth extends CI_Controller{

function __construct(){
  parent::__construct();
  $this->load->model('model_userLog');
}

  function login()
  {
    if(isset($_POST['LOGIN'])){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $hak_akses = $this->input->post('hak_akses');
      $berhasil = $this->model_userLog->login($username,$password,$hak_akses);
      if($berhasil == 1){
        $this->session->set_userdata(array('hak_akses'=>'1'));
        redirect(site_url('admin/dfcontroller'));
      }else{
        $this->load->view('login');
      }
    }
  }
  function logout(){
    $this->session->sess_destroy();
    $this->load->view('login');
}
}