<?php

class supplier_model extends CI_Model {

	private $table = "supplier";
	private $primary_key = "id_supplier";

	public function tampil_data(){
		return $this->db->get('supplier');
	}

	public function insert_supplier($data, $table){
		$this->db->insert($table, $data);
	}

	public function edit_supplier($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data){
		$this->db->where('id_supplier', $where);
		$this->db->update('supplier', $data);
	}

	public function delete_supplier($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function view_supplier($id_supplier){
		$result = $this->db->where('id_supplier', $id_supplier)
						->get('supplier');
		
		if($result->num_rows() > 0){
			return $result->result();
		}
		else{
			return FALSE;
		}

	}

	// public function tampil_data_supplier(){
	// 	return $this->db->get('supplier')->result();
	// }

	public function get_keyword($keyword, $limit, $start){
		$this->db->select('*');
		$this->db->from('supplier');
		$this->db->like('id_supplier', $keyword);
		$this->db->or_like('nama_supplier', $keyword);
		$this->db->or_like('alamat', $keyword);
		return $this->db->get($limit, $start)->result();

	}

	function count_all(){
		return $this->db->count_all('supplier');
	}

	public function hitungSupplier(){
		$query = $this->db->get('supplier');
		return ($query->num_rows() > 0) ? $query->num_rows() : 0;
	}
}

?>