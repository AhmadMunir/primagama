<?php
  class Jadwalanak extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_jadwal_tetap');
      $this->load->model('m_siswa');

      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_ortu')->result();
      $this->load->view('client/ortu/jadwalanak', $data);
    }

    public function listjadwal(){
      $kls = $this->input->post('nama_kelas');

        $jdwl =$this->m_jadwal_tetap->getJadwalsiswa($kls)->result();

      $lists = "<tr></tr>";
      $no = 1;
      foreach ($jdwl as $key) {
        $lists .= "<tr><td>".$no."</td><td>".$key->hari."</td><td>".$key->nama_mapel."</td><td>".$key->jam."</td><td>".$key->nama."</td></tr>";
        $no++;
      }

      $callback = array('jdl'=>$lists);
      echo json_encode($callback);
    }
  }
 ?>
