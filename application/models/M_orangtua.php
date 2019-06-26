<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class M_orangtua extends CI_Model{
    public function update_ortu($where, $data, $table){
      $this->db->where($where);
      $this->db->update($table, $data);
    }

    public function lht($where, $table){
  		return $this->db->get_where($table, $where);
  	}

  	public function getOrtuDetail($where){
    $this->db->where('username', $where);
    return $this->db->get('view_siswa_detail');
  }

  public function getSiswaDetailid($where){
    $this->db->where('id_siswa', $where);
    return $this->db->get('view_siswa_dtl');
  }

  public function getOrtu(){
    return $this->db->get('view_ortu');
  }

  private $_table = "tbl_ortu";

    public function getdata($email){
      return $this->db->get_where($this->_table, ["id_ortu" => $email])->row();
    }

    public function update_foto($table, $data, $where){
      $this->db->update($table, $data, $where);
    }

   
}
  
?>
