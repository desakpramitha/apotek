<?php
    class Pembeli_controller extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Auth");
            if($this->Auth->cek_login()) redirect(site_url('login'));
        }

        public function index(){
            $data['pembeli'] = $this->pembeli_model->index()->result();
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/data_pembeli', $data);
            $this->load->view('template_pegawai/footer');
        }

        public function insert_pembeli(){
            $id_pembeli         = $this->input->post('id_pembeli');
            $nama_pembeli       = $this->input->post('nama_pembeli');
            $alamat_pembeli     = $this->input->post('alamat'); 
            
            $data = array(
                'nama_pembeli'      => $nama_pembeli,
                'alamat_pembeli'    => $alamat_pembeli,
                
            );
            $this->pembeli_model->insert_pembeli($id_pembeli,$data);
            redirect('pegawai/pembeli_controller/index');           
        }

        public function edit($id_pembeli){
            $where = array('id_pembeli' => $id_pembeli);
            $data['pembeli'] = $this->pembeli_model->edit_pembeli($where, 'pembeli')->result();
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('template_pegawai/footer');
            $this->load->view('pegawai/edit_pembeli', $data);
        }

        public function update(){
            $id_pembeli         = $this->input->post('id_pembeli');
            $nama_pembeli       = $this->input->post('nama_pembeli');
            $alamat_pembeli     = $this->input->post('alamat_pembeli'); 
            
            $data = array(
                'nama_pembeli'      => $nama_pembeli,
                'alamat_pembeli'    => $alamat_pembeli,
            );

            $this->pembeli_model->update_data($id_pembeli,$data);
            redirect('pegawai/pembeli_controller/index');
        }

        public function delete_pembeli($id_pembeli){

            $where = array('id_pembeli' => $id_pembeli);
            $this->pembeli_model->delete_pembeli($where, 'pembeli');
            redirect('pegawai/pembeli_controller/index');
        }

        public function view_pembeli($id_pembeli){
            $data['pembeli'] = $this->pembeli_model->view_pembeli($id_pembeli);
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/view_pembeli', $data);
            $this->load->view('template_pegawai/footer');
        }

        public function print_pembeli(){
            $data['total_pembeli'] = $this->pembeli_model->hitungPembeli();
            $data['pembeli'] = $this->pembeli_model->tampil_data('pembeli')->result();
            $this->load->view('pegawai/print_pembeli', $data);
        }
        
        public function search(){
            $keyword = $this->input->post('keyword');
            $config['base_url']     = site_url('pegawai/pembeli_controller/index');
            $config['total_rows']   = $this->db->count_all('pembeli');
            $config['per_page']     = 2;
            $config['uri_segment']  = 3;
            $choice                 = $config["total_rows"] / $config['per_page'];
            $config["num_links"]    = floor($choice);

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


            $data['pembeli'] = $this->pembeli_model->tampil_data($config["per_page"], $data['page'])->result();
            $data['pagination'] = $this->pagination->create_links();
            $data['pembeli'] = $this->pembeli_model->get_keyword($keyword);
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/data_pembeli', $data);
            $this->load->view('template_pegawai/footer');
        }
    }
?>