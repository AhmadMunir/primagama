<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_siswa extends CI_Model {

	public function viewJenjang(){
		return $this->db->get('jenjang')->result(); // Tampilkan semua data yang ada di tabel provinsi
	}

	public function viewByJenjang($id_jenjang){
		$this->db->where('id_jenjang', $id_jenjang);
		$result = $this->db->get('kelas')->result(); // Tampilkan semua data kota berdasarkan id provinsi

		return $result;
	}

	public function input_siswa($data,$table){
		$this->db->insert($table,$data);
	}

	public function getSiswa(){
		return $this->db->get('view_siswa');
	}
}
