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
      $this->load->view('admin/tentor/index.php', $data);
    }

    public function detail($id){
      $where = array('id_tentor' => $id);
      $data['tbl_tentor'] = $this->m_tentor->lht($where, 'tbl_tentor')->result();
      $this->load->view('admin/tentor/detail', $data);
    }

    public function delete($id){
      $where = array('id_tentor' => $id);
      $this->m_tentor->delete($where, 'tbl_tentor');
      $this->session->set_flashdata('success', 'Data berhasil terhapus!');
      redirect('admin/tentor');
    }

    public function input(){
      $data['tbl_mapel'] = $this->m_tentor->get_mapel();
      $this->load->view('admin/tentor/input', $data);
    }

    public function edit($id){
      $where = array('id_tentor' => $id);
      $data['tbl_tentor'] = $this->m_tentor->lht($where, 'tbl_tentor')->result();
      $data['tbl_mapel'] = $this->m_tentor->get_mapel();

      $this->load->view('admin/tentor/edit', $data);
    }

    public function tambah_tentor(){
      $nama = $this->input->post('namaLenkap');
      $tempat = $this->input->post('tempat');
      $tgl = $this->input->post('tanggalLahir');
      $alamat = $this->input->post('address');
      $mapel = $this->input->post('mapel');
      $email = $this->input->post('email');
      $jk = $this->input->post('jk');

      $data = array(
        'nama' => $nama,
        'alamat' => $alamat,
        'tempat' => $tempat,
        'tanggal_lahir' =>$tgl,
        'id_mapel' => $mapel,
        'email' => $email,
        'jenis_kelamin' => $jk
      );

      $this->m_tentor->input($data, 'tbl_tentor');
      redirect('admin/tentor/');
    }

    public function update(){
      $id = $this->input->post('id_tentor');
      $nama = $this->input->post('namaLenkap');
      $tempat = $this->input->post('tempat');
      $tgl = $this->input->post('tanggalLahir');
      $alamat = $this->input->post('address');
      $mapel = $this->input->post('mapel');
      $email = $this->input->post('email');
      $jk = $this->input->post('jk');

      $data = array(
        'nama' => $nama,
        'alamat' => $alamat,
        'tempat' => $tempat,
        'tanggal_lahir' =>$tgl,
        'id_mapel' => $mapel,
        'email' => $email,
        'jenis_kelamin' => $jk
      );
      $where = array(
        'id_tentor' => $id
      );

      $this->m_tentor->update_tentor($where, $data, 'tbl_tentor');
      $this->session->set_flashdata('success', 'Data berhasil diubah!');
      redirect('admin/tentor/detail/'. $id);
    }
  }
 ?>
