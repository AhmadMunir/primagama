<?php
  class Profile extends CI_Controller{
    function __construct(){
      parent::__construct();
    }

    function index(){
      $this->load->view('profile/index');
    }

    function contact(){
      $this->load->view('profile/contact');
    }

    public function kirimEmail() {

      $pengirim = $this->input->post('email');

      $pesan = $this->input->post('pesan');
      $nama = $this->input->post('nama');

     redirect('https://api.whatsapp.com/send?phone=6282316285715&text=Saya%20'.$nama.'%20Menghubungi%20Primagama%20Bondowoso%20di%20dikarenakan%20ada%20beberapa%20hal%20yang%20perlu%20di%20sampaikan.%20Yaitu,%20'.$pesan);
    }
  }
 ?>
