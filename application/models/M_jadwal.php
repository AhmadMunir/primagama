  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jadwal extends CI_Model {

	public function viewJadwal(){
		return $this->db->get('tbl_request_jadwal')->result(); // Tampilkan semua data yang ada di tabel provinsi
	}

	public function viewByJadwal($id_jadwal){
		$this->db->where('id_jadwal', $id_jadwal);
		$result = $this->db->get('jadwal')->result(); // Tampilkan semua data kota berdasarkan id provinsi

		return $result;
	}

	public function request_jadwal($data,$table){
		$this->db->insert($table,$data);
	}

	public function getjadwal(){
		return $this->db->get('view_jadwal');
	}
}
