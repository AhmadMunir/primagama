<?php
  class Absen extends CI_Controller{
    private $filename = "import_absen";

    public function __construct(){
      parent::__construct();
      $this->load->model('m_absen');
    }

    public function index(){
      echo "string";
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
