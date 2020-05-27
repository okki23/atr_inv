<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Mutasi extends Parent_Controller {

	var $nama_tabel = 't_mutasi';
  	var $daftar_field = array('id','no_mutasi','id_barang','id_gedung_asal','id_ruangan_asal','id_gedung_tujuan', 'id_ruangan_tujuan','jml_barang','tgl_mutasi','keterangan','image');
  	var $primary_key = 'id'; 
	 
	  public function __construct(){
 		parent::__construct();
 		$this->load->model('m_mutasi');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	} 
  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'mutasi/mutasi_view';
		$this->load->view('template_view',$data);		
   
	}
 
  	public function fetch_mutasi(){  
       $getdata = $this->m_mutasi->fetch_mutasi();
       echo json_encode($getdata);   
  	}  

  	public function fetch_barang(){  
       $getdata = $this->m_mutasi->fetch_barang();
       echo json_encode($getdata);   
  	} 
	
	public function fetch_ruangan(){  
		$getdata = $this->m_mutasi->fetch_ruangan();
		echo json_encode($getdata);   
	} 
   
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$sql = "select a.*,f.nama_barang,f.kode_barang,b.nama_gedung as gedung_asal,c.nama_gedung as gedung_tujuan,d.nama_ruangan as ruangan_asal, e.nama_ruangan as ruangan_tujuan from t_mutasi a
		left join m_gedung b on b.id = a.id_gedung_asal
		left join m_gedung c on c.id = a.id_gedung_tujuan
		left join m_ruangan d on d.id = a.id_ruangan_asal
		left join m_ruangan e on e.id = a.id_ruangan_tujuan
		left join m_barang f on f.id = a.id_barang where a.id = '".$id."' "; 
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);    
		
    	$sqlhapus = $this->m_mutasi->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_mutasi->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL;  

    $simpan_data = $this->m_mutasi->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
    $simpan_mutasi = $this->upload_mutasi(); 
	
		if($simpan_data && $simpan_mutasi){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  function upload_mutasi(){  
    if(isset($_FILES["user_image"])){  
        $extension = explode('.', $_FILES['user_image']['name']);   
        $destination = './upload/' . $_FILES['user_image']['name'];  
        return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
         
    }  
  }  

  	public function get_last_id(){
		$params = date('Ymd');
		echo $this->transaksi_id($params); 
	}
	public function transaksi_id($param = '') {
		$data = $this->m_mutasi->get_no();
		$lastid = $data->row();
		$idnya = $lastid->id;


		if($idnya == '') { // bila data kosong
			$ID = $param . "0000001";
			//00000001
		}else {
			$MaksID = $idnya;
			$MaksID++;
			if ($MaksID < 10)
				$ID = $param . "000000" . $MaksID;
			else if ($MaksID < 100)
				$ID = $param . "00000" . $MaksID;
			else if ($MaksID < 1000)
				$ID = $param . "0000" . $MaksID;
			else if ($MaksID < 10000)
				$ID = $param . "000" . $MaksID;
			else if ($MaksID < 100000)
				$ID = $param . "00" . $MaksID;
			else if ($MaksID < 1000000)
				$ID = $param . "0" . $MaksID;
			else
				$ID = $MaksID;
		}

	return $ID;
	}  	

        

}
