<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class report_mutasi extends Parent_Controller {
 
	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_report_mutasi');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	} 
  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'report_mutasi/report_mutasi_view';
		$this->load->view('template_view',$data);		
   
	}
  
	  
	public function print(){ 
	
		$filename ="Report-Mutasi-".date('Y-m').".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
	
	echo "<h1 align='center'> Laporan Mutasi </h1>";
	$sql = $this->db->query('select a.*,f.nama_barang,f.kode_barang,b.nama_gedung as gedung_asal,c.nama_gedung as gedung_tujuan,d.nama_ruangan as ruangan_asal, e.nama_ruangan as ruangan_tujuan from t_mutasi a
	left join m_gedung b on b.id = a.id_gedung_asal
	left join m_gedung c on c.id = a.id_gedung_tujuan
	left join m_ruangan d on d.id = a.id_ruangan_asal
	left join m_ruangan e on e.id = a.id_ruangan_tujuan
	left join m_barang f on f.id = a.id_barang')->result();

	echo "<br>";
	echo ' <table width="100%" class="table table-bordered table-striped table-hover " border="1" >
	<thead>
		<tr align="center">  
			<th style="width:10%;">Nomor Mutasi</th>
			<th style="width:10%;">Kode Barang</th>
			<th style="width:10%;">Nama Barang</th>
			<th style="width:10%;">Gedung Asal</th>
			<th style="width:10%;">Ruangan Asal</th>
			<th style="width:10%;">Gedung Tujuan</th>
			<th style="width:10%;">Ruangan Tujuan</th> 
			<th style="width:10%;">Jumlah Barang</th>
			<th style="width:10%;">Tanggal Mutasi</th>
			<th style="width:20%;">Keterangan</th> 
		</tr>
	</thead> 
	<tbody>';
	foreach($sql as $key=>$val){  
	echo '<tr align="center">  
			<td>'."'".$val->no_mutasi.'</td>
			<td>'.$val->kode_barang.'</td>
			<td>'.$val->nama_barang.'</td>
			<td>'.$val->gedung_asal.'</td>
			<td>'.$val->ruangan_asal.'</td>
			<td>'.$val->gedung_tujuan.'</td>
			<td>'.$val->ruangan_tujuan.'</td>
			<td>'.$val->jml_barang.'</td>
			<td>'.$val->tgl_mutasi.'</td>
			<td>'.$val->keterangan.'</td> 
			<td></td>
		</tr>';
	}
	echo '</tbody>';

	

	}
 


}
