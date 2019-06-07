<?php
  class Home extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_orangtua');
      //
      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_ortu')->result();
      $this->load->view('client/ortu/index', $data);
    }

  }
 ?>
