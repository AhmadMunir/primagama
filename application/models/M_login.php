<?php
  class M_login extends CI_Model{
    public function cek_admin($table, $where){
      return $this->db->get_where($table,$where);
    }
  }
 ?>
