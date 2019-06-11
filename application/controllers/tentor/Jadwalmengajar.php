<?php
  class Jadwalmengajar extends CI_Controller{
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
      $data['siswa'] = $this->m_siswa->lht($where, 'view_tntr_dtl')->result();
      $this->load->view('client/tentor/jadwalmengajar', $data);
    }

    public function listjadwal(){
      $id = $this->input->post('id_tentor');

      $jdwl =$this->m_jadwal_tetap->getJadwalmengajar($id)->result();

      $lists = "<tr></tr>";
      $no = 1;
      foreach ($jdwl as $key) {
        $lists .= "<tr><td>".$no."</td><td>".$key->hari."</td><td>".$key->nama_mapel."</td><td>".$key->jam."</td><td>".$key->nama_kelas."</td></tr>";
        $no++;
      }

      $callback = array('jdl'=>$lists);
      echo json_encode($callback);
    }
  }
 ?>
