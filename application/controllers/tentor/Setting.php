<?php
  class Setting extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_tentor');
      $this->load->model('m_login');
      //
      if($this->session->userdata('status') != "login")
        redirect(base_url("login"));
    }



    public function index($ids){
      $id = decrypt_url($ids);
      $nama = $this->session->nama;
      $whiri = array(
        'username' => $nama
      );
      $data['tentor'] = $this->m_siswa->lht($whiri, 'view_siswa')->result();
      $where =  array('id_tentor' => $id);
      $data['tbl_tentor'] = $this->m_tentor->lht($where, 'view_tntr_dtl')->result();
     // $data['angByID'] = $this->m_tentor->get_angsuran($where, 'view_angsuran')->result();
     // $data['keles'] = $this->m_tentor->get_kelas()->result();

      $data['siswa'] = $this->m_siswa->lht($whiri, 'view_tntr_dtl')->result();
      $this->load->view('client/tentor/setting', $data);

    }





  public function update_tentor(){
    $id_sis = $this->input->post('id_tentor');
    $namaL = $this->input->post('namaLenkap');
    $namaP = $this->input->post('namaPanggilan');
    $tempat = $this->input->post('tempat');
    $tgl = $this->input->post('tanggalLahir');
    $alamat = $this->input->post('address');
    $sekolah = $this->input->post('sekolah');
    $kelas = $this->input->post('kelas');
    $program = $this->input->post('program');
    $jk = $this->input->post('jk');
    $email = $this->input->post('email');


    $data = array(
      'nama_lengkap' => $namaL,
      'nama_panggilan' => $namaP,
      'tempat' => $tempat,
      'tanggal_lahir' => $tgl,
      'id_sekolah' => $sekolah,
      'id_grade' => $kelas,
      'id_program' => $program,
      'jenis_kelamin' => $jk,
      'alamat' => $alamat,
      'email' => $email,
      'passLama' =>$passwordlama,
      'passBaru' =>$passwordBaru,
      'passKonf' =>$passwordKonfirmasi
    );

    $where = array(
      'id_tentor' => $id_tentor
    );

    $this->m_tentor->update_tentor($where, $data, 'tbl_tentor');
    redirect('admin/tentor/detail/'.$id_tentor);
  }

  public function get_by_id($id)
    {
      $this->db->select('tbl_tentor.*,lgn_tentor');
      $this->db->join('tbl_tentor','lgn_tentor');
      $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        return $query->row();
    }

 public function updateprofile(){
      $id = $this->session->id;
      $nama = $this->input->post('name');
      $email = $this->input->post('email');
      $passbaru = $this->input->post('passBaru');
      $no = $this->input->post('nohp');
      $passkon = $this->input->post('passKonf');
      $passlama = $this->input->post('passLama');
      $ide = encrypt_url($id);
      $where = array(
        'id_tentor' => $id
      );
      $cekpass = $this->m_login->cek_user("lgn_tentor", $where)->result();
      foreach ($cekpass as $key) {
        $pass = $key->password;
      }
      if (MD5($passlama)==$pass) {
        if ($passbaru == $passkon ) {
          if ($passbaru != null) {
            $where = array('id_tentor' => $id);
            $datalog = array(
              'username' => $nama,
              'password' => MD5($passbaru)
            );

            $datasis = array(
              'email' => $email,
              'no_hp' => $no
            );
            $data_session =array(
              'id' => $id,
              'nama' => $nama,
              'status' => "login",
              'jabatan' => "tentor",
              'pss' => $passbaru
            );
            $this->session->set_userdata($data_session);
            $this->m_tentor->update_tentor($where, $datasis, 'tbl_tentor');
            $this->m_tentor->update_tentor($where, $datalog, 'lgn_tentor');
            $this->session->set_flashdata('sukses', 'SUKSES! Perubahan Tersimpan');
            redirect('tentor/setting/index/'.$ide);
          }else {
            $where = array('id_tentor' => $id);
            $datalog = array(
              'username' => $nama
            );

            $datasis = array(
              'email' => $email,
              'no_hp' => $no
            );

            $this->m_tentor->update_tentor($where, $datasis, 'tbl_tentor');
            $this->m_tentor->update_tentor($where, $datalog, 'lgn_tentor');
            $this->session->set_flashdata('sukses', 'SUKSES! Perubahan Tersimpan');
            redirect('tentor/setting/index/'.$ide);

          }
        }else {
          $this->session->set_flashdata('error1', 'Error!!! Password Baru dan Password Konfirmasi tidak sama!');
          redirect('tentor/setting/index/'.$ide);
        }
      }else {
        $this->session->set_flashdata('error', 'Error!!! Password lama tidak sama!');
        redirect('tentor/setting/index/'.$ide);
      }

    }

    }



 ?>
