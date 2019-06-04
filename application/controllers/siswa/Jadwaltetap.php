<?php
  class Jadwaltetap extends CI_Controller{
    public function __construct(){
      parent::__construct();

      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_siswa')->result();
      $this->load->view('client/siswa/jadwaltetap', $data);
    }
  }
 ?>
