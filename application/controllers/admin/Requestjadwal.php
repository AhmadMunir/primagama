<?php
  class Requestjadwal extends CI_Controller{
    public function __construct(){
      parent::__construct();


      $this->load->model('M_siswa');
      $this->load->model('m_reqjadwal');
      $this->load->model('m_jadwal_tetap');

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

   //  public function index(){
   //    $data['requestjadwal'] = $this->M_jadwal->viewJadwal();
   //      $data['jenjang'] = $this->m_siswa->viewJenjang();
   //
   //
   //    $this->load->view('admin/requestjadwal/requestjadwal', $data);
   // }

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


    public function jadwal(){

      $mpl = $this->input->post('mapel');
      $tgl = $this->input->post('tanggal');
      $kelas = $this->input->post('kelas');


      $data = array(

        'mapel' => $mpl,
        'tanggal' => $tgl,
        'id_grade' => $kelas,

      );
      $this->M_jadwal->request_jadwal($data,'tbl_request_jadwal');
      redirect('admin/jadwal');
    }

    public function index(){
      $data['req'] = $this->m_reqjadwal->getreq()->result();
      $this->load->view('admin/requestjadwal/requestjadwal',$data);
    }
    public function buatkelas($mapel){
      $data['mapel'] = $mapel;
      $data['tentor'] = $this->m_jadwal_tetap->viewTentor();
      $data['ruang'] = $this->m_jadwal_tetap->viewruang();
      $this->load->view('admin/requestjadwal/buat_jadwal', $data);
    }

    public function buatreqkelas(){
      $mapel = $this->input->post('mapel');
      $jam = $this->input->post('jam');
      $tanggal =  $this->input->post('tanggal');
      $tentor = $this->input->post('tentor');
      $ruang = $this->input->post('ruang');

      $data = array(
        'id_mapel' => $mapel,
        'jam' => $jam,
        'id_ruang' => $ruang,
        'tanggal' => $tanggal,
        'id_tentor' =>$tentor
      );

      $this->m_jadwal_tetap->input_jadwal($data, 'tbl_kelas_reqjadwal');
      redirect('admin/requestjadwal');
    }
  }
 ?>
