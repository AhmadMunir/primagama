<?php
  class Inputsiswa extends CI_Controller{
    public function __construct(){
  		parent::__construct();

  		$this->load->model('M_siswa');

      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
  	}

  	public function index(){
      $data['kodeunik'] = $this->M_siswa->kode();
  		$data['jenjang'] = $this->M_siswa->viewJenjang();
      $data['program'] = $this->M_siswa->viewprogram();

  		$this->load->view('admin/siswa/input_siswa', $data);
  	}

  	public function listKelas(){
  		// Ambil data ID Provinsi yang dikirim via ajax post
  		$id_jenjang = $this->input->post('id_jenjang');

  		$kelas = $this->M_siswa->viewByJenjang($id_jenjang);

  		// Buat variabel untuk menampung tag-tag option nya
  		// Set defaultnya dengan tag option Pilih
  		$lists = "<option value=''>Pilih</option>";

  		foreach($kelas as $data){
  			$lists .= "<option value='".$data->id_grade."'>".$data->kelas."</option>"; // Tambahkan tag option ke variabel $lists
  		}

  		$callback = array('list_kelas'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

  		echo json_encode($callback); // konversi varibael $callback menjadi JSON
  	}

    public function tambah_siswa(){
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
        'id_siswa' => $id_sis,
        'nama_lengkap' => $namaL,
        'nama_panggilan' => $namaP,
        'tempat' => $tempat,
        'tanggal_lahir' => $tgl,
        'sekolah' => $sekolah,
        'id_grade' => $kelas,
        'id_program' => $program,
        'jenis_kelamin' => $jk,
        'alamat' => $alamat,
        'email' => $email
      );
      $this->M_siswa->input_siswa($data,'tbl_siswa');
      redirect('admin/home');
    }

  }
 ?>
