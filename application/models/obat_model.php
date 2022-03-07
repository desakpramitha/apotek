<?php

class Obat_model extends CI_Model {
	
	public function tampil_data(){
		return $this->db->get('obat');
	}

	public function insert_obat($data, $table){
		$this->db->insert($table, $data);
	}

	public function edit_obat($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function delete_obat($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function view_obat($id_obat){
		$result = $this->db->where('id_obat', $id_obat)
						->get('obat');
		
		if($result->num_rows() > 0){
			return $result->result();
		}
		else{
			return FALSE;
		}
	}

	public function find($id){
		$result = $this->db->where('id_obat', $id)
							->limit(1)
							->get('obat');
		if($result->num_rows() > 0){
			return $result->row();
		}
		else{
			return array();
		}
	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->like('id_obat', $keyword);
		$this->db->or_like('nama_obat', $keyword);
		$this->db->or_like('manfaat', $keyword);
		$this->db->or_like('kategori', $keyword);
		$this->db->or_like('konsumen', $keyword);
		$this->db->or_like('stock', $keyword);
		$this->db->or_like('harga_obat', $keyword);
		$this->db->or_like('id_supplier', $keyword);
		return $this->db->get()->result();

	}

	public function tampil_data_supplier(){
		return $this->db->get('supplier');
	}

	function count_all(){
		return $this->db->count_all('obat');
	}

	public function hitungObat(){
		$query = $this->db->get('obat');
		return ($query->num_rows() > 0) ? $query->num_rows() : 0;
	}
}