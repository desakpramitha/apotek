<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class transaksi_model extends CI_Model {
	public function index(){
		date_default_timezone_set('Asia/Ujung_Pandang');
		$id_pegawai		= $this->input->post('id_pegawai');
		$nama_pembeli	= $this->input->post('nama_pembeli');
		$alamat_pembeli = $this->input->post('alamat_pembeli');
		$status			= $this->input->post('status');

		$pembeli = array(
			'nama_pembeli'		=> $nama_pembeli,
			'alamat_pembeli'	=> $alamat_pembeli
		);
		$this->db->insert('pembeli', $pembeli);
		
		$id_pembeli = $this->db->insert_id();
		$transaksi = array(
			'id_pembeli'		=> $id_pembeli,
			'id_pegawai'		=> $id_pegawai,
			'nama_pembeli'		=> $nama_pembeli,
			'alamat_pembeli'	=> $alamat_pembeli,
			'tgl'				=> date('Y-m-d H:i:s'),
			'status'			=> $status	
		);

		$this->db->insert('transaksi', $transaksi);
		
		$id_transaksi = $this->db->insert_id();

		foreach ($this->cart->contents() as $items){
			$data = array(
					'id_transaksi'	=> $id_transaksi,
					'id_obat'		=> $items['id'],
					'gambar'		=> $items['gambar'],
					'nama_obat'		=> $items['name'],
					'jumlah'		=> $items['qty'],
					'harga'			=> $items['price']
			);

			$this->db->insert('detail_transaksi', $data);
		}
		return TRUE;
	}

	public function tampil_data(){
		$result = $this->db->get('transaksi');

		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}

	public function get_id_transaksi($id_transaksi){
		$result = $this->db->where('id_transaksi', $id_transaksi)->limit(1)->get('transaksi');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return FALSE;
		}
	}

	public function get_id_pesanan($id_transaksi){
		$result = $this->db->where('id_transaksi', $id_transaksi)->get('detail_transaksi');

		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	}
	
	/* public function get_id_pembeli($id_pembeli){
		$this->db->select('*');
		$this->db->from('pembeli');
		$this->db->join('transaksi', 'pembeli.id_pembeli = transaksi.id_pembeli', 'inner');
		$this->db->where('id_pembeli', $id_pembeli);
		$result = $this->db->get('pembeli');

		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return FALSE;
		}
	} */

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->like('id_transaksi', $keyword);
		$this->db->or_like('id_pegawai', $keyword);
		$this->db->or_like('id_pembeli', $keyword);
		$this->db->or_like('nama_pembeli', $keyword);
		$this->db->or_like('alamat_pembeli', $keyword);
		$this->db->or_like('status', $keyword);
		$this->db->or_like('tgl', $keyword);
		return $this->db->get()->result();

	}

	public function count_all(){
		return $this->db->count_all('transaksi');
	}
	
	public function hitungTransaksi(){
		$query = $this->db->get('transaksi');
		return ($query->num_rows() > 0) ? $query->num_rows() : 0;
	}

}
?>