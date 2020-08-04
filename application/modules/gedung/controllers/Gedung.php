<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Gedung extends Parent_Controller {
 
  var $nama_tabel = 'm_gedung';
  var $daftar_field = array('id','kode_gedung','nama_gedung','alamat');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_gedung'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'gedung/gedung_view';
		$this->load->view('template_view',$data);		
   
	}  

  	public function fetch_gedung(){  
       $getdata = $this->m_gedung->fetch_gedung();
       echo json_encode($getdata);   
  	} 
	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = $this->db->where('id',$id)->get('m_gedung')->row(); 
		echo json_encode($sql,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    	$delete = $this->db->where('id',$id)->delete('m_gedung');
    	 
    	if($delete){
    		$result = array("response"=>array('message'=>'success'));	
	    }else{
	    	$result = array("response"=>array('message'=>'failed'));
	    } 
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){  
		$data_form = $this->m_gedung->array_from_post($this->daftar_field); 
		$id = isset($data_form['id']) ? $data_form['id'] : NULL;  
		$simpan_data = $this->m_gedung->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
	
			if($simpan_data){
				$result = array("response"=>array('message'=>'success'));
			}else{
				$result = array("response"=>array('message'=>'failed'));
			}
			
			echo json_encode($result,TRUE); 
	} 

}
