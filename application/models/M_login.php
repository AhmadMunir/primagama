<?php
  class M_login extends CI_Model{
    public function cek_admin($table, $where){
      return $this->db->get_where($table,$where);
    }

    public function getId($username){
      $hasil=$this->db->query("SELECT id_admin FROM lgn_admin WHERE username = '$username'");

      return $hasil;
    }
  }
 ?>
