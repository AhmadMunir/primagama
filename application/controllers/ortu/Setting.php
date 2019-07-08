<?php
  class Setting extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_orangtua');
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
      $data['ortu'] = $this->m_orangtua->lht($whiri, 'view_ortu')->result();
      $where =  array('id_ortu' => $id);
      $data['tbl_ortu'] = $this->m_orangtua->lht($where, 'view_ortu')->result();
      //$data['angByID'] = $this->m_siswa->get_angsuran($where, 'view_angsuran')->result();
      $data['keles'] = $this->m_siswa->get_kelas()->result();

       //$data['siswa'] = $this->m_siswa->lht($where, 'view_siswa')->result();
      $this->load->view('client/ortu/setting', $data);

    }





  public function update_ortu(){
    $id_sis = $this->input->post('id_ortu');
    $namaL = $this->input->post('namaLenkap');
    $namaP = $this->input->post('namaPanggilan');
    $tempat = $this->input->post('tempat');
    $tgl = $this->input->post('tanggalLahir');
    $alamat = $this->input->post('address');
    $sekolah = $this->input->post('sekolah');
    $kelas = $this->input->post('kelas');
    $program = $this->input->post('program');
    $jk = $this->input->post('jk');
  


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
      
      'passLama' =>$passwordlama,
      'passBaru' =>$passwordBaru,
      'passKonf' =>$passwordKonfirmasi
    );

    $where = array(
      'id_ortu' => $id_ortu
    );

    $this->m_orangtua->update_ortu($where, $data, 'view_ortu');
    redirect('admin/ortu/detail/'.$id_ortu);
  }

  public function get_by_id($id)
    {
      $this->db->select('tbl_ortu.*,lgn_ortu');
      $this->db->join('tbl_ortu','lgn_ortu');
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
      $no = $this->input->post('no_hpayah');
      $no2 = $this->input->post('no_hpibu');
      $passkon = $this->input->post('passKonf');
      $passlama = $this->input->post('passLama');
      $ide = encrypt_url($id);
      $where = array(
        'id_ortu' => $id
      );
      $cekpass = $this->m_login->cek_user("lgn_ortu", $where)->result();
      foreach ($cekpass as $key) {
        $pass = $key->password;
      }
      if (MD5($passlama)==$pass) {
        if ($passbaru == $passkon ) {
          if ($passbaru != null) {
            $where = array('id_ortu' => $id);
            $datalog = array(
              'username' => $nama,
              'password' => MD5($passbaru)
            );

            $dataortu = array(
            
              'no_hpayah' => $no
            );
            $data_session =array(
              'id' => $id,
              'nama' => $nama,
              'status' => "login",
              'jabatan' => "ortu",
              'pss' => $passbaru
            );
            $this->session->set_userdata($data_session);
            $this->m_orangtua->update_ortu($where, $dataortu, 'view_ortu');
            $this->m_orangtua->update_ortu($where, $datalog, 'lgn_ortu');
            $this->session->set_flashdata('sukses', 'SUKSES! Perubahan Tersimpan');
            redirect('ortu/setting/index/'.$ide);
          }else {
            $where = array('id_ortu' => $id);
            $datalog = array(
              'username' => $nama
            );

            $dataortu = array(
              
              'no_hpibu' => $no2
            );

            $this->m_orangtua->update_siswa($where, $dataortu, 'tbl_ortu');
            $this->m_orangtua->update_siswa($where, $datalog, 'lgn_ortu');
            $this->session->set_flashdata('sukses', 'SUKSES! Perubahan Tersimpan');
            redirect('ortu/setting/index/'.$ide);

          }
        }else {
          $this->session->set_flashdata('error1', 'Error!!! Password Baru dan Password Konfirmasi tidak sama!');
          redirect('ortu/setting/index/'.$ide);
        }
      }else {
        $this->session->set_flashdata('error', 'Error!!! Password lama tidak sama!');
        redirect('ortu/setting/index/'.$ide);
      }

    }

    }



 ?>
