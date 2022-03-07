<?php
    class supplier_controller extends CI_Controller{

        private $limit = 3;

        public function __construct()
        {
            parent::__construct();
            $this->load->model("Auth");
            if($this->Auth->cek_login()) redirect(site_url('login'));
        }

        public function index(){
            // // generate pagination
            // $this->load->library('pagination');
            // $config['base_url'] = site_url('pegawai/supplier_controller/index');
            // $config['total_rows'] = $this->supplier_model->count_all();
            // $config['per_page'] = $this->limit;
            // $config['uri_segment'] = 3;
            // $this->pagination->initialize($config);
            // $data['pagination'] = $this->pagination->create_links();


            $config['base_url']     = site_url('pegawai/supplier_controller/index');
            $config['total_rows']   = $this->db->count_all('supplier');
            $config['per_page']     = $this->limit;
            $config['uri_segment']  = 3;
            $choice                 = $config["total_rows"] / $config['per_page'];
            $config["num_links"]    = floor($choice);

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

 
            $data['supplier'] = $this->supplier_model->tampil_data($config["per_page"], $data['page'])->result();
            $data['pagination'] = $this->pagination->create_links();

            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('template_pegawai/footer');
            $this->load->view('pegawai/data_supplier', $data);
        }

        public function insert_supplier(){
            $nama_supplier  = $this->input->post('nama_supplier');
            $alamat         = $this->input->post('alamat'); 
            $data = array(
                'nama_supplier' => $nama_supplier,
                'alamat'        => $alamat,
            );
            $this->supplier_model->insert_supplier($data, 'supplier');
            redirect('pegawai/supplier_controller/index');           
        }

        public function edit($id_supplier){
            $where = array('id_supplier' => $id_supplier);
            $data['supplier'] = $this->supplier_model->edit_supplier($where, 'supplier')->result();
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('template_pegawai/footer');
            $this->load->view('pegawai/edit_supplier', $data);
        }

        public function update(){
            $nama_supplier      = $this->input->post('nama_supplier');
            $alamat             = $this->input->post('alamat');
            $id_supplier        = $this->input->post('id_supplier');

            $data = array(
                
                'nama_supplier' => $nama_supplier,
                'alamat'        => $alamat
                
            );          

            $this->supplier_model->update_data($id_supplier, $data);
            redirect('pegawai/supplier_controller/index');
        }

        public function delete_supplier($id_supplier){

            $where = array('id_supplier' => $id_supplier);
            $this->supplier_model->delete_supplier($where, 'supplier');
            redirect('pegawai/supplier_controller/index');
        }

        public function view_supplier($id_supplier){
            $data['supplier'] = $this->supplier_model->view_supplier($id_supplier);
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/view_supplier', $data);
            $this->load->view('template_pegawai/footer');
        }

        public function print_supplier(){
            $data['total_supplier'] = $this->supplier_model->hitungsupplier();
            $data['supplier'] = $this->supplier_model->tampil_data('supplier')->result();
            $this->load->view('pegawai/print_supplier', $data);
        }

        public function search(){
            $keyword = $this->input->post('keyword');
            $config['base_url']     = site_url('pegawai/supplier_controller/index');
            $config['total_rows']   = $this->db->count_all('supplier');
            $config['per_page']     = 2;
            $config['uri_segment']  = 3;
            $choice                 = $config["total_rows"] / $config['per_page'];
            $config["num_links"]    = floor($choice);

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


            $data['supplier'] = $this->supplier_model->tampil_data($config["per_page"], $data['page'])->result();
            $data['pagination'] = $this->pagination->create_links();
            $data['supplier'] = $this->supplier_model->get_keyword($keyword);
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/data_supplier', $data);
            $this->load->view('template_pegawai/footer');
        }
    }
?>
