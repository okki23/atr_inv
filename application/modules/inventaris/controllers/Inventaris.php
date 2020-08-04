<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Inventaris extends Parent_Controller {

	var $nama_tabel = 't_inventaris';
  	var $daftar_field = array('id','id_barang','id_ruangan','keterangan','kondisi');
  	var $primary_key = 'id'; 
	 
	  public function __construct(){
 		parent::__construct();
 		$this->load->model('m_inventaris');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	} 
  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'inventaris/inventaris_view';
		$this->load->view('template_view',$data);		
   
	}
 
  	public function fetch_inventaris(){  
       $getdata = $this->m_inventaris->fetch_inventaris();
       echo json_encode($getdata);   
  	}  

  	public function fetch_barang(){  
       $getdata = $this->m_inventaris->fetch_barang();
       echo json_encode($getdata);   
  	} 
	
	public function fetch_ruangan(){  
		$getdata = $this->m_inventaris->fetch_ruangan();
		echo json_encode($getdata);   
	} 
   
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$sql = "select a.*,b.kode_barang,b.nama_barang,c.kode_ruangan,c.nama_ruangan from t_inventaris a 
		left join m_barang b on b.id = a.id_barang
		left join m_ruangan c on c.id = a.id_ruangan where a.id = '".$id."' "; 
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);    
		
    	$sqlhapus = $this->m_inventaris->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_inventaris->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_inventaris->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
    //$simpan_inventaris = $this->upload_inventaris();
  
 
	
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  function upload_inventaris(){  
    if(isset($_FILES["user_image"])){  
        $extension = explode('.', $_FILES['user_image']['name']);   
        $destination = './upload/' . $_FILES['user_image']['name'];  
        return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
         
    }  
  }  
       


}
