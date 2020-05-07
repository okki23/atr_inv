<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends Parent_Controller {
 
  	var $nama_tabel = 'm_user';
  	var $daftar_field = array('id','username','password','id_pegawai','level');
  	var $primary_key = 'id';

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_login');
	}
	 
	public function index(){ 
			$data['judul'] = $this->data['judul'];   
			$this->load->view('login/login_view',$data); 
	} 

	public function autentikasi(){ 
 		$username = $this->input->post('username');
		$password = base64_encode($this->input->post('password')); 
		$auth = $this->m_login->autentikasi($username,$password);  
		$get_profile = $this->m_login->get_profile($this->session->userdata('id'));
			if($auth->num_rows() > 0){ 
				$this->session->set_userdata(array('username'=>$get_profile->username,'id'=>$get_profile->id,'nama'=>$get_profile->nama,'divisi'=>$get_profile->divisi));
				redirect('dashboard');
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url('login') . "';
				</script>";
			}		 
	}

	public function logout(){
		$this->session->sess_destroy();
		echo "<script language=javascript>
             alert('Anda telah keluar dari ".$this->data['judul']." ');
             window.location='" . base_url('login') . "';
             </script>";		 
	}
}
