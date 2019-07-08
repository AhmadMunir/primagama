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
      $id = $this->session->id;
      $ank = $this->session->anak;
      $where = array(
        'username' => $nama
      );
      $wher = array(
        'id_siswa' => $ank
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_ortu')->result();
      $data['foto'] = $this->m_siswa->lht($wher, 'view_siswa_detail')->result();
      $this->load->view('client/ortu/index', $data);

    }

  }
 ?>
