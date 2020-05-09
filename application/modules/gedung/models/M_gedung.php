<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_gedung extends Parent_Model {  

	var $nama_tabel = 'm_gedung';
	var $daftar_field = array('id','kode_gedung','nama_gedung','alamat');
	var $primary_key = 'id';
    
	public function __construct(){
		parent::__construct();
		$this->load->database();
	} 

	public function fetch_gedung(){ 
		$getdata = $this->db->get($this->nama_tabel)->result();
		$data = array();   
			foreach($getdata as $row)  
			{  
				$sub_array = array();  
			
				$sub_array[] = $row->kode_gedung;
				$sub_array[] = $row->nama_gedung;
				$sub_array[] = $row->alamat;   
				$sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
				$sub_array[] =  $row->id;
				$data[] = $sub_array;  
			
			}   
		return $output = array("data"=>$data); 
	}  
 
}
