<?php

class pegawai_model extends CI_Model {
	
	public function index(){
		return $this->db->get('pegawai');
	}

	public function tampil_data(){
		return $this->db->get('pegawai');
	}
	
	public function insert_pegawai($data, $table){
		$this->db->insert($table, $data);
	}

	public function edit_pegawai($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data){
		$this->db->where('id_pegawai', $where);
		$this->db->update('pegawai', $data);
	}

	public function delete_pegawai($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function view_pegawai($id_pegawai){
		$result = $this->db->where('id_pegawai', $id_pegawai)
						->get('pegawai');
		
		if($result->num_rows() > 0){
			return $result->result();
		}
		else{
			return FALSE;
		}

	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->like('id_pegawai', $keyword);
		$this->db->or_like('nama_pegawai', $keyword);
		$this->db->or_like('email', $keyword);
		$this->db->or_like('username', $keyword);
		$this->db->or_like('password', $keyword);
		return $this->db->get()->result();

	}

	function count_all(){
		return $this->db->count_all('pegawai');
	}

	public function hitungPegawai(){
		$query = $this->db->get('pegawai');
		return ($query->num_rows() > 0) ? $query->num_rows() : 0;
	}
}