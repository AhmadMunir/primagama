<?php
  class Pembayaran extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_pembayaran');
      $this->load->library('PdfGenerator');

      if($this->session->userdata('status') != "login")
        redirect(base_url("login"));
    }

    public function index(){
      $data['view_angsuran'] = $this->m_pembayaran->getPembayaran()->result();
      $this->load->view('admin/pembayaran/rekap', $data);
    }

    public function input(){
      $data['kode'] = $this->m_pembayaran->kode();

      $this->load->view('admin/pembayaran/input', $data);
    }

    public function get_dtl(){
  		$kode=$this->input->post('kode');
  		$data=$this->m_pembayaran->get_data_barang_bykode($kode);
  		echo json_encode($data);
  	}

    public function tambah_bayar(){
      $id = $this->input->post('id');
      $id_sis = $this->input->post('id_sis');
      $jml = $this->input->post('jml');
      $sisa = $this->input->post('sisaL');
      $admin = $this->session->id;

      $data = array(
        'id_pembayaran' => $id,
        'id_siswa' => $id_sis,
        'jumlah_bayar' => $jml,
        'sisa_tagihan' => $sisa,
        'id_admin' => $admin
      );

      $this->m_pembayaran->input($data, 'tbl_pembayaran');
      $this->session->set_flashdata('successbayar', 'Pembayaran Berhasil, Silahkan Cek Tab Angsuran!');
      redirect('admin/siswa/detail/'.encrypt_url($id_sis));
    }
    public function pdf()
  {
    $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string
        $pdf->Cell(280,7,'REKAP TAGIHAN PESERTA DIDIK',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(280,7,'PRIMAGAMA BONDOWOSO',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(35,6,'ID Pembayaran',1,0);
        $pdf->Cell(50,6,'WAKTU PEMBAYARAN',1,0);
        $pdf->Cell(45,6,'NAMA SISWA',1,0);
        $pdf->Cell(22,6,'KELAS',1,0);
        $pdf->Cell(45,6,'NAMA PROGRAM',1,0);
        $pdf->Cell(40,6,'JUMLAH BAYAR',1,0);
        $pdf->Cell(40,6,'SISA TAGIHAN',1,1);
        $pdf->SetFont('Arial','',10);
        $mahasiswa = $this->db->get('view_angsuran')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(35,6,$row->id_pembayaran,1,0);
            $pdf->Cell(50,6,$row->waktu,1,0);
            $pdf->Cell(45,6,$row->nama_lengkap,1,0);
            $pdf->Cell(22,6,$row->kelas,1,0);
            $pdf->Cell(45,6,$row->nama_program,1,0);
            $pdf->Cell(40,6,$row->jumlah_bayar,1,0);
            $pdf->Cell(40,6,$row->sisa_tagihan,1,1);

        }
        $pdf->Output();
  }

   public function bayarbyid($id_bayar)
  {
    $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string
        $pdf->Cell(280,7,'BUKTI PEMBAYARAN PESERTA DIDIK',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(280,7,'PRIMAGAMA BONDOWOSO',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(35,6,'ID Pembayaran',1,0);
        $pdf->Cell(50,6,'WAKTU PEMBAYARAN',1,0);
        $pdf->Cell(45,6,'NAMA SISWA',1,0);
        $pdf->Cell(22,6,'KELAS',1,0);
        $pdf->Cell(45,6,'NAMA PROGRAM',1,0);
        $pdf->Cell(40,6,'JUMLAH BAYAR',1,0);
        $pdf->Cell(40,6,'SISA TAGIHAN',1,1);
        $pdf->SetFont('Arial','',10);
        $where = array('id_pembayaran' => $id_bayar);
        $mahasiswa = $this->db->get_where( 'view_angsuran', $where)->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(35,6,$row->id_pembayaran,1,0);
            $pdf->Cell(50,6,$row->waktu,1,0);
            $pdf->Cell(45,6,$row->nama_lengkap,1,0);
            $pdf->Cell(22,6,$row->kelas,1,0);
            $pdf->Cell(45,6,$row->nama_program,1,0);
            $pdf->Cell(40,6,$row->jumlah_bayar,1,0);
            $pdf->Cell(40,6,$row->sisa_tagihan,1,1);
        }
        $pdf->Output();
  }

  public function bayarbysiswa($id_siswa)
  {
    $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string
        $pdf->Cell(280,7,'REKAP PEMBAYARAN PESERTA DIDIK',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(280,7,'PRIMAGAMA BONDOWOSO',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(35,6,'ID Pembayaran',1,0);
        $pdf->Cell(50,6,'WAKTU PEMBAYARAN',1,0);
        $pdf->Cell(45,6,'NAMA SISWA',1,0);
        $pdf->Cell(22,6,'KELAS',1,0);
        $pdf->Cell(45,6,'NAMA PROGRAM',1,0);
        $pdf->Cell(40,6,'JUMLAH BAYAR',1,0);
        $pdf->Cell(40,6,'SISA TAGIHAN',1,1);
        $pdf->SetFont('Arial','',10);
        $where = array('id_siswa' => $id_siswa);
        $mahasiswa = $this->db->get_where( 'view_angsuran', $where)->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(35,6,$row->id_pembayaran,1,0);
            $pdf->Cell(50,6,$row->waktu,1,0);
            $pdf->Cell(45,6,$row->nama_lengkap,1,0);
            $pdf->Cell(22,6,$row->kelas,1,0);
            $pdf->Cell(45,6,$row->nama_program,1,0);
            $pdf->Cell(40,6,$row->jumlah_bayar,1,0);
            $pdf->Cell(40,6,$row->sisa_tagihan,1,1);
        }
        $pdf->Output();
  }

  }
 ?>
