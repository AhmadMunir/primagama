<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_apimodel extends CI_Model {


	public function __construct()
	{
		parent::__construct();

	}

    function Getuser($where, $tbl) {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where($where);
        $data=$this->db->get();
        return $data;
    }





}
?>
