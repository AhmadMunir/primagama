<?php defined('BASEPATH') OR exit('No direct script access allowed');
  class M_profile extends CI_Model{
    private $_table = "tbl_admin";

    public function getdata($username){
      return $this->db->get_where($this->_table, ["id_admin" => $username])->row();
    }

    public function update_foto($table, $data, $where){
      $this->db->update($table, $data, $where);
    }

  }
?>
