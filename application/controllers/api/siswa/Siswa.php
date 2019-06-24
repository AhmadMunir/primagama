<?php
  class Siswa extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_jadwal_tetap');
      $this->load->model('m_reqjadwal');
      $this->load->model('m_nilai');
      $this->load->model('m_absen');

    }
    public function getjadwaltetap($kelas){

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

    public function Requestjadwal(){
      $id_sis = $this->input->post('id_siswa');
      $mapel = $this->input->post('mapel');
      $grade = $this->input->post('id_grade');
      $tgl = $this->input->post('tanggal');

      $data = array(
        'id_mapel' => $mapel,
        'id_siswa' => $id_sis,
        'id_grade' => $grade,
        'tanggal' => $tgl
      );

      $where = array(
        'id_mapel' => $mapel,
        'id_siswa' => $id_sis
      );
      $cekreq = $this->m_reqjadwal->cek_request("tbl_request_jadwal", $where)->num_rows();
      if ($cekreq > 0) {
        $callback = array('success' => '0', 'message' => 'Kamu sudah request Mapel ini');
        die(json_encode($callback));
      }else {
        $this->m_reqjadwal->input('tbl_request_jadwal', $data);
        $callback = array('success' => '1', 'message' => 'Request berhasil');
        die(json_encode($callback));
      }

    }

    public function getRequestjadwal(){
      $id_program = $this->input->post('id_program');

      $response = array();

      $were = array('id_program' => $id_program);

      $req = $this->m_reqjadwal->getjadwalbyprogram($were);

      foreach ($req as $dita) {
        $id_sis = $this->input->post('id_siswa');
        $mapel = $dita->id_mapel;
        $where = array(
          'id_mapel' => $mapel,
          'id_siswa' => "0"+$id_sis
        );
        $cekreq = $this->m_reqjadwal->cek_request("tbl_request_jadwal", $where)->num_rows();
        if ($cekreq > 0) {
          $ko = 1;
        }else {
          $ko = 0;
        }
        array_push($response, array(
          'id_reqmapel' => $dita->id_mapel,
          'nama_reqmapel' => $dita->nama_mapel,
          'ada' => $ko,
          'total_request' => $dita->total
        ));
      }

      $callback = array('reqjadwal' => $response);
      die(json_encode($callback));
    }

    public function getNilai(){
      $id_sis = $this->input->post('id_siswa');

      $nil = $this->m_nilai->shownilaisiswa($id_sis)->result();
      $ceknilai = $this->m_nilai->shownilaisiswa($id_sis)->num_rows();

      $response = array();

      if ($ceknilai > 0) {

        foreach ($nil as $k) {
          array_push($response, array(
            'nama_mapel'=> $k->nama_mapel,
            'to1' => $k->to1,
            'to2' => $k->to2,
            'to3' => $k->to3,
            'to4' => $k->to4,
            'to5' => $k->to5));
          }
          $callback = array('success'=>'1', 'nilai'=>$response);
      }else {
        $callback = array('success'=>'0', 'message' => 'Nilai Belum Ada');
      }
      die(json_encode($callback));
    }

  // public function getAbsen(){
  //   $id_sis = $this->input->post('id_siswa');
  //   $bulan = 06;
  //   // $absn = $this->m_absen->getAbsenbybulan($id_sis, $bulan)->result();
  //   // $cekabsen = $this->m_absen->getAbsenbybulan($id_sis, $bulan)->num_rows();
  //
  //   $response = array();
  //   $jan = array();
  //   $feb = array();
  //   $mar = array();
  //   $apr = array();
  //   $mei = array();
  //   $jun = array();
  //   $jul = array();
  //   $ags = array();
  //   $sep = array();
  //   $okt = array();
  //   $nov = array();
  //   $des = array();
  //
  //
  //
  //
  //
  //   for ($i=1; $i <12 ; $i++) {
  //     $absn = $this->m_absen->getAbsenbybulan($id_sis, '0'+$i)->result();
  //     $cekabsen = $this->m_absen->getAbsenbybulan($id_sis, '0'+$i)->num_rows();
  //
  //     switch ($i) {
  //       case 1:
  //         // code...
  //         break;
  //       case 6:
  //       if ($cekabsen >0) {
  //         foreach ($absn as $k) {
  //           $tgl = $k->tgl;
  //
  //           $tanggal = date("d-m-Y", strtotime($tgl));
  //
  //           $hari = date('l',strtotime($tgl));
  //           switch ($hari) {
  //             case 'Sunday':
  //               $day = 'Minggu';
  //               break;
  //             case 'Monday':
  //               $day = 'Senin';
  //               break;
  //             case 'Tuesday':
  //               $day = 'Selasa';
  //               break;
  //             case 'Wednesday':
  //               $day = 'Rabu';
  //               break;
  //             case 'Thursday':
  //               $day = 'Kamis';
  //               break;
  //             case 'Friday':
  //               $day = 'Jum`at';
  //               break;
  //             case 'Saturday':
  //               $day = 'Sabtu';
  //               break;
  //             default:
  //               $day = 'xxx';
  //               break;
  //         }
  //
  //         array_push($jun, array(
  //           'waktu' =>$day.", ".$tanggal,
  //           'jam_datang' => $k->jam_datang,
  //           'jam_pulang' => $k->jam_pulang,
  //           'keterangan'=> $k->keterangan
  //         ));
  //       }
  //     }else{
  //       $jun = 'Belum ada data absen pada bulan ini';
  //     }
  //         break;
  //
  //       default:
  //         // code...
  //         break;
  //     }
  //   }
  //
  //
  //   // if ($cekabsen > 0) {
  //   //   foreach ($absn as $k) {
  //   //     $tgl = $k->tgl;
  //   //
  //   //     $tanggal = date("d-m-Y", strtotime($tgl));
  //   //
  //   //     $hari = date('l',strtotime($tgl));
  //   //     switch ($hari) {
  //   //       case 'Sunday':
  //   //         $day = 'Minggu';
  //   //         break;
  //   //       case 'Monday':
  //   //         $day = 'Senin';
  //   //         break;
  //   //       case 'Tuesday':
  //   //         $day = 'Selasa';
  //   //         break;
  //   //       case 'Wednesday':
  //   //         $day = 'Rabu';
  //   //         break;
  //   //       case 'Thursday':
  //   //         $day = 'Kamis';
  //   //         break;
  //   //       case 'Friday':
  //   //         $day = 'Jum`at';
  //   //         break;
  //   //       case 'Saturday':
  //   //         $day = 'Sabtu';
  //   //         break;
  //   //       default:
  //   //         $day = 'xxx';
  //   //         break;
  //   //     }
  //   //     array_push($response, array(
  //   //       'waktu' =>$day.", ".$tanggal,
  //   //       'jam_datang' => $k->jam_datang,
  //   //       'jam_pulang' => $k->jam_pulang,
  //   //       'keterangan'=> $k->keterangan
  //   //     ));
  //   //     $callback = array('success'=>'0', 'absen' => $response);
  //   //   }
  //   // }else {
  //   //     // $callback = array('success' => '0', 'message' => 'Data Absen Belum Ada');
  //       $callback = array('success' => '1', 'jan' => $jan, 'feb' => $feb,
  //                                           'mar' => $mar,
  //                                           'apr' => $apr,
  //                                           'mei' => $mei,
  //                                           'jun' => $jun,
  //                                           'jul' => $jul,
  //                                           'ags' => $ags,
  //                                           'sep' => $sep,
  //                                           );
  //
  //
  //   die(json_encode($callback));
  // }
    public function getAbsenbybulan(){

      $absen = array();
      $id_sis = $this->input->post('id_siswa');
      $bulan = $this->input->post('bln');
        $absn = $this->m_absen->getAbsenbybulan($id_sis, $bulan)->result();
        $cekabsen = $this->m_absen->getAbsenbybulan($id_sis, $bulan)->num_rows();

        if ($cekabsen >0) {
                foreach ($absn as $k) {
                  $tgl = $k->tgl;

                  $tanggal = date("d-m-Y", strtotime($tgl));

                  $hari = date('l',strtotime($tgl));
                  switch ($hari) {
                    case 'Sunday':
                      $day = 'Minggu';
                      break;
                    case 'Monday':
                      $day = 'Senin';
                      break;
                    case 'Tuesday':
                      $day = 'Selasa';
                      break;
                    case 'Wednesday':
                      $day = 'Rabu';
                      break;
                    case 'Thursday':
                      $day = 'Kamis';
                      break;
                    case 'Friday':
                      $day = 'Jum`at';
                      break;
                    case 'Saturday':
                      $day = 'Sabtu';
                      break;
                    default:
                      $day = 'xxx';
                      break;
                }
                  $success = '1';
                array_push($absen, array(
                  'hari' =>$day,
                  'tanggal' => $tanggal,
                  'jam_datang' => $k->jam_datang,
                  'jam_pulang' => $k->jam_pulang,
                  'keterangan'=> $k->keterangan
                ));
              }
            }else{
              $success = '0';
              $absen = 'Belum ada data absen pada bulan ini';
            }

            $callback = array('success' => $success, 'absen' => $absen);


              die(json_encode($callback));
    }


  }
 ?>
