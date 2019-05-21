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
}

 ?>