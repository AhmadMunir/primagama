<?php
  class Kelas extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_kelas');
      $this->load->model('m_siswa');
      $this->load->model('m_nilai');

      if($this->session->userdata('status') != "login")
        redirect(base_url("login"));
    }

    public function index(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['kelas'] = $this->m_kelas->getKelasbytentor($where)->result();
      $data['siswa'] = $this->m_siswa->lht($where, 'view_tntr_dtl')->result();
      $this->load->view('client/tentor/kelas', $data);
    }
    public function kelasnilai(){
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['kelas'] = $this->m_kelas->getKelasbytentor($where)->result();
      $data['siswa'] = $this->m_siswa->lht($where, 'view_tntr_dtl')->result();
      $this->load->view('client/tentor/kelasnilai', $data);
    }

    public function getkelas(){
      $id = $this->input->post('username');

      $where = array('username'=>$id);
      $kelas = $this->m_kelas->getKelasbytentor($where)->result();

      $kls = "<a></a>";

      foreach ($kelas as $k) {
        $id = $k->id_kelas;

        $kels = $this->m_kelas->getKelasbyid($id);
        foreach ($kels as $ke) {
          // code...
          $kls .="<a href='".base_url('tentor/kelas/isi/').$ke->id_kelas."' class='btn-box span3'><i class='icon-adjust'></i><b>".$ke->nama_kelas."</b> </a>" ;
        }
      }

      $callback = array('kls' => $kls);
      echo json_encode($callback);
    }

    public function isi($id){
      $wher = array('id_kelas'=> $id);

      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );

      $data['siswa'] = $this->m_siswa->lht($where, 'view_tntr_dtl')->result();
      $data['isi'] = $this->m_kelas->get_isikls($wher);

      $this->load->view('client/tentor/isi', $data);

    }

    public function getkelasnilai(){
      $id = $this->input->post('username');

      $where = array('username'=>$id);
      $kelas = $this->m_kelas->getKelasbytentor($where)->result();

      $kls = "<a></a>";

      foreach ($kelas as $k) {
        $id = $k->id_kelas;

        $kels = $this->m_kelas->getKelasbyid($id);
        foreach ($kels as $ke) {
          // code...
          $kls .="<a href='".base_url('tentor/kelas/nilai/').$ke->id_kelas."' class='btn-box span3'><i class='icon-adjust'></i><b>".$ke->nama_kelas."</b> </a>" ;
        }
      }

      $callback = array('kls' => $kls);
      echo json_encode($callback);
    }
    public function nilai($kls = null){
      if (!isset($kls)) redirect('admin/nilai');
      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_tntr_dtl')->result();
      $where = array('id_kelas' => $kls);
      $data['isi'] = $this->m_nilai->get_isinilai($where);
      $this->load->view('client/tentor/isinilai', $data);
    }
  }
 ?>
