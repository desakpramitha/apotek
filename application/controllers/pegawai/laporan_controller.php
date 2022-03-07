<?php

class Laporan_controller extends CI_Controller{
    public function __construct()
	{
        parent::__construct();
        $this->load->model("Auth");
		if($this->Auth->cek_login()) redirect(site_url('login'));
	}

    public function index(){
        $data['laporan'] = $this->transaksi_model->tampil_data();
        $data['total_transaksi'] = $this->transaksi_model->hitungTransaksi();
        $data['total_obat'] = $this->obat_model->hitungObat();
        $data['total_supplier'] = $this->supplier_model->hitungSupplier();
        $data['total_pembeli'] = $this->pembeli_model->hitungPembeli();
        $data['total_pegawai'] = $this->pegawai_model->hitungPegawai();

        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/laporan', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function data_transaksi(){
        $data['laporan'] = $this->transaksi_model->tampil_data();
        $data['total_transaksi'] = $this->transaksi_model->hitungTransaksi();
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/laporan_transaksi', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function data_obat(){
        $data['laporan'] = $this->obat_model->tampil_data()->result();
        $data['total_obat'] = $this->obat_model->hitungObat();
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/laporan_obat', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function data_pegawai(){
        $data['laporan'] = $this->pegawai_model->tampil_data()->result();
        $data['total_pegawai'] = $this->pegawai_model->hitungPegawai();
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/laporan_pegawai', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function data_supplier(){
        $data['laporan'] = $this->supplier_model->tampil_data()->result();
        $data['total_supplier'] = $this->supplier_model->hitungSupplier();
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/laporan_supplier', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function data_pembeli(){
        $data['laporan'] = $this->pembeli_model->tampil_data()->result();
        $data['total_pembeli'] = $this->pembeli_model->hitungPembeli();
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/laporan_pembeli', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function detail_laporan($id_transaksi){
        $data['laporan'] = $this->transaksi_model->get_id_transaksi($id_transaksi);
        $data['pesanan'] = $this->transaksi_model->get_id_pesanan($id_transaksi);
       // $data['pembeli'] = $this->transaksi_model->get_id_pembeli($id_pembeli)

        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/detail_laporan', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function print_detail_pesanan($id_transaksi){
        $data['laporan'] = $this->transaksi_model->get_id_transaksi($id_transaksi);
        $data['pesanan'] = $this->transaksi_model->get_id_pesanan($id_transaksi);
    
        $this->load->view('pegawai/print_detail_pesanan', $data);
    }


}
?>