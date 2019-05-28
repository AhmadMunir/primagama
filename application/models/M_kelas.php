<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class M_kelas extends CI_Model{
    public function get_kelas(){
      return $this->db->get('view_kelas')->result();
    }

    public function get_isikls($where){
    return $this->db->get_where('view_siswa_detail', $where)->result();
    }
  }
?>
