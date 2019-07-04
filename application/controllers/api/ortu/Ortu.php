<?php
  Class Ortu extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_jadwal_tetap');
      $this->load->model('m_reqjadwal');
      $this->load->model('m_nilai');
      $this->load->model('m_absen');
      $this->load->model('m_pembayaran');
    }

    public function getpembayaran(){
      $id_sis = $this->input->post('id_siswa');
      $pembayaran = array();
      $cekbyr=$byr = $this->m_pembayaran->showpembayaranbysiswa($id_sis)->num_rows();
      $byr = $this->m_pembayaran->showpembayaranbysiswa($id_sis)->result();
      $no = 1;
      if ($cekbyr > 0) {
        $success = 1;
        foreach ($byr as $key) {
          $sisa = $key->sisa_tagihan;
          if ($sisa == 0) {
            $sisa = "Lunas";
          }else {
            $sisa = $key->sisa_tagihan;
          }
          array_push($pembayaran, array(
            'no' => $no++,
            'waktu' => $key->waktu,
            'jumlah_bayar' => $key->jumlah_bayar,
            'sisa' => $sisa,
            'admin'=> 'munir'
          ));
        }
      }else {
        $success = 0;
        $pembayaran = 'Tidak ada Data Pembayaran';
      }
      $callback = array('success' => $success, 'pembayaran' => $pembayaran);
      die(json_encode($callback));
    }
  }
 ?>
