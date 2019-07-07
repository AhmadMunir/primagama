<?php
  class M_login extends CI_Model{
    public function cek_user($table, $where){
      return $this->db->get_where($table,$where);
    }

    public function getId($username){
      $this->db->where('id_admin', $username);
      return $this->db->get('tbl_admin');
    }

    public function cek_siswa($table, $where){
      return $this->db->get_where($table,$where);
    }

    public function getSiswa($username){
      $siswa=$this->db->query("SELECT id_siswa FROM view_siswa_detail WHERE username = '$username'");

      return $siswa;
    }

 public function cek_tentor($table, $where){
      return $this->db->get_where($table,$where);
    }

    public function getTentor($username){
      $tentor=$this->db->query("SELECT id_tentor FROM view_tntr_dtl WHERE username = '$username'");

      return $tentor;
    }

public function cek_ortu($table, $where){
      return $this->db->get_where($table,$where);
    }

    public function getOrtu($username){
      $tentor=$this->db->query("SELECT id_siswa FROM view_ortu WHERE username = '$username'");

      return $tentor;
    }

  }
 ?>
