<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class M_pembayaran extends CI_Model{

    public function kode(){
      $this->db->select('Right(tbl_pembayaran.id_pembayaran, 9) as kode', false);
      $this->db->order_by('id_pembayaran', 'desc');
      $this->db->limit(1);

      $query = $this->db->get('tbl_pembayaran');
      if ($query->num_rows()<>0) {
        $data = $query->row();
        $kode = intval($data->kode+1);
      }else {
        $kode = 1;
      }

      $kodemax = str_pad($kode, 9, "0", STR_PAD_LEFT);
      $kodejadi = "P".$kodemax;
      return $kodejadi;
    }

    public function get_tghterahir($id){
      $query = "call get_tghterahir(?)";
      $data = array('id' => $id);
      $result = $this->db->query($query, $data);
      return $result;
    }

    public function get_data_barang_bykode($kode){
  		$hsl=$this->db->query("call get_tghterahir('".$kode."')");
  		if($hsl->num_rows()>0){
  			foreach ($hsl->result() as $data) {
  				$hasil=array(
  					'id_siswa' => $data->id_siswa,
  					'nama_lengkap' => $data->nama_lengkap,
  					'kelas' => $data->kelas,
  					'nama_program' => $data->nama_program,
            'sisa_tagihan' => $data->sisa_tagihan,
  					);
  			}
  		}
  		return $hasil;
  	}

    public function input($data, $table){
      $this->db->insert($table, $data);
    }
  }
?>
