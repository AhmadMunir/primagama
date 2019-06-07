<?php
  class Pembayaran extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_pembayaran');

      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_ortu')->result();
      $this->load->view('client/ortu/pembayaran', $data);
    }

    public function showpembayaran(){
      $id_sis = $this->input->post('id_siswa');

      $byr = $this->m_pembayaran->showpembayaranbysiswa($id_sis)->result();

      $bayar = "<tr></tr>";
      $no = 1;

      foreach ($byr as $k) {
        $sisa = $k->sisa_tagihan;
        if ($sisa == 0) {
          $sisa = "Lunas";
        }else {
          $sisa = $k->sisa_tagihan;
        }
        $bayar .="<tr><td>".$no.
                "</td><td>".$k->waktu.
                "</td><td>".$k->jumlah_bayar.
                "</td><td>".$sisa."</td></tr>";
        $no++;
      }

      $callback = array('bayar' => $bayar);
      echo json_encode($callback);
    }
  }
 ?>
