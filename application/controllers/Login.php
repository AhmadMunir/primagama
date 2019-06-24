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

      $cekadmin = $this->m_login->cek_user("lgn_admin", $where)->num_rows();
      $ceksiswa = $this->m_login->cek_user("lgn_siswa", $where)->num_rows();
      $cekortu = $this->m_login->cek_user("lgn_ortu", $where)->num_rows();
      $cektentor = $this->m_login->cek_user("lgn_tentor", $where)->num_rows();
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
    } elseif ($cekortu > 0) {
      $data_session = array(
        'nama' => $username,
        'status' => 'login',
        'jabatan' => 'orangtua'
      );
      $this->session->set_userdata($data_session);
      redirect(base_url('ortu/home'));
    } elseif ($cektentor > 0) {
      $data_session = array(
        'nama' => $username,
        'status' => "login",
        'jabatan' => "tentor"
      );
      $this->session->set_userdata($data_session);
      redirect(base_url('tentor/home'));
    }else {
      $this->session->set_flashdata('gagal', 'Login Gagal!');
      redirect('Login');
    }
  }

    function logout(){
      $this->session->sess_destroy();
      redirect(base_url('login'));
    }
  }
 ?>
