<?php
  class Orangtua extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_orangtua');

      if($this->session->userdata('status') != "login")
        redirect(base_url("login"));
    }

    public function input($id){
      $this->load->view('admin/siswa/input_ortu');
    }

    public function update(){
      $id_sis = $this->input->post('id');
      $ayah = $this->input->post('namaayah');
      $ibu = $this->input->post('namaibu');
      $payah = $this->input->post('payah');
      $pibu = $this->input->post('pibu');
      $noayah = $this->input->post('noayah');
      $noibu = $this->input->post('noibu');

      $data = array(
        'nama_ayah' => $ayah,
        'pekerjaan_ayah' => $payah,
        'no_hpayah' => $noayah,
        'nama_ibu' => $ibu,
        'pekerjaan_ibu' => $payah,
        'no_hpibu' => $noibu
      );

      $where = array(
        'id_siswa' => $id_sis
      );

      $this->m_orangtua->update_ortu($where, $data, 'tbl_ortu');
      redirect('admin/siswa/detail/'.$id_sis);
    }
  }
 ?>
