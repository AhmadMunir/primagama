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


      $this->load->view('admin/Requestjadwal/requestjadwal', $data);
   }

      public function listKelas(){
      // Ambil data ID Provinsi yang dikirim via ajax post
      $id_jenjang = $this->input->post('id_jenjang');

      $kelas = $this->M_siswa->viewByJenjang($id_jenjang);

      // Buat variabel untuk menampung tag-tag option nya
      // Set defaultnya dengan tag option Pilih
      $lists = "<option value=''>Pilih</option>";

      foreach($kelas as $data){
        $lists .= "<option value='".$data->id_grade."'>".$data->kelas."</option>"; // Tambahkan tag option ke variabel $lists
      }

      $callback = array('list_kelas'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

      echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function jadwal(){
     
      $mpl = $this->input->post('mapel');
      $tgl = $this->input->post('tanggal');
      $kelas = $this->input->post('kelas');
    
     
      $data = array(
       
        'mapel' => $mpl,
        'tanggal' => $tgl,
        'id_grade' => $kelas,
     
      );
      $this->M_jadwal->request_jadwal($data,'tbl_request_jadwal');
      redirect('admin/home');
    }

  }
 ?>
