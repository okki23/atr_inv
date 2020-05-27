<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_barang extends Parent_Model { 
  
	var $nama_tabel = 'm_barang';
	var $daftar_field = array('id','kode_barang', 'nama_barang','merk_model', 'no_serial_pabrik', 'ukuran', 'bahan', 'tahun_buat', 'no_kode_barang', 'jumlah_barang', 'satuan_barang', 'harga_beli');
	var $primary_key = 'id'; 
	  
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
  
	public function fetch_barang(){
			$sql = $this->db->get($this->nama_tabel)->result();
			$data = array();  
			$no = 1;
		foreach($sql as $row)  {  
			$sub_array = array();  
	
			$sub_array[] = $row->kode_barang;  
			$sub_array[] = $row->merk_model;  
			$sub_array[] = $row->nama_barang; 
			$sub_array[] = '<a href="javascript:void(0)" class="btn btn-default btn-xs waves-effect" id="edit" onclick="Detail('.$row->id.');" > <i class="material-icons">aspect_ratio</i> Detail </a>  &nbsp; 
			<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a>  &nbsp; 
			<a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>  &nbsp;';  
			
			$data[] = $sub_array;  
			$no++;
		}  
		
			return $output = array("data"=>$data);
			
	}
	
	public function fetch_barang_all(){
		$sql = $this->db->get($this->nama_tabel)->result();
		$data = array();  
		$no = 1;
		foreach($sql as $row)  {  
		$sub_array = array();   
		$sub_array[] = $row->kode_barang;  
		$sub_array[] = $row->nama_barang;  
		$sub_array[] = $row->merk_model;
		$sub_array[] = $row->no_serial_pabrik;  
		$sub_array[] = $row->ukuran;  
		$sub_array[] = $row->bahan;
		$sub_array[] = $row->tahun_buat;  
		$sub_array[] = $row->no_kode_barang;  
		$sub_array[] = $row->jumlah_barang; 
		$sub_array[] = $row->satuan_barang;  
		$sub_array[] = $row->harga_beli;    
		$sub_array[] = $row->id; 
		$data[] = $sub_array;  
		$no++;
	}  
	
		return $output = array("data"=>$data);
		
}
	 
 
}
