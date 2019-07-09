<?php
  class Absen extends CI_Controller{
    private $filename = "import_absen";

    public function __construct(){
      parent::__construct();
      $this->load->model('m_absen');

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
      $data['kelas'] = $this->m_absen->get_kelas();
      $this->load->view('admin/absen/index', $data);
    }

    public function detail($kls = null){
      if (!isset($kls)) redirect('admin/absen');

      $where = array('id_kelas' => $kls);
      $data['isi'] = $this->m_absen->get_isiabsen($where);
      $this->load->view('admin/absen/isi_absen', $data);
    }

    public function search(){
      $keyword = $this->input->post('keyword');
      $kelas = $this->m_absen->search($keyword);

      $hasil = $this->load->view('admin/absen/search', array('kelas'=>$kelas), true);

      $callback = array(
        'hasil' => $hasil,
      );

      echo json_encode($callback);
    }

    public function input(){
      $data = array();
      if(isset($_POST['preview'])){
        $upload = $this->m_absen->upload_file($this->filename);

        if ($upload['result'] == "success") {
          include APPPATH.'third_party/PHPExcel/PHPExcel.php';

          $excelreader = new PHPExcel_Reader_Excel2007();
          $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');

          $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

          $data['sheet'] = $sheet;
        }else {
          $data['upload_error'] = $upload['error'];
        }
      }


      $this->load->view('admin/absen/input', $data);
    }

    public function import(){
      $tgl = $this->input->post('tgl');

      include APPPATH.'third_party/PHPExcel/PHPExcel.php';

      $excelreader = new PHPExcel_Reader_Excel2007();
      $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');
      $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

      $data = array();

      $numrow = 1;
      foreach ($sheet as $row) {
        if ($numrow > 1) {
          array_push($data, array(
            'id_siswa' => $row['B'],
            'jam_datang' => $row['D'],
            'jam_pulang' => $row['E'],
            'keterangan' => $row['F'],
            'tgl' => $tgl,
          ));
        }
        $numrow++;
      }
      $this->m_absen->insert_multiple($data);
      redirect('admin/absen/input');
    }
  }
 ?>
