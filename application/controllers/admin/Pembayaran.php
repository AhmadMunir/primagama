<?php
  class Pembayaran extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_pembayaran');

      if($this->session->userdata('status') != "login")
        redirect(base_url("login"));
    }

    public function index(){

    }

    public function input(){
      $data['kode'] = $this->m_pembayaran->kode();

      $this->load->view('admin/pembayaran/input', $data);
    }

    public function get_dtl(){
  		$kode=$this->input->post('kode');
  		$data=$this->m_pembayaran->get_data_barang_bykode($kode);
  		echo json_encode($data);
  	}

    public function tambah_bayar(){
      $id = $this->input->post('id');
      $id_sis = $this->input->post('id_sis');
      $jml = $this->input->post('jml');
      $sisa = $this->input->post('sisaL');

      $data = array(
        'id_pembayaran' => $id,
        'id_siswa' => $id_sis,
        'jumlah_bayar' => $jml,
        'sisa_tagihan' => $sisa
      );

      $this->m_pembayaran->input($data, 'tbl_pembayaran');
      $this->session->set_flashdata('successbayar', 'Pembayaran Berhasil, Silahkan Cek Tab Angsuran!');
      redirect('admin/siswa/detail/'.$id_sis);
    }

    
  }
 ?>
