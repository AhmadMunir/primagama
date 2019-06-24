<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Notifadmin extends CI_Controller{
    public function __construct(){
      parent::__construct();

      $this->load->model('m_notif');
  }

  public function getNotifReqJadwal(){
    $view = $this->input->post('view');

    if ($view != '') {
      $this->m_notif->seenNotif('notif_req_jadwal');
    }
      $count = $this->m_notif->getNotif('view_notif_reqjadwal')->num_rows();
      $ntf = $this->m_notif->getNotif('view_notif_reqjadwal')->result();
if ($count >0) {
  // code...

      $notif = "<a class='dropdown-item' href=''></a>";
      foreach ($ntf as $key) {
        $notif.= "<a class='dropdown-item' href=''>Request Mapel ".$key->nama_mapel."<br> sudah cukup. Kelas Siap di buat.</a>";
      }
    }else {
      $notif.= "<a class='dropdown-item' href=''>Tidak ada Pemberitahuan</a>";
    }

    $data=array('notif' => $notif, 'unseen' => $count);
    die(json_encode($data));
  }
}
 ?>
