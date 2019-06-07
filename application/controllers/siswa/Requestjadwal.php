<?php
  class Requestjadwal extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_siswa');
      $this->load->model('m_reqjadwal');


      if($this->session->userdata('status') != "login")
  			redirect(base_url("login"));
    }

    public function index(){

      $nama = $this->session->nama;
      $where = array(
        'username' => $nama
      );
      $data['siswa'] = $this->m_siswa->lht($where, 'view_siswa')->result();

      $this->load->view('client/siswa/requestjadwal', $data);
   }

   public function listMapel(){
     $id_program = $this->input->post('id_program');

     $mapel = $this->m_reqjadwal->getMapelbyprogram($id_program);

     $lists = "<option value=''>Pilih</option>";

     foreach ($mapel as $data) {
       $lists .= "<option value='".$data->id_mapel."'>".$data->nama_mapel."</option>"; // Tambahkan tag option ke variabel $lists
     }
     $callback = array('list_mapel'=>$lists);

     echo json_encode($callback);
   }

   public function requestjadwal(){
     $id = $this->input->post('id_siswa');
     $mapel = $this->input->post('mapel');
     $grade = $this->input->post('id_grade');
     $tgl = $this->input->post('tanggal');
     $data = array(
       'id_mapel' => $mapel,
       'id_siswa' => $id,
       'id_grade' => $grade,
       'tanggal' => $tgl
     );

     $where = array(
       'id_mapel' => $mapel,
       'id_siswa' => "0"+$id
     );

     $cekreq = $this->m_reqjadwal->cek_request("tbl_request_jadwal", $where)->num_rows();
     if ($cekreq > 0) {
       $this->session->set_flashdata('gagal', 'Kamu sudah request Mapel ini.');
       redirect('siswa/requestjadwal');
     }else {
       $this->m_reqjadwal->input('tbl_request_jadwal', $data);
       $this->session->set_flashdata('success', 'Request terkirim!');
       redirect('siswa/requestjadwal');
     }
   }
   public function showreqjadwalkamu(){
     $id_program = $this->input->post('id_program');
     $were = array(
      'id_program' => $id_program
     );
     $req = $this->m_reqjadwal->getjadwalbyprogram($were);

     $lists = "<tr></tr>";
     $no = 1;
     foreach ($req as $dita) {
       $id_sis = $this->input->post('id_siswa');
       $mapel = $dita->id_mapel;
       $where = array(
         'id_mapel' => $mapel,
         'id_siswa' => "0"+$id_sis
       );
       $cekreq = $this->m_reqjadwal->cek_request("tbl_request_jadwal", $where)->num_rows();
       if ($cekreq > 0) {
        $ko =  "<button type='button' class='btn-danger remove' data-id=".$dita->id_mapel.">Batalkan Request</button>";

      }else {
        $ko = "<a class='ikut' href='#' data-id=".$dita->id_mapel." data-toggle='modal' data-target='#ikutModal'><button class='btn-primary'>Ikut Request</button></a>";
      }
       $lists .= "<tr><td>".$no."</td><td>".$dita->id_mapel."</td><td>".$dita->nama_mapel."</td><td>".$dita->total."</td><td>".$ko."</td></tr>"; // Tambahkan tag option ke variabel $lists
       $no++;
     }
     $callback = array('req'=>$lists);

     echo json_encode($callback);
   }

   public function ikut(){
     $id_mapel = $this->input->post('id_mapel');

     // $hasil = $this->load->view('client/siswa/modal', array('mapel'=>$id_mapel), true);

     $reqs="<modal-body>".$id_mapel."</modal-body>";


     $callback = array(
       'reqs' => $reqs,
     );

     echo json_encode($callback);
   }

  }
 ?>
