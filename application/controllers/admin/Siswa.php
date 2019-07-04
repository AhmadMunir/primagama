 <?php
class Siswa extends CI_Controller
{
  private $_table = "siswa";


  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_siswa');
    $this->load->model('m_pembayaran');

    if($this->session->userdata('status') != "login")
      redirect(base_url("login"));
  }
  public function index(){
    $data['view_siswa'] = $this->m_siswa->getSiswa()->result();
    $this->load->view('admin/siswa/siswa', $data);
  }

  public function edit($id){
      $where =  array('id_siswa' => $id);
      $data['jenjang'] = $this->m_siswa->viewJenjang();
      $data['program'] = $this->m_siswa->viewprogram();
      $data['tbl_siswa'] = $this->m_siswa->lht($where, 'tbl_siswa')->result();

      $this->load->view('admin/siswa/edit_siswa', $data);
  }

  public function input(){
    $data['kodeunik'] = $this->m_siswa->kode();
    $data['jenjang'] = $this->m_siswa->viewJenjang();
    $data['program'] = $this->m_siswa->viewprogram();
    $data['kode'] = $this->m_pembayaran->kode();
    $this->load->view('admin/siswa/input_siswa', $data);
  }

  public function listKelas(){

    $id_jenjang = $this->input->post('id_jenjang');

    $kelas = $this->m_siswa->viewByJenjang($id_jenjang);


    $lists = "<option value=''>Pilih</option>";

    foreach($kelas as $data){
      $lists .= "<option value='".$data->id_grade."'>".$data->kelas."</option>"; // Tambahkan tag option ke variabel $lists
    }

    $callback = array('list_kelas'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  }

  public function listSekolah(){
    // Ambil data ID Provinsi yang dikirim via ajax post
    $id_jenjang = $this->input->post('id_jenjang');

    $tbl_siswa = $this->m_siswa->viewsekolahByJenjang($id_jenjang);

    // Buat variabel untuk menampung tag-tag option nya
    // Set defaultnya dengan tag option Pilih
    $lists = "<option value=''>Pilih</option>";

    foreach($tbl_siswa as $data){
      $lists .= "<option value='".$data->id_sekolah."'>".$data->nama_sekolah."</option>"; // Tambahkan tag option ke variabel $lists
    }

    $callback = array('list_sekolah'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

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
    $biaya = $this->input->post('biaya');
    $kodebia = $this->input->post('kode');

    $bi = array(
      'id_pembayaran' => $kodebia,
      'id_siswa' =>$id_sis,
      'jumlah_bayar' => 0,
      'sisa_tagihan' => $biaya
    );

    $data = array(
      'id_siswa' => $id_sis,
      'nama_lengkap' => $namaL,
      'nama_panggilan' => $namaP,
      'tempat' => $tempat,
      'tanggal_lahir' => $tgl,
      'id_sekolah' => $sekolah,
      'id_grade' => $kelas,
      'id_program' => $program,
      'jenis_kelamin' => $jk,
      'alamat' => $alamat,
      'email' => $email
    );
    $this->m_siswa->input_siswa($data,'tbl_siswa');
    $this->m_pembayaran->input($bi, 'tbl_pembayaran');
    redirect('admin/orangtua/input/'.$id_sis);
  }

  public function update(){
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
      'email' => $email
    );

    $where = array(
      'id_siswa' => $id_sis
    );

    $this->m_siswa->update_siswa($where, $data, 'tbl_siswa');
    redirect('admin/siswa/detail/'.$id_sis);
  }

  public function updatekls(){
    $id_sis = $this->input->post('id');
    $kls = $this->input->post('kelsa');


    $data = array(
      'id_kelas' => $kls,
    );

    $where = array(
      'id_siswa' => $id_sis
    );

    $this->m_siswa->update_kls($where, $data, 'tbl_siswa');
    redirect('admin/siswa/detail/'.$id_sis);
  }

  public function detail($id_siswa){
    $id = decrypt_url($id_siswa);
      $where =  array('id_siswa' => $id);
      $data['tbl_siswa'] = $this->m_siswa->lht($where, 'tbl_siswa')->result();
      $data['angByID'] = $this->m_siswa->get_angsuran($where, 'view_angsuran')->result();
      $data['keles'] = $this->m_siswa->get_kelas()->result();
      $this->load->view('admin/siswa/detail', $data);
  }

  public function delete($id){
    $where = array('id_siswa' => $id);
    $this->m_siswa->delete($where,'tbl_siswa');
    redirect('admin/siswa');
  }

  public function get_biaya(){
    $kode=$this->input->post('kode');
    $data=$this->m_siswa->get_biaia($kode);
    echo json_encode($data);
  }

  public function updateFoto(){
    $post = $this->input->post();
  }

    private function _uploadImage()
{
    $config['upload_path']          = './images /upload/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->profile_id;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }

    return "default.jpg";


    if(!empty($FILES["image"]["name"])){
      $this->foto=$this->_uploadImage();
    } else {
      $this->foto = $post["default.jpg"];
    }

    $data = array(
      'foto' => $poto,
    );

    $where = array(
      'id_siswa' => $id_sis
    );

    $this->m_siswa->update_siswa($where, $data, 'tbl_siswa');
    redirect('admin/siswa/detail/'.encrypt_url($id));
  }


}
?>
