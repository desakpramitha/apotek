<?php
class Transaksi_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth");
        if ($this->Auth->cek_login()) redirect(site_url('login'));
    }

    public function index()
    {
        $data['obat'] = $this->obat_model->tampil_data()->result();
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/transaksi', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function data_transaksi()
    {
        $data['transaksi'] = $this->transaksi_model->tampil_data();
        //$data['total_transaksi'] = $this->transaksi_model->hitungTransaksi();
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/data_transaksi', $data);
        $this->load->view('template_pegawai/footer');
    }

    // untuk button beli di transaksi ambil data obat ke cart
    public function beli($id)
    {

        $obat = $this->obat_model->find($id);

        $data = array(
            'id'      => $obat->id_obat,
            'qty'     => 1,
            'price'   => $obat->harga_obat,
            'name'    => $obat->nama_obat,
            'gambar'  => $obat->gambar
        );

        $this->cart->insert($data);
        redirect('pegawai/transaksi_controller/detail_pesanan');
    }

    //Menampilkan info pembeli & pesanan obat yang dibeli
    public function detail_pesanan()
    {
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/pesanan');
        $this->load->view('template_pegawai/footer');
    }

    public function hapus_cart()
    {
        $this->cart->destroy();
        redirect('pegawai/transaksi_controller/index');
    }

    public function delete($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty'   => 0
        );
        $this->cart->update($data);

        redirect('pegawai/transaksi_controller/detail_pesanan');
    }

    public function ubah_cart()
    {
        $cart_info = $_POST['cart'];
        foreach ($cart_info as $id => $cart) {
            $rowid = $cart['rowid'];
            $name = $cart['name'];
            $price = $cart['price'];
            $gambar = $cart['gambar'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array(
                'rowid' => $rowid,
                'name' => $name,
                'price' => $price,
                'gambar' => $gambar,
                'subtotal' => $amount,
                'qty' => $qty
            );
            $this->cart->update($data);
        }
        redirect('pegawai/transaksi_controller/detail_pesanan');
    }


    //proses pembayean
    public function proses_pembayaran()
    {
        $data['kembali'] = '';
        $data['bayar'] = '';
        $data['status'] = '';
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/proses_pembayaran', $data);
        $this->load->view('template_pegawai/footer');
    }

    // hitung kembalian
    public function hitung()
    {
        if ($this->input->post('kembali') == "") {
            $bayar = $this->input->post('bayar', true);
            $grandtotal = 0;

            if ($pesanan = $this->cart->contents()) {
                foreach ($pesanan as $items) {
                    $grandtotal = $grandtotal + $items['subtotal'];
                }
            }

            $kembalian = $bayar  - $grandtotal;

            $status = "";
            if ($kembalian >= 0) {
                $status = "LUNAS";
            } else {
                $status = "BELUM LUNAS";
            }

            $data['kembali'] = $kembalian;
            $data['bayar'] = $bayar;
            $data['status'] = $status;

            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/proses_pembayaran', $data);
            $this->load->view('template_pegawai/footer');
        } else {
            $is_processed = $this->transaksi_model->index();

            if ($is_processed) {
                $this->cart->destroy();
                $this->load->view('template_pegawai/header');
                $this->load->view('template_pegawai/sidebar');
                $this->load->view('pegawai/proses_pesanan');
                $this->load->view('template_pegawai/footer');
            } else {
                echo "Maaf, pesanan gagal di proses";
            }
        }
    }

    //detail obat di halaman transaksi
    public function detail($id_obat)
    {
        $data['obat'] = $this->obat_model->view_obat($id_obat);
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/detail_obat', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['transaksi'] = $this->transaksi_model->get_keyword($keyword);
        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/data_transaksi', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function print_transaksi()
    {
        $data['total_transaksi'] = $this->transaksi_model->hitungTransaksi();
        $data['transaksi'] = $this->transaksi_model->tampil_data('transaksi');
        $this->load->view('pegawai/print_transaksi', $data);
    }

    public function view_detail_pesanan($id_transaksi)
    {
        $data['laporan'] = $this->transaksi_model->get_id_transaksi($id_transaksi);
        $data['pesanan'] = $this->transaksi_model->get_id_pesanan($id_transaksi);
        // $data['pembeli'] = $this->transaksi_model->get_id_pembeli($id_pembeli)

        $this->load->view('template_pegawai/header');
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/detail_transaksi_obat', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function print_detail_pesanan($id_transaksi)
    {
        $data['laporan'] = $this->transaksi_model->get_id_transaksi($id_transaksi);
        $data['pesanan'] = $this->transaksi_model->get_id_pesanan($id_transaksi);

        $this->load->view('pegawai/print_detail_pesanan', $data);
    }
}
