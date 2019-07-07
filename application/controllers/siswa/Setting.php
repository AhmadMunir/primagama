<?php
  class Setting extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_siswa');
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
      $data['siswa'] = $this->m_siswa->lht($whiri, 'view_siswa')->result();
      $where =  array('id_siswa' => $id);
      $data['tbl_siswa'] = $this->m_siswa->lht($where, 'view_siswa_detail')->result();
      $data['angByID'] = $this->m_siswa->get_angsuran($where, 'view_angsuran')->result();
      $data['keles'] = $this->m_siswa->get_kelas()->result();

      // $data['siswa'] = $this->m_siswa->lht($where, 'view_siswa')->result();
      $this->load->view('client/siswa/setting', $data);

    }





  public function update_siswa(){
    $id_sis = $this->input->post('id_siswa');
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
      'id_siswa' => $id_sis
    );

    $this->m_siswa->update_siswa($where, $data, 'tbl_siswa');
    redirect('admin/siswa/detail/'.$id_sis);
  }

  public function get_by_id($id)
    {
      $this->db->select('tbl_siswa.*,lgn_siswa');
      $this->db->join('tbl_siswa','lgn_siswa');
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
        'id_siswa' => $id
      );
      $cekpass = $this->m_login->cek_user("lgn_siswa", $where)->result();
      foreach ($cekpass as $key) {
        $pass = $key->password;
      }
      if (MD5($passlama)==$pass) {
        if ($passbaru == $passkon ) {
          if ($passbaru != null) {
            $where = array('id_siswa' => $id);
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
              'jabatan' => "siswa",
              'pss' => $passbaru
            );
            $this->session->set_userdata($data_session);
            $this->m_siswa->update_siswa($where, $datasis, 'tbl_siswa');
            $this->m_siswa->update_siswa($where, $datalog, 'lgn_siswa');
            $this->session->set_flashdata('sukses', 'SUKSES! Perubahan Tersimpan');
            redirect('siswa/setting/index/'.$ide);
          }else {
            $where = array('id_siswa' => $id);
            $datalog = array(
              'username' => $nama
            );

            $datasis = array(
              'email' => $email,
              'no_hp' => $no
            );

            $this->m_siswa->update_siswa($where, $datasis, 'tbl_siswa');
            $this->m_siswa->update_siswa($where, $datalog, 'lgn_siswa');
            $this->session->set_flashdata('sukses', 'SUKSES! Perubahan Tersimpan');
            redirect('siswa/setting/index/'.$ide);

          }
        }else {
          $this->session->set_flashdata('error1', 'Error!!! Password Baru dan Password Konfirmasi tidak sama!');
          redirect('siswa/setting/index/'.$ide);
        }
      }else {
        $this->session->set_flashdata('error', 'Error!!! Password lama tidak sama!');
        redirect('siswa/setting/index/'.$ide);
      }

    }

    }



 ?>
