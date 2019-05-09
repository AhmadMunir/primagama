<?php defined('BASEPATH') OR exit('No direct script access allowed');
  class M_profile extends CI_Model{
    private $_table = "tbl_admin";

    public function getdata($username){
      return $this->db->get_where($this->_table, ["nama_lengkap" => 'munir'])->row();
    }
  }
?>
