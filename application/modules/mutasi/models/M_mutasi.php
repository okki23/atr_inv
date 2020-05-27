<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mutasi extends Parent_Model { 
   
	var $nama_tabel = 't_mutasi';
  	var $daftar_field = array('id','no_mutasi','id_barang','id_gedung_asal','id_ruangan_asal','id_gedung_tujuan', 'id_ruangan_tujuan','jml_barang','tgl_mutasi','keterangan','image');
  	var $primary_key = 'id';  
	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_mutasi(){
			$sql = "select a.*,f.nama_barang,f.kode_barang,b.nama_gedung as gedung_asal,c.nama_gedung as gedung_tujuan,d.nama_ruangan as ruangan_asal, e.nama_ruangan as ruangan_tujuan from t_mutasi a
			left join m_gedung b on b.id = a.id_gedung_asal
			left join m_gedung c on c.id = a.id_gedung_tujuan
			left join m_ruangan d on d.id = a.id_ruangan_asal
			left join m_ruangan e on e.id = a.id_ruangan_tujuan
			left join m_barang f on f.id = a.id_barang";   
			$getdata = $this->db->query($sql)->result();
		   	$data = array();  
		   	$no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
             
                $sub_array[] = $row->nama_barang;  
                $sub_array[] = $row->gedung_asal;   
				$sub_array[] = $row->ruangan_asal;   
				$sub_array[] = $row->gedung_tujuan;  
				$sub_array[] = $row->ruangan_tujuan;
				$sub_array[] = $row->tgl_mutasi;   
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
   
  	public function get_no(){
		$query = $this->db->query("SELECT SUBSTR(MAX(no_mutasi),-7) AS id  FROM t_mutasi");    
		return $query;
  	}

 
}
