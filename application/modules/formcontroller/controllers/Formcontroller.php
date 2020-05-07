<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class formcontroller extends Parent_Controller {
   
 	public function __construct(){
 		parent::__construct();
		$this->load->model('login/m_login','m_login');
		 
 	} 
 
  	public function index(){
  		$data['judul'] = $this->data['judul']; 
  		//$data['konten'] = 'formcontroller/formcontroller_view';
  		$this->load->view('formcontroller/formcontroller_view',$data);		
     
	}
	
	    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function formpost()

    {

        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

 

        $userIp=$this->input->ip_address();

     

        $secret = $this->config->item('google_secret');

   

        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;

 

        $ch = curl_init(); 

        curl_setopt($ch, CURLOPT_URL, $url); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        $output = curl_exec($ch); 

        curl_close($ch);      

         

        $status= json_decode($output, true);

 

        if ($status['success']) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->autentikasi($username,$password);
			// echo "Email : ".$this->input->post('email');
			// echo "<br>";
			// echo "Password : ".$this->input->post('password');
			// echo "<br>";
            // print_r('Google Recaptcha Successful');

            // exit;

        }else{
		
            $this->session->set_flashdata('flashError', 'Captcha harus diaktifkan !');

        }

 

        redirect(base_url('formcontroller'), 'refresh');

	}   
	
	
	public function autentikasi($username,$password){
	 
		// $username = $this->input->post('username');
		// $password = base64_encode($this->input->post('password'));
		  
			 
			$auth = $this->m_login->autentikasi($username,base64_encode($password));
			 
			$session = $this->m_login->autentikasi($username,base64_encode($password))->row();
			 
			if($auth->num_rows() > 0){
				$this->session->set_userdata(array('username'=>$session->username,'level'=>$session->level,'userid'=>$session->id,'foto'=>$session->foto));
				 

				if($session->level == '1'){
					redirect(base_url('dashboard'));
				}else{
					redirect(base_url('front'));
				}
			}else{
				echo "<script language=javascript>
				alert('Akun yang anda masukkan tidak tersedia, Periksa kembali!');
				window.location='" . base_url('login') . "';
				</script>";
			}
		 
	}
	  


}
