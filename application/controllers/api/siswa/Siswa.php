<?php
  class Siswa extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_jadwal_tetap');
      $this->load->model('m_reqjadwal');

    }
    public function getjadwaltetap($kelas){
      // $kls = $this->input->get('kls');
      // $kls = "UNSMAA001";
      $kls = $kelas;

      $response = array();

      $jdwl = $this->m_jadwal_tetap->getJadwalsiswa($kls)->result();
      foreach ($jdwl as $key) {
        // $response["hari"] = $key->hari;
        // $response["tentor"] = $key->nama;
        // $response["mapel"] = $key->nama_mapel;
        // $response["jam"] = $key->jam;
        array_push($response, array(
          'hari' => $key->hari,
          'tentor' => $key->nama,
          'mapel' => $key->nama_mapel,
          'jam' => $key->jam,
          'ruang' => $key->nama_ruang
        ));
      }

      $callback = array('response'=>$response);
      die(json_encode($callback));
    }

    public function mapelforReqjadwal($prog){
      $response = array();
      $listmapel = $this->m_reqjadwal->getMapelbyprogram($prog);
      foreach ($listmapel as $ke) {
        array_push($response, array(
          'id_mapel' => $ke->id_mapel,
          'nama_mapel' => $ke->nama_mapel,
          'id_program' => $ke->id_program
        ));
      }

      $callback = array('listmapel'=>$response);
      die(json_encode($callback));
    }
  }
 ?>
