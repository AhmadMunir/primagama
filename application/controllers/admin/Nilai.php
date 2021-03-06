<?php
class Nilai extends CI_Controller{
  private $filename = "import_data";

  public function __construct(){
    parent::__construct();

    $this->load->model('m_nilai');
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

   public function index(){
      $data['kelas'] = $this->m_nilai->get_kelas();
      $this->load->view('admin/nilai/index', $data);
    }

    public function detail($kls = null){
      if (!isset($kls)) redirect('admin/nilai');

      $where = array('id_kelas' => $kls);
      $data['isi'] = $this->m_nilai->get_isinilai($where);
      $this->load->view('admin/nilai/isi_nilai', $data);
    }

    public function search(){
      $keyword = $this->input->post('keyword');
      $kelas = $this->m_nilai->search($keyword);

      $hasil = $this->load->view('admin/nilai/search', array('kelas'=>$kelas), true);

      $callback = array(
        'hasil' => $hasil,
      );

      echo json_encode($callback);
    }

  public function form(){

    $data = array();
    if(isset($_POST['preview'])){
      $upload = $this->m_nilai->upload_file($this->filename);

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

    $data['mapel'] = $this->m_jadwal_tetap->viewMapel();
    $this->load->view('admin/nilai/input', $data);
  }

  public function import(){
    $mpl = $this->input->post('mapel');
    $to = $this->input->post('to');
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

    if ($to == 1) {
      $data = array();

      $numrow = 1;
      foreach ($sheet as $row) {
        if ($numrow > 1) {
          array_push($data, array(
            'id' => null,
            'id_siswa' => $row['B'],
            'to1' => $row['D'],
            'id_mapel' => $mpl,
          ));
        }

        $numrow++;
      }
      $this->m_nilai->insert_multiple($data);
    }elseif ($to == 2) {
      $data = array();

      $numrow = 1;
      foreach ($sheet as $row) {
        if ($numrow > 1) {
          $id = $row['B'];
          $to2 = $row['D'];
          $idm = $mpl;
          $this->m_nilai->insert_to2($id, $idm, $to2);
        }


        $numrow++;
      }
    }elseif ($to == 3) {
      $data = array();

      $numrow = 1;
      foreach ($sheet as $row) {
        if ($numrow > 1) {
          $id = $row['B'];
          $to3 = $row['D'];
          $idm = $mpl;
          $this->m_nilai->insert_to3($id, $idm, $to3);
        }
        $numrow++;
      }
    } elseif ($to == 4) {
      $data = array();

      $numrow = 1;
      foreach ($sheet as $row) {
        if ($numrow > 1) {
          $id = $row['B'];
          $to4 = $row['D'];
          $idm = $mpl;
          $this->m_nilai->insert_to4($id, $idm, $to4);
        }
        $numrow++;
      }
    } elseif ($to == 5) {
      $data = array();

      $numrow = 1;
      foreach ($sheet as $row) {
        if ($numrow > 1) {
          $id = $row['B'];
          $to5 = $row['D'];
          $idm = $mpl;
          $this->m_nilai->insert_to5($id, $idm, $to5);
        }
        $numrow++;
      }
    } else {
      // code...
    }

    redirect('admin/nilai/form');
  }
}
 ?>
