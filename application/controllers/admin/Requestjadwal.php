<?php
  class Requestjadwal extends CI_Controller{
    public function __construct(){
      parent::__construct();

      $this->load->model('M_jadwal');

      if($this->session->userdata('status') != "login")
        redirect(base_url("login"));
    }

    public function index(){
      $data['requestjadwal'] = $this->M_jadwal->viewJadwal();

      $this->load->view('admin/requestjadwal/requestjadwal', $data);
    }

    // public function listJadwal(){
    //   // Ambil data ID Provinsi yang dikirim via ajax post
    //   $id_jadwal = $this->input->post('id_jadwal');

    //   $jadwal = $this->M_jadwal->viewByJadwal($id_jadwal);

    //   // Buat variabel untuk menampung tag-tag option nya
    //   // Set defaultnya dengan tag option Pilih
    //   $lists = "<option value=''>Pilih</option>";

    //   foreach($jadwal as $data){
    //     $lists .= "<option value='".$data->id_grade."'>".$data->kelas."</option>"; // Tambahkan tag option ke variabel $lists
    //   }

    //   $callback = array('list_kelas'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

    //   echo json_encode($callback); // konversi varibael $callback menjadi JSON
    // }

    public function jadwal(){
      $idJ = $this->input->post('id_jadwal');
      $mpl = $this->input->post('mapel');
      $tgl = $this->input->post('tanggal');
      $kls = $this->input->post('kelas');
      $rg = $this->input->post('ruang');
      $jm = $this->input->post('jam');
    

      $data = array(
        'id_jadwal' => $idJ, 
        'mapel' => $mapl,
        'tanggal' => $tgl,
        'kelas' => $kls,
        'ruang' => $rg,
        'jam' => $jm,
      );
      $this->M_jadwal->request_jadwal($data,'tbl_request_jadwal');
      redirect('admin/home');
    }

  }
 ?>
