<?php
  class Profile extends CI_Controller{
    public function __construct(){
      parent::__construct();

      $this->load->model("m_profile");

      if($this->session->userdata('status')!= "login")
        redirect(base_url("login"));


    }

    public function index($username = ''){
      $data["profile"] = $this->m_profile->getdata($username);
      $this->load->view('admin/profile', $data);
    }
  }
 ?>
