<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class M_absen extends CI_Model{

    public function view(){
      return $this->db->get('tbl_absen')->result();
    }

    public function upload_file($filename){
      $config['upload_path'] = './excel/';
      $config['allowed_types'] = 'xlsx';
      $config['max_size'] = '2048';
      $config['overwrite'] = true;
      $config['file_name'] = $filename;

      $this->upload->initialize($config);
      if($this->upload->do_upload('file')){ //upload & chek
        $return = array('result' => 'success', 'file' =>
        $this->upload->data(), 'error' => '');
        return $return;
      }else {
        $return = array('result' => 'failed', 'file' => '', 'error'=>
      $this->upload->display_errors());
      return $return;
      }
    }

    public function insert_multiple($data){
      $this->db->insert_batch('tbl_absen', $data);
    }

    public function getabsensiswa($id_sis){
      $this->db->where('id_siswa', $id_sis);
      return $this->db->get('tbl_absen');
    }

    public function getAbsenbybulan($id_siswa, $bulan){
      $this->db->where('id_siswa', $id_siswa);
      $this->db->where('MONTH(tgl)', $bulan);
      return $this->db->get('tbl_absen');
    }
  }

 ?>
