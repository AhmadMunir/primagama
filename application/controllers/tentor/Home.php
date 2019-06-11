<?php
  class Home extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_siswa');
      //
      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_tntr_dtl')->result();
      $this->load->view('client/tentor/index', $data);
    }

  }
 ?>
