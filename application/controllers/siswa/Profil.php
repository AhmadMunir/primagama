<?php
  class Profil extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_pembayaran');
      $this->load->model('m_siswa');
      $this->load->model('m_profile');

      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_siswa')->result();
      $this->load->view('client/siswa/profil', $data);
    }

   public function detail($id_siswa){
      $id=decrypt_url($id_siswa);
      $where =  array('id_siswa' => $id);
      $data['tbl_siswa'] = $this->m_siswa->lht($where, 'tbl_siswa')->result();
      $data['angByID'] = $this->m_siswa->get_angsuran($where, 'view_angsuran')->result();
      $data['keles'] = $this->m_siswa->get_kelas()->result();

        $nama = $this->session->nama;
        $whare = array(
          'username' => $nama
        );
        $data['siswa'] = $this->m_siswa->lht($whare, 'view_siswa')->result();
         $this->load->view('client/siswa/profil', $data);
        
  }
    public function get_biaya(){
      $kode=$this->input->post('kode');
      $data=$this->m_siswa->get_biaia($kode);
      echo json_encode($data);
    }

    private function _uploadgambar($id){
       $config['upload_path']          = './images/foto/profile/siswa/';
       $config['allowed_types']        = 'gif|jpg|png';
       $config['file_name']            = $id;
       $config['overwrite']			        = true;
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
      $this->m_profile->update_foto('tbl_siswa', $data, $where );

        redirect(base_url('siswa/profil/detail/'.encrypt_url($id)));

    }
  }
 ?>
