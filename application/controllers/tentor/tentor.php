<?php
  class Tentor extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_tentor');

      if($this->session->userdata('status') != "login")
        redirect(base_url("login"));
    }

    public function index(){
      $data['view_tentor'] = $this->m_tentor->get_tentor()->result();
      $this->load->view('client/tentor/profile', $data);
    }
     public function detail($id){
      $where =  array('id_tentor' => $id);
      $data['tbl_tentor'] = $this->m_tentor->lht($where, 'tbl_tentor')->result();
      $data['angByID'] = $this->m_siswa->get_angsuran($where, 'view_angsuran')->result();
      $data['keles'] = $this->m_siswa->get_kelas()->result();

        $nama = $this->session->nama;
        $whare = array(
          'username' => $nama
        );
        $data['tentor'] = $this->m_tentor->lht($whare, 'view_tentor')->result();
        $this->load->view('client/tentor/profil', $data);
  }

private function _uploadgambar($id){
       $config['upload_path']          = './images/foto/profile/siswa/';
       $config['allowed_types']        = 'gif|jpg|png';
       $config['file_name']            = $id;
       $config['overwrite']             = true;
       $config['max_size']             = 10240; // 1MB
       // $config['max_width']            = 1024;
       // $config['max_height']           = 768;

       $this->load->library('upload');
       $this->upload->initialize($config);

       if ($this->upload->do_upload('foto')) {
           return $this->upload->data("file_name");
       }

       return "default.jpg";
    }

    public function editfoto(){
      // $post = $this->input->post()
      $id = $this->input->post('id');
      $foto = $this->_uploadgambar($id);
      $data = array('foto' => $foto);
      $where = array('id_siswa' => $id);
      $this->m_profile->update_foto('tbl_tentor', $data, $where );

        redirect(base_url('tentor/profil/detail/'.$id));

    }

}
 ?>
