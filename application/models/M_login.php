<?php
  class M_login extends CI_Model{
    public function cek_admin($table, $where){
      return $this->db->get_where($table,$where);
    }

    public function getId($username){
      return $this->db->query("SELECT id_admin FROM lgn_admin WHERE username = '$username'");
    }

    public function cek_siswa($table, $where){
      return $this->db->get_where($table,$where);
    }

    public function getSiswa($username){
      $siswa=$this->db->query("SELECT id_siswa FROM view_siswa_detail WHERE username = '$username'");

      return $siswa;
    }

    
  }
 ?>
