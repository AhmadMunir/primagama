<?php
  class Mapel extends CI_Controller{
    function __construct(){
      parent::__construct();

      if($this->session->userdata('status') != "login"){
        redirect(base_url("index.php/login"));
    }
  }

  function index(){

    $this->load->view('admin/mapel/home');
  }
}
 ?>
