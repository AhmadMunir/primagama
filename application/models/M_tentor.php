<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class M_tentor extends CI_Model{
    public function get_tentor(){
      return $this->db->get('view_tentor');
    }

    public function lht($where, $table){
      return $this->db->get_where($table, $where);
    }

    public function get_mapel(){
      return $this->db->get('tbl_mapel')->result();
    }

    public function input($data, $table){
      $this->db->insert($table, $data);
    }

    public function update_tentor($where, $data, $table){
      $this->db->where($where);
      $this->db->update($table, $data);
    }

    public function delete($where, $table){
      $this->db->where($where);
      $this->db->delete($table);
    }
  }
?>
