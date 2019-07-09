<?php
  class Profile extends CI_Controller{
    public function __construct(){
      parent::__construct();

      $this->load->model("m_profile");

      if($this->session->userdata('status') =="login"){
        if ($this->session->userdata('jabatan')!='admin') {
          switch ($this->session->userdata('jabatan')) {
            case 'siswa':
              redirect('siswa/home');
              break;
              case 'ortu':
                redirect('ortu/home');
                break;
                case 'tentor':
                  redirect('tentor/home');
                  break;
            default:
              // code...
              break;
          }
        }
      }else {

        redirect(base_url("login"));
      }
    }

    private function _uploadgambar(){
       $config['upload_path']          = './images/foto/profile/admin/';
       $config['allowed_types']        = 'gif|jpg|png';
       $config['file_name']            = $this->session->id;
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
      $foto = $this->_uploadgambar();
      $data = array('foto' => $foto);
      $where = array('id_admin' => $id);
      $this->m_profile->update_foto('tbl_admin', $data, $where );

        redirect(site_url('admin/profile/index/'.$id));

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
