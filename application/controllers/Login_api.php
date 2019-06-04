<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_api extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('login_apimodel');
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
		$cek = $this->login_apimodel->Getuser(array('username' => $username, 'password' => $password));
		$hasil = $cek->result_array();

		if ($cek->num_rows() > 0) {

				$response->success = 1;
				$response->message = "Selamat datang ".$hasil[0]['username'];
				$response->id = $hasil[0]['id_siswa'];
				$response->username = $hasil[0]['username'];
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
