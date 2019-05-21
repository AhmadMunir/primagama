<?php
  class Inputjadwal2 extends CI_Controller{
    public function __construct(){
      parent::__construct();

      $this->load->model('M_jadwal_tetap');

      if($this->session->userdata('status') != "login")
        redirect(base_url("login"));
    }

    public function index(){
     $data['input_jadwal'] = $this->M_jadwal_tetap->viewJadwal();
    $this->load->view('admin/requestjadwal/input_jadwal', $data);

   }
   public function input(){
    $data['kodeunik'] = $this->M_jadwal_tetap->kode();
    $data['tentor'] = $this->M_jadwal_tetap->viewTentor();
    $data['ruang'] = $this->M_jadwal_tetap->viewruang();

    $this->load->view('admin/requestjadwal/input_jadwal', $data);
    }

      //public function listTentor(){

    //$id_tentor = $this->input->post('id_tentor');

    //$tentor = $this->M_jadwal_tetap->viewtentorById($id_tentor);


   // $lists = "<option value=''>Pilih</option>";

   // foreach($tentor as $data){
    //  $lists .= "<option value='".$data->id_tentor."'>".$data->nama."</option>"; // Tambahkan tag option ke variabel $lists
   // }

   // $callback = array('list_tentor'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

   // echo json_encode($callback); // konversi varibael $callback menjadi JSON
  //}


    public function tambah_jadwal(){
       $id_jdl = $this->input->post('id_jadwal');
      $mpl = $this->input->post('mapel');
      $hr = $this->input->post('hari');
      $jam = $this->input->post('jam');
      $kelas = $this->input->post('kelas');
      $tentor = $this->input->post('tentor');
      $ruang = $this->input->post('ruang');


      $data = array(

        'id_mapel' => $mpl,
        'hari' => $hr,
        'jam' => $jam,
        'id_kelas' => $kelas,
        'id_tentor' => $tentor,
        'id_ruang' => $ruang,

      );
      $this->M_jadwal_tetap->input_jadwal($data,'tbl_jadwal');
      redirect('admin/home');
    }

  }
 ?>
