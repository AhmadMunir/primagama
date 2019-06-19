<?php
  class Nilai extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_nilai');
      //
      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_siswa')->result();
      $this->load->view('client/siswa/nilai', $data);
    }

    public function shownilaikamu(){
      $id_sis = $this->input->post('id_siswa');

      $nil = $this->m_nilai->shownilaisiswa($id_sis)->result();

      $nilai = "<tr></tr>";
      $no=1;

      foreach ($nil as $k) {
        $nilai .= "<tr><td>".$no."</td><td>".$k->nama_mapel."</td><td>".$k->to1."</td><td>".$k->to2."</td><td>".$k->to3."</td><td>".$k->to4."</td><td>".$k->to5."</td></tr>";
        $no++;
      }

      $callback = array('nilai'=>$nilai);
      echo json_encode($callback);

    }

  }
 ?>
