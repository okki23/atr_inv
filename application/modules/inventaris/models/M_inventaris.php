<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inventaris extends Parent_Model { 
   
	var $nama_tabel = 't_inventaris';
  	var $daftar_field = array('id','id_barang','id_ruangan','keterangan','kondisi');
  	var $primary_key = 'id'; 
	  
	public function __construct(){
			parent::__construct();
			$this->load->database();
	}
	public function fetch_inventaris(){
				$sql = "select a.*,c.nama_gedung as gedung_asal,d.nama_ruangan as ruangan_asal,
				e.nama_gedung as gedung_tujuan,f.nama_ruangan as ruangan_tujuan,g.nama_barang,
				g.kode_barang,g.bahan,g.harga_beli,g.jumlah_barang,g.merk_model,
				g.no_kode_barang,g.no_serial_pabrik,g.satuan_barang,g.tahun_buat,g.ukuran,h.kode_ruangan,
				h.nama_ruangan from t_inventaris a
				left join t_mutasi b on b.id_barang = a.id_barang
				left join m_gedung c on c.id = b.id_gedung_asal
				left join m_ruangan d on d.id = b.id_ruangan_asal 
				left join m_gedung e on e.id = b.id_gedung_tujuan
				left join m_ruangan f on f.id = b.id_ruangan_tujuan
				left join m_barang g on g.id = a.id_barang
				left join m_ruangan h on h.id = a.id_ruangan";   
				$getdata = $this->db->query($sql)->result();
				$data = array();  
				$no = 1;
			foreach($getdata as $row) {
					$sub_array = array();   
					$sub_array[] = $row->nama_barang;  
					$sub_array[] = $row->merk_model;   
					$sub_array[] = $row->no_serial_pabrik;   
					$sub_array[] = $row->ukuran;
					$sub_array[] = $row->bahan;  
					$sub_array[] = $row->tahun_buat;   
					$sub_array[] = $row->no_kode_barang;   
					$sub_array[] = $row->jumlah_barang;  
					$sub_array[] = $row->harga_beli;   
					$sub_array[] = $row->kondisi;
					$sub_array[] = $row->keterangan;   
					$sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a> 
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
