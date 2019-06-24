<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class M_notif extends CI_Model{
    public function getNotif($table){
      $this->db->where('status', '1');
      return $this->db->get($table);
    }
    public function seenNotif($table){
      $data = array('status' => '0');
      $this->db->where('status', '1');
      $this->db->update($table, $data);
    }
  }
 ?>
