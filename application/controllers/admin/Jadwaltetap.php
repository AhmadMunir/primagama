<?php
class Jadwaltetap extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_jadwal_tetap');
    $this->load->helper('url');

    if($this->session->userdata('status') =="login"){
      if ($this->session->userdata('jabatan')!='admin') {
        switch ($this->session->userdata('jabatan')) {
          case 'siswa':
            redirect('siswa/home');
            break;
            case 'ortu':
              redirect('ortu/home');
              break;
              case 'tentor':
                redirect('tentor/home');
                break;
          default:
            // code...
            break;
        }
      }
    }else {

      redirect(base_url("login"));
    }
  }
  public function index(){
    $data['view_jadwal'] = $this->m_jadwal_tetap->getJadwal()->result();
    $data['kelas'] = $this->m_jadwal_tetap->viewKelas();
    $this->load->view('admin/requestjadwal/jadwal_tetap', $data);
  }


 public function input(){
  $data['kodeunik'] = $this->m_jadwal_tetap->kode();
  $data['mapel'] = $this->m_jadwal_tetap->viewMapel();
  $data['tentor'] = $this->m_jadwal_tetap->viewTentor();
  $data['ruang'] = $this->m_jadwal_tetap->viewruang();
  $data['kelas'] = $this->m_jadwal_tetap->viewKelas();

  $this->load->view('admin/requestjadwal/input_jadwal', $data);
  }


  public function tambah_jadwal(){

    $id_jdl = $this->input->post('id_jadwal');
    $mpl = $this->input->post('mapel');
    $hr = $this->input->post('hari');
    $jam = $this->input->post('jam');
    $kelas = $this->input->post('kelas');
    $tentor = $this->input->post('tentor');
    $ruang = $this->input->post('ruang');

    $where = array('hari' => $hr, 'jam' =>$jam, 'id_ruang' =>$ruang);
    $wheree = array('hari' => $hr, 'jam' =>$jam, 'id_kelas' =>$kelas);

    $cek = $this->m_jadwal_tetap->cek($where)->num_rows();
    $cekjadwal = $this->m_jadwal_tetap->cek($where)->result();
    $cek2 = $this->m_jadwal_tetap->cek($wheree)->num_rows();
    $cekjadwal2 = $this->m_jadwal_tetap->cek($wheree)->result();

    if ($cek>0) {
      foreach ($cekjadwal as $key) {
        $mapel =  $key->nama_mapel;
    }
      $this->session->set_flashdata('gagal', 'Jam dan Hari yang terpilih sudah ada kelas un tuk mapel '.$mapel.'. Silahkan pilih ruangan lain atau hari dan jam lain');
      redirect('admin/Jadwaltetap/input');
    }elseif ($cek2>0) {
      foreach ($cekjadwal2 as $key) {
        $mapel =  $key->nama_mapel;
      }
      $this->session->set_flashdata('gagal2', 'Kelas ini pada hari dan Jam tersebut sudah ada jadwal, yaitu '.$mapel.'. Silahkan pilih hari lain dan jam lain');
      redirect('admin/Jadwaltetap/input');
    }else
    {
      $data = array(

        'id_mapel' => $mpl,
        'hari' => $hr,
        'jam' => $jam,
        'id_kelas' => $kelas,
        'id_tentor' => $tentor,
        'id_ruang' => $ruang,

      );
      $this->m_jadwal_tetap->input_jadwal($data,'tbl_jadwal');
      $this->session->set_flashdata('sukses', 'Jadwal Berhasil Di input');
      redirect('admin/Jadwaltetap/input');
    }

  }

  public function cekJadwal(){
    $hari = $this->input->post('hari');
    $jam = $this->input->post('jam');
    $ruang = $this->input->post('ruang');
    $where = array('hari' => $hari, 'jam' =>$jam, 'id_ruang' =>$ruang);

    $cek = $this->m_jadwal_tetap->cek($where)->num_rows();
    $cekjadwal = $this->m_jadwal_tetap->cek($where)->result();
    if ($cek>0) {
      foreach ($cekjadwal as $key) {
        $mapel =  $key->nama_mapel;
    }
    $as = 'Jam dan Hari yang terpilih sudah ada kelas un tuk mapel '.$mapel.'. Silahkan pilih ruangan lain atau hari dan jam lain';
    }else {
      $as = ' ';
      // code...
    }

    $callback = array('response' => $as);
    echo json_encode($callback);
  }

  public function cekJadwalkelas(){
    $hari = $this->input->post('hari');
    $jam = $this->input->post('jam');
    $kelas = $this->input->post('kelas');
    $where = array('hari' => $hari, 'jam' =>$jam, 'id_kelas' =>$kelas);

    $cek = $this->m_jadwal_tetap->cek($where)->num_rows();
    $cekjadwal = $this->m_jadwal_tetap->cek($where)->result();
    if ($cek>0) {
      foreach ($cekjadwal as $key) {
        $mapel =  $key->nama_mapel;
    }
    $asi = 'Kelas ini pada hari dan Jam tersebut sudah ada jadwal, yaitu '.$mapel.'. Silahkan pilih hari lain dan jam lain';
    }else {
      $asi = ' ';
      // code...
    }

    $callback = array('responsee' => $asi);
    echo json_encode($callback);
  }
}



 ?>
