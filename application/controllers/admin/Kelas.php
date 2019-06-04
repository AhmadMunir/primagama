<?php
  class Kelas extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_kelas');
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
  }
 ?>
