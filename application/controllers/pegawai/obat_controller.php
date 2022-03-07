<?php
    class Obat_controller extends CI_Controller{

        public function index(){
            $data['id_supplier'] = $this->obat_model->tampil_data_supplier()->result();
            $data['obat'] = $this->obat_model->tampil_data()->result();
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/data_obat', $data);
            $this->load->view('template_pegawai/footer');
        }

        public function insert_obat(){
            $nama_obat      = $this->input->post('nama_obat');
            $manfaat        = $this->input->post('manfaat');
            $kategori       = $this->input->post('kategori');
            $konsumen       = $this->input->post('konsumen');
            $stock          = $this->input->post('stock');
            $harga_obat     = $this->input->post('harga_obat');
            $gambar         = $_FILES['gambar']['name'];
            $id_supplier    = $this->input->post('id_supplier');
            
            if ($gambar = ''){}
            else
            {
                $config['upload_path'] = './uploads';
                $config['allowed_types']   = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('gambar')){
                    echo "Gambar gagal di upload";
                }else{
                    $gambar = $this->upload->data('file_name');
                }

                $data = array(
                'nama_obat'     => $nama_obat,
                'manfaat'       => $manfaat,
                'kategori'      => $kategori,
                'konsumen'      => $konsumen,
                'stock'         => $stock,
                'harga_obat'    => $harga_obat,
                'gambar'        => $gambar,
                'id_supplier'   => $id_supplier
                );

                
                $this->obat_model->insert_obat($data, 'obat');
                redirect('pegawai/obat_controller/index');

            }
        }

        public function edit($id_obat){
            $data['id_supplier'] = $this->obat_model->tampil_data_supplier()->result();
            $where = array('id_obat' => $id_obat);
            $data['obat'] = $this->obat_model->edit_obat($where, 'obat')->result();
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('template_pegawai/footer');
            $this->load->view('pegawai/edit_obat', $data);
        }

        public function update(){
            $id_obat        = $this->input->post('id_obat');
            $nama_obat      = $this->input->post('nama_obat');
            $manfaat        = $this->input->post('manfaat');
            $kategori       = $this->input->post('kategori');
            $konsumen       = $this->input->post('konsumen');
            $stock          = $this->input->post('stock');
            $harga_obat     = $this->input->post('harga_obat');
            $id_supplier    = $this->input->post('id_supplier');

            $data = array(
                
                'nama_obat'     => $nama_obat,
                'manfaat'       => $manfaat,
                'kategori'      => $kategori,
                'konsumen'      => $konsumen,
                'stock'         => $stock,
                'harga_obat'    => $harga_obat,
                'id_supplier'   => $id_supplier
            );

            // if($this->input->post('gambar') != null){
            //     $gambar = $this->input->post('gambar');
            // }

            $where = array('id_obat' => $id_obat);

            $this->obat_model->update_data($where,$data,'obat');
            redirect('pegawai/obat_controller/index');
        }

        public function delete_obat($id_obat){

            $where = array('id_obat' => $id_obat);
            $this->obat_model->delete_obat($where, 'obat');
            redirect('pegawai/obat_controller/index');
        }

        public function view_obat($id_obat){
            $data['obat'] = $this->obat_model->view_obat($id_obat);
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/view_obat', $data);
            $this->load->view('template_pegawai/footer');
        }

        public function tampilSupplier(){
            $data['id_supplier'] = $this->supplier_model->tampil_data_supplier()->result();
            $this->template->display('obat_controller', $data);
        }

        // public function join($table_name = 'supplier', $type = 'left')
	    // {
		//     $this->db->join($table_name, "$this->table_name.id_$table_name = $table_name.id", $type);
		//     return $this;
        // }
        
        public function print_obat(){
            $data['total_obat'] = $this->obat_model->hitungObat();
            $data['obat'] = $this->obat_model->tampil_data('obat')->result();
            $this->load->view('pegawai/print_obat', $data);
        }

        
        public function search(){
            $keyword = $this->input->post('keyword');
            $config['base_url']     = site_url('pegawai/obat_controller/index');
            $config['total_rows']   = $this->db->count_all('obat');
            $config['per_page']     = 2;
            $config['uri_segment']  = 3;
            $choice                 = $config["total_rows"] / $config['per_page'];
            $config["num_links"]    = floor($choice);

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


            $data['obat'] = $this->obat_model->tampil_data()->result();
            $data['pagination'] = $this->pagination->create_links();
            $data['obat'] = $this->obat_model->get_keyword($keyword);
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/data_obat', $data);
            $this->load->view('template_pegawai/footer');
        }
    }
?>