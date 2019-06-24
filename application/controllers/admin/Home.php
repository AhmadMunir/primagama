<?php
  class Home extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_siswa');

      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){
        $data['view_siswa'] = $this->m_siswa->getSiswa()->result();
      $this->load->view('admin/home', $data);
    }
    
  }

 ?>

