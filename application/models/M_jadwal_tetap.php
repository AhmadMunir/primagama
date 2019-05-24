  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jadwal_tetap extends CI_Model {

	public function viewJadwal(){
		return $this->db->get('tbl_jadwal')->result(); // Tampilkan semua data yang ada di tabel provinsi
	}

	public function viewByJadwal($id_jadwal){
		$this->db->where('id_jadwal', $id_jadwal);
		$result = $this->db->get('jadwal_tetap')->result(); // Tampilkan semua data kota berdasarkan id provinsi

		return $result;
	}
  public function viewMapel(){
			return $this->db->get('tbl_mapel')->result();
	}
  public function viewTentor(){
			return $this->db->get('tbl_tentor')->result();  // Tampilkan semua data yang ada di tabel provinsi
	}

  public function viewKelas(){
			return $this->db->get('tbl_kelas')->result();  // Tampilkan semua data yang ada di tabel provinsi
	}
	public function input_jadwal($data,$table){
		$this->db->insert($table,$data);
	}
	public function viewruang(){
			return $this->db->get('tbl_ruang')->result();
	}


	public function getjadwal(){
		return $this->db->get('tbl_jadwal');
	}
	public function kode(){
		$this->db->select('Right(tbl_jadwal.id_jadwal,8) as kode',false);
		$this->db->order_by('id_jadwal');
		$this->db->limit(1);
		$query = $this->db->get('tbl_jadwal');
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else {
			$kode = 1;
		}
		$kodemax = str_pad($kode, 8, "0", STR_PAD_LEFT);
		$kodejadi = "017820845".$kodemax;
		return $kodejadi;
	}
}
