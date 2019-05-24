<?php
class Jadwaltetap extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_jadwal_tetap');
    $this->load->helper('url');

    if($this->session->userdata('status') != "login")
      redirect(base_url("login"));
  }
  public function index(){
    $data['input_jadwal'] = $this->m_jadwal_tetap->getJadwal()->result();
    $this->load->view('admin/requestjadwal/jadwal_tetap', $data);
  }


 public function input(){
  $data['kodeunik'] = $this->m_jadwal_tetap->kode();
  $data['mapel'] = $this->m_jadwal_tetap->viewMapel();
  $data['tentor'] = $this->m_jadwal_tetap->viewTentor();
  $data['ruang'] = $this->m_jadwal_tetap->viewruang();
  $data['kelas'] = $this->m_jadwal_tetap->viewKelas();

  $this->load->view('admin/requestjadwal/input_jadwal', $data);
  }


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
    $this->m_jadwal_tetap->input_jadwal($data,'tbl_jadwal');
    redirect('admin/home');
  }
}

 ?>
