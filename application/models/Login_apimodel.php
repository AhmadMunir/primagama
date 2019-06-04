<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_apimodel extends CI_Model {


	public function __construct()
	{
		parent::__construct();

	}

    function Getuser($where) {
        $this->db->select('*');
        $this->db->from('lgn_siswa');
        $this->db->where($where);
        $data=$this->db->get();
        return $data;
    }





}
?>
