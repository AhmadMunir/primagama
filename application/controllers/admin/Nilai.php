<?php
class Nilai extends CI_Controller{
  private $filename = "import_data";

  public function __construct(){
    parent::__construct();

    $this->load->model('m_nilai');
    $this->load->model('m_jadwal_tetap');
  }

  public function index(){

    $data['siswa'] = $this->m_nilai->view();
    $this->load->view('admin/nilai/index.php', $data);
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
