<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Perbaikan extends Parent_Controller {

	var $nama_tabel = 't_perbaikan';
  	var $daftar_field = array('id','id_barang','tgl_perbaikan','kerusakan','id_ruangan','keterangan','image');
  	var $primary_key = 'id'; 
	 
	  public function __construct(){
 		parent::__construct();
 		$this->load->model('m_perbaikan');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	} 
  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'perbaikan/perbaikan_view';
		$this->load->view('template_view',$data);		
   
	}
 
  	public function fetch_perbaikan(){  
       $getdata = $this->m_perbaikan->fetch_perbaikan();
       echo json_encode($getdata);   
  	}  

  	public function fetch_barang(){  
       $getdata = $this->m_perbaikan->fetch_barang();
       echo json_encode($getdata);   
  	} 
	
	public function fetch_ruangan(){  
		$getdata = $this->m_perbaikan->fetch_ruangan();
		echo json_encode($getdata);   
	} 
   
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$sql = "select a.*,b.kode_barang,b.nama_barang,c.kode_ruangan,c.nama_ruangan from t_perbaikan a 
		left join m_barang b on b.id = a.id_barang
		left join m_ruangan c on c.id = a.id_ruangan where a.id = '".$id."' "; 
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);    
		
    	$sqlhapus = $this->m_perbaikan->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_perbaikan->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_perbaikan->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
    $simpan_perbaikan = $this->upload_perbaikan();
  
 
	
		if($simpan_data && $simpan_perbaikan){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  function upload_perbaikan(){  
    if(isset($_FILES["user_image"])){  
        $extension = explode('.', $_FILES['user_image']['name']);   
        $destination = './upload/' . $_FILES['user_image']['name'];  
        return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
         
    }  
  }  
       


}
