<?php
  class Profil extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_pembayaran');
      $this->load->model('m_siswa');

      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_siswa')->result();
      $this->load->view('client/siswa/profil', $data);
    }

   public function detail($id){
      $where =  array('id_siswa' => $id);
      $data['tbl_siswa'] = $this->m_siswa->lht($where, 'tbl_siswa')->result();
      $data['angByID'] = $this->m_siswa->get_angsuran($where, 'view_angsuran')->result();
      $data['keles'] = $this->m_siswa->get_kelas()->result();

        $nama = $this->session->nama;
        $whare = array(
          'username' => $nama
        );
        $data['siswa'] = $this->m_siswa->lht($whare, 'view_siswa')->result();
        $this->load->view('client/siswa/profil', $data);
  }
    public function get_biaya(){
      $kode=$this->input->post('kode');
      $data=$this->m_siswa->get_biaia($kode);
      echo json_encode($data);
    }
  }
 ?>
