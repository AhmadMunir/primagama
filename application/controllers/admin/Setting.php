<?php
  class Setting extends CI_Controller{
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
      // $data['siswa'] = $this->m_siswa->lht($where, 'view_siswa')->result();
      $this->load->view('client/siswa/setting', $data);
    }

    public function edit($id){
      $where =  array('id_siswa' => $id);
      $data['username'] = $this->m_siswa->view_siswa();
      $data['password'] = $this->m_siswa->view_siswa();
      $data['email'] = $this->m_siswa->lht($where, 'lgn_siswa' 'tbl_siswa')->result();

      $this->load->view('admin/siswa/edit_siswa', $data);
  }

  }
 ?>
