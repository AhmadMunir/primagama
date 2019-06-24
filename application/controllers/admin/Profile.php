<?php
  class Profile extends CI_Controller{
    public function __construct(){
      parent::__construct();

      $this->load->model("m_profile");

      if($this->session->userdata('status')!= "login")
        redirect(base_url("login"));


    }
      public function edit($id = null) {
    if (!isset($id)) redirect('admin/profile');

    $produks = $this->m_profile;
    $validation = $this->form_validation;
    $validation->set_rules($produks->rules());

    if($validation->run()){
      $produks->update();
      $this->session->set_flashdata('success','Berhasil Diedit');
    }

    $data["profile"] = $produks->getById($id);
    if(!$data["profile"]) show_404();

    $this->load->view('admin/form/edit_form',$data);
   }

    public function delete($id=null){
      if (!isset($id)) show_404();

      if ($this->m_profile->delete($id)) {
        redirect(site_url('admin/profile'));
        }
  }
      

    public function index($username = ''){
      $data["profile"] = $this->m_profile->getdata($username);
      $this->load->view('admin/profile', $data);
    }
  }
 ?>
