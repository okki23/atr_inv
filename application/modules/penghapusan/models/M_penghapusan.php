<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penghapusan extends Parent_Model { 
   
	var $nama_tabel = 't_hapus';
  	var $daftar_field = array('id','id_barang','tgl_hapus','dokumen','id_ruangan','keterangan','image');
  	var $primary_key = 'id'; 

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_penghapusan(){
			$sql = "select a.*,b.nama_barang,c.kode_ruangan,c.nama_ruangan from t_hapus a 
				 left join m_barang b on b.id = a.id_barang
				 left join m_ruangan c on c.id = a.id_ruangan";   
			$getdata = $this->db->query($sql)->result();
		   	$data = array();  
		   	$no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->nama_barang;  
                $sub_array[] = $row->kode_ruangan;   
				$sub_array[] = $row->nama_ruangan;   
				$sub_array[] = $row->tgl_hapus;   
				$sub_array[] = '<a href="javascript:void(0)" class="btn btn-primary btn-xs waves-effect" id="detail" onclick="Show_Detail('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a> 
								&nbsp; <a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a> 
								&nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
                $sub_array[] = $row->id;
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

    public function fetch_barang(){   
       $getdata = $this->db->get('m_barang')->result();
       $data = array();  
       $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->nama_barang;   
                $sub_array[] = $row->id;   
                $data[] = $sub_array;  
                $no++;
           }  
          
       return $output = array("data"=>$data);
        
    }

    public function fetch_ruangan(){   
	$getdata = $this->db->get('m_ruangan')->result();
	$data = array();  
	$no = 1;
	    foreach($getdata as $row)  
	    {  
		   $sub_array = array();  
		   $sub_array[] = $no;
		   $sub_array[] = $row->nama_ruangan;   
		   $sub_array[] = $row->id;   
		   $data[] = $sub_array;  
		   $no++;
	    }  
	   
	return $output = array("data"=>$data);
	 
   } 
 
}
