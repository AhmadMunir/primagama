  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_reqjadwal extends CI_Model {

	public function viewJadwal(){
		return $this->db->get('tbl_request_jadwal')->result(); // Tampilkan semua data yang ada di tabel provinsi
	}

	public function viewByJadwal($id_jadwal){
		$this->db->where('id_jadwal', $id_jadwal);
		$result = $this->db->get('jadwal')->result(); // Tampilkan semua data kota berdasarkan id provinsi

		return $result;
	}

  public function getMapelbyprogram($id_program){
    $this->db->where('id_program', $id_program);
    return $this->db->get('tbl_mapel')->result();
  }

	public function request_jadwal($data,$table){
		$this->db->insert($table,$data);
	}

	public function getjadwal(){
		return $this->db->get('tbl_request_jadwal');
	}

  public function input($table, $data){
    $this->db->insert($table, $data);
  }

  public function getjadwalbyprogram($id_program){
    $this->db->where($id_program);
    return $this->db->get('view_reqjdl_siswa')->result();
  }

  public function cek_request($table, $where){
    return $this->db->get_where($table,$where);
  }

}
