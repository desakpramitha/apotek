<?php

class pembeli_model extends CI_Model {
	
	public function index(){
		return $this->db->get('pembeli');
	}

	public function tampil_data(){
		return $this->db->get('pembeli');
	}
	
	public function insert_pembeli($data, $table){
		$this->db->insert($table, $data);
	}

	public function edit_pembeli($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data){
		$this->db->where('id_pembeli', $where);
		$this->db->update('pembeli', $data);
	}

	public function delete_pembeli($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function view_pembeli($id_pembeli){
		$result = $this->db->where('id_pembeli', $id_pembeli)
						->get('pembeli');
		
		if($result->num_rows() > 0){
			return $result->result();
		}
		else{
			return FALSE;
		}

	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('pembeli');
		$this->db->like('id_pembeli', $keyword);
		$this->db->or_like('nama_pembeli', $keyword);
		$this->db->or_like('alamat_pembeli', $keyword);
		return $this->db->get()->result();

	}

	function count_all(){
		return $this->db->count_all('pembeli');
	}

	public function hitungPembeli(){
		$query = $this->db->get('pembeli');
		return ($query->num_rows() > 0) ? $query->num_rows() : 0;
	}
}