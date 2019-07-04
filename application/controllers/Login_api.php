<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_api extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('login_apimodel');
      $this->load->model('m_siswa');
    }


	public function proses() {

		$response = new stdClass();
    $username=$this->input->post("username");
		$password=$this->input->post("password");

		if ((empty($username)) || (empty($password))) {

		$response->success = 0;
		$response->message = "Lengkapi username dan password";
		die(json_encode($response));
		}
		$ceksiswa = $this->login_apimodel->Getuser(array('username' => $username, 'password' => md5($password)),'lgn_siswa');
    $cekortu = $this->login_apimodel->Getuser(array('username' => $username, 'password' => md5($password)),'lgn_ortu');
		$hasil = $ceksiswa->result_array();
    $hasil2 = $cekortu->result_array();

		if ($ceksiswa->num_rows() > 0) {
      $detail = $this->m_siswa->getSiswaDetail($username);
      $det = $detail->result();
      foreach ($det as $key) {
        $kelas = $key->nama_kelas;
        $id_kelas = $key->id_kelas;
        $program = $key->id_program;
        $foto = $key->foto;
      }


				$response->success = 1;
        $response->user = "siswa";
				$response->message = "Selamat datang ".$hasil[0]['username'];
				$response->id = $hasil[0]['id_siswa'];
        $response->id_program = $program;
				$response->username = $hasil[0]['username'];
        $response->kelas = $kelas;
        $response->id_kelas = $id_kelas;
        $response->foto= $foto;
				die(json_encode($response));

		}elseif ($cekortu->num_rows() > 0) {
      $where = array('username' => $username);
      $detail = $this->m_siswa->lht($where, 'view_ortu')->result();
      foreach ($detail as $k) {
        $anak = $k->panak;
        $id_siswa = $k->id_siswa;
        $kelas = $k->nama_kelas;
        $program = $k->program;
        $sekolah = $k->nama_sekolah;
      }

      $response->success = 2;
      $response->user = "ortu";
      $response->message = "Selamat Datang Orang Tua ".$anak;
      $response->username = $hasil2[0]['username'];
      $response->anak = $anak;
      $response->id_siswa = $id_siswa;
      $response->program = $program;
      $response->kelas = $kelas;
      $response->sekolah = $sekolah;
      die(json_encode($response));
    }
		else {
				$response->success = 0;
				$response->message = "Username atau password salah woi";
				die(json_encode($response));
		}
	}

}
	?>
