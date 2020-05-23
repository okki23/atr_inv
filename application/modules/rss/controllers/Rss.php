<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Rss extends Parent_Controller {
   
 	public function __construct(){
		 parent::__construct(); 
		 $this->load->library('rssparser');
 	} 
 
  	public function index(){
		$this->rssparser->set_feed_url('https://www.inews.id/feed/partner/rctiplus/news');
		$this->rssparser->set_cache_life(30);
		$data['judul'] = 'gue keren!';
		$data['list'] = $this->rssparser->getFeed(5);  
  		$this->load->view('rss/rss_view',$data);		
     
  	} 
 
  	public function fetch_rss(){  
       $getdata = $this->m_rss->fetch_rss();
       echo json_encode($getdata);   
	}

	public function fetch_rss_front(){  
		$getdata = $this->m_rss->fetch_rss_front();
		echo json_encode($getdata);   
	 }


	public function item_list(){  
       
		$no_transaksix =  $this->input->post('no_transaksix');
		 
		  $sql = "select a.*,b.nama_kategori,c.nama_sub_kategori from m_rss a
		left join m_kategori b on b.id = a.id_kategori
		left join m_sub_kategori c on c.id = a.id_sub_kategori";
		  $exsql = $this->db->query($sql)->result();
					
		  $dataparse = array();  
			 foreach ($exsql as $key => $value) {  
				  $sub_array['nama_kategori'] = $value->nama_kategori;
				  $sub_array['nama_sub_kategori'] = $value->nama_sub_kategori;  
				  $sub_array['nama_rss'] = $value->nama_rss;
				 
				  $sub_array['action'] =  "<button typpe='button' onclick='GetItemList(".$value->id.");' class = 'btn btn-primary'> <i class='material-icons'>shopping_cart</i> Pilih </button>";  
	 
				 array_push($dataparse,$sub_array); 
			  }  
		 
		  echo json_encode($dataparse);
   
	  }
	public function fetch_item_list(){
		$id = $this->uri->segment(3);
		$sql = $this->db->where('id',$id)->get('m_rss')->row();
	    echo json_encode($sql,TRUE);
	}
	public function fetch_sub_kategori_rss(){  
  	   
		$id_kategori =  $this->input->post('id_kategori');
		$sql = "select * from m_sub_kategori where id_kategori = '".$id_kategori."' ";
  
	  $getdata = $this->db->query($sql)->result();
	  $return_arr = array();

	  foreach ($getdata as $key => $value) {
		   $row_array['nama'] = $value->nama_sub_kategori; 
		   $row_array['action'] = "<button typpe='button' onclick='GetDataSubKategori(".$value->id.");' class = 'btn btn-warning'> Pilih </button>";  
		   array_push($return_arr,$row_array);
	  }
	  echo json_encode($return_arr);

	 }  

	 public function fetch_nama_sub_kategori_row(){
		$id = $this->uri->segment(3);
		$data = $this->db->where('id',$id)->get('m_sub_kategori')->row();
		echo json_encode($data);
	}


	 
	public function get_data_edit(){
		$id = $this->uri->segment(3);
		$sql = "select a.*,b.nama_kategori,c.nama_sub_kategori from m_rss a
		left join m_kategori b on b.id = a.id_kategori
		left join m_sub_kategori c on c.id = a.id_sub_kategori where a.id = '".$id."' ";

		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
	

    $sqlhapus = $this->m_rss->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_rss->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_rss->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
 
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  
       


}
