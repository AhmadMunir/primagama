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
	public function viewsekolahByJenjang($id_jenjang){
		$this->db->where('id_jenjang', $id_jenjang);
		$result = $this->db->get('tbl_sekolah')->result(); // Tampilkan semua data kota berdasarkan id provinsi
		return $result;
	}



	public function viewprogram(){
			return $this->db->get('tbl_program')->result();
	}

	public function input_siswa($data,$table){
		$this->db->insert($table,$data);
	}

	public function getSiswa(){
		return $this->db->get('view_siswa_detail');
	}

	public function lht($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function update_siswa($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);

	}

	public function update_kls($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);

	}

	public function kode(){
		$this->db->select('Right(tbl_siswa.id_siswa,8) as kode',false);
		$this->db->order_by('id_siswa', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('tbl_siswa');
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

	public function delete($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
	}

	public function get_kelas(){
		return $this->db->get('tbl_kelas');
	}

	public function get_angsuran($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function get_biaia($kode){
		$hsl=$this->db->query("call get_biaya('".$kode."')");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'biaya' => $data->biaya,
					);
			}
		}
		return $hasil;
	}

	public function getSiswaDetail($where){
		$this->db->where('username', $where);
		return $this->db->get('view_siswa_detail');
	}

	public function getSiswaDetailid($where){
		$this->db->where('id_siswa', $where);
		return $this->db->get('view_siswa_detail');
	}

	public function getSiswaDetailortu($where){
		$this->db->where('id_ortu', $where);
		return $this->db->get('view_siswa_detail');
	}
}
