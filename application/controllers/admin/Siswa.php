<?php
class Siswa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_siswa');
    $this->load->helper('url');
    $this->load->library('form_validation');

    if($this->session->userdata('status') != "login")
      redirect(base_url("login"));
  }
  public function index(){
    $data['view_siswa'] = $this->m_siswa->getSiswa()->result();
    $this->load->view('admin/siswa/siswa', $data);
  }

  public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/siswa');
       
        $Siswa = $this->m_siswa;
        $validation = $this->form_validation;
        $validation->set_rules($Siswa->rules());

        if ($validation->run()) {
            $Siswa->update();
            $this->session->set_flashdata('Success', 'Berhasil disimpan');
        }

        $data["view_siswa"] = $siswa->getById($id);
        if (!$data["view_siswa"]) show_404();
        
        $this->load->view('admin/siswa/edit_form', $data);
    }

  public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_siswa->delete($id)) {
            redirect(site_url('admin/siswa/siswa'));
        }
    }
}
 ?>
