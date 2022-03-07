<?php 
class Auth extends CI_Model 
{
 
	public function __construct()
	{
        parent::__construct();
	}
 
	//function register($username,$password,$nama_pegawai,$email)
	//{
	//	$data_user = array(
	//		'username'=>$username,
	//		'password'=>password_hash($password,PASSWORD_DEFAULT),
    //        'nama_pegawai'=>$nama_pegawai,
    //        'email'=>$email
	//	);
	//	$this->db->insert('pegawai',$data_user);
	//}
 
	function login_user($username,$password)
	{
        $query = $this->db->get_where('pegawai',array('username'=>$username));
        if($query->num_rows() > 0)
        {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('username', $data_user->username);
                $this->session->set_userdata('nama_pegawai',$data_user->nama_pegawai);
                $this->session->set_userdata('email',$data_user->email);
                $this->session->set_userdata('foto',$data_user->foto);
                $this->session->set_userdata('id_pegawai',$data_user->id_pegawai);

				$this->session->set_userdata('is_login',TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
	}
	
    function cek_login()
    {
        if(empty($this->session->userdata('is_login')))
        {
			redirect('login_controller');
		}
    }
}
?>