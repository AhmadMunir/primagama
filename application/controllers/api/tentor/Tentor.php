<?php
  class Tentor extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_jadwal_tetap');
      $this->load->model('m_reqjadwal');
      $this->load->model('m_nilai');
      $this->load->model('m_absen');

    }
    public function listjadwal($id){


      $response = array();

      $jdwl =$this->m_jadwal_tetap->getJadwalmengajar($id)->result();
      foreach ($jdwl as $k) {
        array_push($response, array(
          'hari'=>$k->hari,
          'jam' => $k->jam,
          'mapel' => $k->nama_mapel,
          'kelas' => $k->nama_kelas,
          'ruang' => $k->nama_ruang
        ));
      }

      $callback = array('jdl'=>$response);
      die(json_encode($callback));
    }

    public function getisikelas

  }
 ?>
