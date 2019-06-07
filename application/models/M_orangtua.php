<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class M_orangtua extends CI_Model{
    public function update_ortu($where, $data, $table){
      $this->db->where($where);
      $this->db->update($table, $data);
    }

    public function lht($where, $table){
  		return $this->db->get_where($table, $where);
  	}
  }
?>
