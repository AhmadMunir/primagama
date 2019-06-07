<?php
  class Absenanak extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_absen');
      //
      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_ortu')->result();
      $this->load->view('client/ortu/absenanak', $data);
    }

    public function Absen(){
      $id_sis = $this->input->post('id_siswa');

      $absn = $this->m_absen->getabsensiswa($id_sis)->result();

      $absen = "<tr></tr>";
      $no = 1;

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
        $absen .= "<tr><td>".$no.
                  "</td><td>".$day.", ".$tanggal."
                  </td><td>".$k->jam_datang."
                  </td><td>".$k->jam_pulang."
                  </td><td>".$k->keterangan."
                  </td></tr>";
        $no++;
      }

      $callback = array('absen' => $absen);
      echo json_encode($callback);
    }

  }
 ?>
