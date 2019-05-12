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

	public function update()
    {
        $post = $this->input->post();
        $this->id_siswa = $post["id"];
        $this->nama_lengkap = $post["nl"];
        $this->sekolah = $post["skl"];
        $this->kelas = $post["kls"];
        $this->nama_program = $post["np"];
        $this->db->update($this->_table, $this, array('id_siswa' => $post['id']));

    }
	public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_siswa" => $id));
    }
}
