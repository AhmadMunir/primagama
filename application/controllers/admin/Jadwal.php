<?php
class Jadwal extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_jadwal');
    $this->load->helper('url');

    if($this->session->userdata('status') != "login")
      redirect(base_url("login"));
  }
  public function index(){
    $data['request_jadwal'] = $this->m_jadwal->getJadwal()->result();
    $this->load->view('admin/requestjadwal/jadwal', $data);
  }
}

 ?>
