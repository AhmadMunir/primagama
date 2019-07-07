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
      $wher = array(
        'username' => $username,

      );

      $cekadmin = $this->m_login->cek_user("lgn_admin", $where)->num_rows();
      $cekadmin2 = $this->m_login->cek_user("lgn_admin", $where)->result();
      $ceksiswa = $this->m_login->cek_user("lgn_siswa", $where)->num_rows();
      $ceksiswa2 = $this->m_login->cek_user("lgn_siswa", $where)->result();
      $cekortu = $this->m_login->cek_user("lgn_ortu", $where)->num_rows();
      $cekortu2 = $this->m_login->cek_user("view_ortu", $wher)->result();
      $cektentor = $this->m_login->cek_user("lgn_tentor", $where)->num_rows();
      $cektentor2 = $this->m_login->cek_user("lgn_tentor", $where)->result();
      if($cekadmin > 0){

        foreach ($cekadmin2 as $k) {
          $id = $k->id_admin;
        }
        $data_session = array(
          'nama' => $username,
          'status' => "login",
          'jabatan' => "admin",
          'id' => $id
        );

        $this->session->set_userdata($data_session);
        redirect(base_url('admin/home'));

      } elseif($ceksiswa > 0){
          foreach ($ceksiswa2 as $key) {
            $id_sis = $key->id_siswa;
          }
          $data_session = array(
            'id' => $id_sis,
            'nama' => $username,
            'status' => "login",
            'jabatan' => "siswa",
            'pss' => $password
          );

          $this->session->set_userdata($data_session);
          redirect(base_url('siswa/home'));
    } elseif ($cekortu > 0) {
      foreach ($cekortu2 as $k) {
          $id = $k->id_ortu;
          $anak = $k->id_siswa;
        }
      $data_session = array(
        'nama' => $username,
        'status' => 'login',
        'jabatan' => 'orangtua',
        'id' =>$id,
        'anak'=>$anak
      );
      $this->session->set_userdata($data_session);
      redirect(base_url('ortu/home'));
    } elseif ($cektentor > 0) {
      foreach ($cektentor2 as $k) {
          $id = $k->id_tentor;
        }
      $data_session = array(
        'nama' => $username,
        'status' => "login",
        'jabatan' => "tentor",
        'id' => $id
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
