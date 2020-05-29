<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Report_item extends Parent_Controller {

	 
	 
	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_report_item');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	} 
  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['list_ruangan'] = $this->db->get('m_ruangan')->result(); 
		$data['konten'] = 'report_item/report_item_view';
		$id_ruangan = $this->input->post('id_ruangan');
		$cari = $this->input->post('cari');
		if(isset($cari)){ 
			$data['listing'] =  $this->db->query('select a.*,b.kode_ruangan,b.nama_ruangan from m_barang a
			left join m_ruangan b on b.id = a.id_ruangan where a.id_ruangan = "'.$id_ruangan.'" ');
		}else{ 
			$data['listing'] =  $this->db->query('select a.*,b.kode_ruangan,b.nama_ruangan from m_barang a
			left join m_ruangan b on b.id = a.id_ruangan ');
		}
		
		$this->load->view('template_view',$data);		
   
	}
  
	  
	public function print(){ 
	
		$filename ="Report-Barang-".date('Y-m').".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
	
	echo "<h1 align='center'> Laporan Barang </h1>";
	$sql = $this->db->get('m_barang')->result();

	echo "<br>";
	echo ' <table width="100%" class="table table-bordered table-striped table-hover " border="1" >
	<thead>
		<tr align="center"> 
			<th style="width:5%;">Kode Barang</th>
			<th style="width:5%;">Nama Barang</th>
			<th style="width:5%;">Merk / Model</th>   
			<th style="width:5%;">No Serial Pabrik</th> 
			<th style="width:5%;">Ukuran</th> 
			<th style="width:5%;">Bahan</th>   
			<th style="width:5%;">Tahun Buat</th> 
			<th style="width:5%;">No Kode Barang</th>  
			<th style="width:5%;">Jumlah Barang</th>  
			<th style="width:5%;">Satuan Barang</th>  
			<th style="width:5%;">Harga Beli</th>  
			<th style="width:5%;">Ruangan</th>  
		</tr>
	</thead> 
	<tbody>';
	foreach($sql as $key=>$val){  
	echo '<tr align="center">  
			<td>'.$val->kode_barang.'</td>
			<td>'.$val->nama_barang.'</td>
			<td>'.$val->merk_model.'</td>
			<td>'."'".$val->no_serial_pabrik.'</td>
			<td>'.$val->ukuran.'</td>
			<td>'.$val->bahan.'</td>
			<td>'.$val->tahun_buat.'</td>
			<td>'.$val->no_kode_barang.'</td>
			<td>'.$val->jumlah_barang.'</td>
			<td>'.$val->satuan_barang.'</td>
			<td>'.$val->harga_beli.'</td>
			<td>'.$val->nama_ruangan.'</td>
			<td></td>
		</tr>';
	}
	echo '</tbody>';

	

	}
 


}
