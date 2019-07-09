<?php
  class Kelas extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_kelas');

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

    public function index(){
      $data['kelas'] = $this->m_kelas->get_kelas();
      $this->load->view('admin/kelas/index', $data);
    }

    public function detail($kls = null){
      if (!isset($kls)) redirect('admin/kelas');

      $where = array('id_kelas' => $kls);
      $data['isi'] = $this->m_kelas->get_isikls($where);
      $this->load->view('admin/kelas/isi_kelas', $data);
    }

    public function search(){
      $keyword = $this->input->post('keyword');
      $kelas = $this->m_kelas->search($keyword);

      $hasil = $this->load->view('admin/kelas/search', array('kelas'=>$kelas), true);

      $callback = array(
        'hasil' => $hasil,
      );

      echo json_encode($callback);
    }
     public function kelasrequest(){
       $data['kelasreq'] = $this->m_kelas->reqkelas()->result();
       $this->load->view('admin/kelas/kelasreqjadwal', $data);
     }
  }
 ?>
