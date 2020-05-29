<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class report_inventaris extends Parent_Controller {

	 
	 
	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_report_inventaris');
 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	} 
  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'report_inventaris/report_inventaris_view';
		$data['list_ruangan'] = $this->db->get('m_ruangan')->result(); 
		$id_ruangan = $this->input->post('id_ruangan');
		$cari = $this->input->post('cari');
		if(isset($cari)){ 
			$data['listing'] = $this->db->query('select a.*,c.nama_gedung as gedung_asal,d.nama_ruangan as ruangan_asal,
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
			left join m_ruangan h on h.id = a.id_ruangan where a.id_ruangan = "'.$id_ruangan.'" ');
		}else{ 
			$data['listing'] = $this->db->query('select a.*,c.nama_gedung as gedung_asal,d.nama_ruangan as ruangan_asal,
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
			left join m_ruangan h on h.id = a.id_ruangan');
		}
		
		$this->load->view('template_view',$data);		
   
	}
  
	  
	public function print(){ 
	$id_ruangan = $this->input->post('id_ruangan');
	$getruangan = $this->db->where('id',$id_ruangan)->get('m_ruangan')->row();

	$filename ="Report-Inventaris-Ruangan-".$getruangan->nama_ruangan."-".date('Y-m').".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
	 
	echo "<h1 align='center'> Laporan Inventaris Ruangan ".$getruangan->nama_ruangan."  </h1>";
	$sql = $this->db->query('select a.*,c.nama_gedung as gedung_asal,d.nama_ruangan as ruangan_asal,
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
	left join m_ruangan h on h.id = a.id_ruangan where a.id_ruangan = "'.$id_ruangan.'" ')->result();

	echo "<br>";
	echo ' <table width="100%" class="table table-bordered table-striped table-hover " border="1" >
	<thead> 
		<tr align="center">  
			<th style="width:10%;">Kode Barang</th>
			<th style="width:10%;">Nama Barang</th>
			<th style="width:10%;">Merk/Model</th>
			<th style="width:10%;">No Serial Pabrik</th>
			<th style="width:10%;">Ukuran</th>
			<th style="width:10%;">Bahan</th>
			<th style="width:10%;">Tahun Buat</th>
			<th style="width:10%;">No Kode Barang</th>
			<th style="width:10%;">Jumlah Barang</th>
			<th style="width:20%;">Harga Beli</th> 
			<th style="width:10%;">Satuan</th>
			<th style="width:20%;">Mutasi</th> 
			<th style="width:20%;">Keterangan</th> 
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
			<td>'."'".$val->no_kode_barang.'</td>
			<td>'.$val->jumlah_barang.'</td>
			<td>'.$val->harga_beli.'</td>
			<td>'.$val->satuan_barang.'</td>
			<td>'.$val->ruangan_asal.' - '.$val->ruangan_tujuan.'</td>
			<td>'.$val->keterangan.'</td>
			<td></td>
		</tr>';
	}
	echo '</tbody>'; 

	}
  

}
