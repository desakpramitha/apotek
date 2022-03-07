<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login_controller extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
	}
 
	public function index()
	{
		$this->load->view('pegawai/login_view');
	}
 
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->auth->login_user($username,$password))
		{
			redirect('pegawai/dashboard');
		}
		else
		{
			$this->session->set_flashdata('error','Username atau Password salah');
			redirect('login_controller');
		}
	}
 
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('is_login');
		$this->session->set_flashdata('message','Berhasil Logout');
		redirect('login_controller/index');
	}
 
}
?>