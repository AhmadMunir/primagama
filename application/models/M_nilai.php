<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class M_nilai extends CI_Model{
    public function view(){
      return $this->db->get('tbl_nilai')->result(); //ambil data dari tabel
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
      $this->db->insert_batch('tbl_nilai', $data);
    }

    public function insert_to2($id, $idm, $to2){
      //   $where = array('id_siswa', 'id_mapel');
      //   $this->db->where($where);
      // $this->db->update_batch('tbl_nilai', $data, 'title');
      $query  = "call insert_to2(?, ?, ?)";
      $data = array('id' => $id,
                    'idm' => $idm,
                    'nl' => $to2);
      $result = $this->db->query($query, $data);
    }

    public function insert_to3($id, $idm, $to3){
      //   $where = array('id_siswa', 'id_mapel');
      //   $this->db->where($where);
      // $this->db->update_batch('tbl_nilai', $data, 'title');
      $query  = "call insert_to3(?, ?, ?)";
      $data = array('id' => $id,
                    'idm' => $idm,
                    'nl' => $to3);
      $result = $this->db->query($query, $data);
    }

    public function insert_to4($id, $idm, $to4){
      //   $where = array('id_siswa', 'id_mapel');
      //   $this->db->where($where);
      // $this->db->update_batch('tbl_nilai', $data, 'title');
      $query  = "call insert_to4(?, ?, ?)";
      $data = array('id' => $id,
                    'idm' => $idm,
                    'nl' => $to4);
      $result = $this->db->query($query, $data);
    }

    public function insert_to5($id, $idm, $to5){
      //   $where = array('id_siswa', 'id_mapel');
      //   $this->db->where($where);
      // $this->db->update_batch('tbl_nilai', $data, 'title');
      $query  = "call insert_to5(?, ?, ?)";
      $data = array('id' => $id,
                    'idm' => $idm,
                    'nl' => $to5);
      $result = $this->db->query($query, $data);

    }

    public function shownilaisiswa($id_siswa){
      $this->db->where('id_siswa', $id_siswa);
      return $this->db->get('view_nilai_siswa');
    }

    public function chartnilai($id_siswa){

    }
  }

 ?>
