<?php
    class Pegawai_controller extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Auth");
            if($this->Auth->cek_login()) redirect(site_url('login'));
        }

        public function index(){
            $data['pegawai'] = $this->pegawai_model->index()->result();
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/data_pegawai', $data);
            $this->load->view('template_pegawai/footer');
        }

        public function insert_pegawai(){
            $nama_pegawai  = $this->input->post('nama_pegawai');
            $email         = $this->input->post('email'); 
            $username      = $this->input->post('username'); 
            $password      = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $foto          = $_FILES['foto']['name'];

            if ($foto = ''){}
            else
            {
                $config['upload_path']     = './uploads';
                $config['allowed_types']   = 'jpg|jpeg|png|gif|svg';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('foto')){
                    echo "Gambar gagal di upload";
                }else{
                    $foto = $this->upload->data('file_name');
                }

                $data = array(
                    'nama_pegawai'  => $nama_pegawai,
                    'email'         => $email,
                    'username'      => $username,
                    'password'      => $password,
                    'foto'          => $foto
                 );

                $this->pegawai_model->insert_pegawai($data, 'pegawai');
                redirect('pegawai/pegawai_controller/index');   
            }        
        }

        public function edit($id_pegawai){
            $where = array('id_pegawai' => $id_pegawai);
            $data['pegawai'] = $this->pegawai_model->edit_pegawai($where, 'pegawai')->result();
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('template_pegawai/footer');
            $this->load->view('pegawai/edit_pegawai', $data);
        }

        public function update(){
            $id_pegawai    = $this->input->post('id_pegawai');
            $nama_pegawai  = $this->input->post('nama_pegawai');
            $email         = $this->input->post('email'); 
            $username      = $this->input->post('username'); 
            $password      = $this->input->post('password');
            //$foto          = $this->input->post('foto');

            if($password == ''){
                $data = array(
                    'nama_pegawai'  => $nama_pegawai,
                    'email'         => $email,
                    'username'      => $username
                    //'foto'          => $foto
                );
            }
            else{
                $password      = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $data = array(
                    'nama_pegawai'  => $nama_pegawai,
                    'email'         => $email,
                    'username'      => $username,
                    'password'      => $password,
                    //'foto'          => $foto
                );
            }
            $where = array('id_pegawai' => $id_pegawai);

            // if($this->input->post('foto') != null){
            //     $foto = $this->input->post('foto');
            // }

            $this->pegawai_model->update_data($id_pegawai, $data);
            redirect('pegawai/pegawai_controller/index');
        }

        public function delete_pegawai($id_pegawai){
            $where = array('id_pegawai' => $id_pegawai);
            $this->pegawai_model->delete_pegawai($where, 'pegawai');
            redirect('pegawai/pegawai_controller/index');
        }

        public function view_pegawai($id_pegawai){
            $data['pegawai'] = $this->pegawai_model->view_pegawai($id_pegawai);
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/view_pegawai', $data);
            $this->load->view('template_pegawai/footer');
        }

        public function print_pegawai(){
            $data['total_pegawai'] = $this->pegawai_model->hitungPegawai();
            $data['pegawai'] = $this->pegawai_model->tampil_data('pegawai')->result();
            $this->load->view('pegawai/print_pegawai', $data);
        }

        public function search(){
            $keyword = $this->input->post('keyword');
            $config['base_url']     = site_url('pegawai/pegawai_controller/index');
            $config['total_rows']   = $this->db->count_all('pegawai');
            $config['per_page']     = 2;
            $config['uri_segment']  = 3;
            $choice                 = $config["total_rows"] / $config['per_page'];
            $config["num_links"]    = floor($choice);

            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


            $data['pegawai'] = $this->pegawai_model->tampil_data($config["per_page"], $data['page'])->result();
            $data['pagination'] = $this->pagination->create_links();
            $data['pegawai'] = $this->pegawai_model->get_keyword($keyword);
            $this->load->view('template_pegawai/header');
            $this->load->view('template_pegawai/sidebar');
            $this->load->view('pegawai/data_pegawai', $data);
            $this->load->view('template_pegawai/footer');
        }

       
    }
?>