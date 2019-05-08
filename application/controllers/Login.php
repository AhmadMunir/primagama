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
        'password' => $password
      );


      $cekadmin = $this->m_login->cek_admin("lgn_admin", $where)->num_rows();
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
      } else {
        echo "Username dan Password salah !";
      }
    }

    function logout(){
      $this->session->sess_destroy();
      redirect(base_url('login'));
    }
  }
 ?>
