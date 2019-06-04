<?php
  class Login extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_login');
    }

    public function index(){
      $this->load->view('login');
    }

    function login(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $where = array(
        'username' => $username,
        'password' => MD5($password)
      );

      $cekadmin = $this->m_login->cek_admin("lgn_admin", $where)->num_rows();
      $ceksiswa = $this->m_login->cek_admin("lgn_siswa", $where)->num_rows();
      if($cekadmin > 0){
        $data["ida"] = $this->m_login->getId($username);
        $id = $ida->id_admin;
        $data_session = array(
          'nama' => $username,
          'status' => "login",
          'jabatan' => "admin",
          'id' => $id
        );

        $this->session->set_userdata($data_session);
        redirect(base_url('admin/home'));
      } elseif($ceksiswa > 0){
          // $data["ida"] = $this->m_login->getId($username);
          // $id = $ida->id_admin;
          $data_session = array(
            'nama' => $username,
            'status' => "login",
            'jabatan' => "siswa",
            'pss' => $password
          );

          $this->session->set_userdata($data_session);
          redirect(base_url('siswa/home'));

    }
  }

    function logout(){
      $this->session->sess_destroy();
      redirect(base_url('login'));
    }
  }
 ?>
