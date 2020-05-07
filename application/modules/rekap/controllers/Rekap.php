<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class rekap extends Parent_Controller {
 
  var $nama_tabel = 'm_rekap';
  var $daftar_field = array('id','nama_rekap');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_rekap'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'rekap/rekap_view';
		$this->load->view('template_view',$data);		
   
	} 

 
	 
	public function print(){  
		
		$from = $this->input->post('from');
		$to = $this->input->post('to');
 
		$filename ="Laporan Surat Masuk ".tanggalan($from)." - ".tanggalan($to).".xls";
		header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename='.$filename);
		
		$sql = "select a.*,b.id_barang,c.nama_barang,b.qty,d.nama_instansi,sum(b.qty) as total_barang from t_pengeluaran a
		left join t_pengeluaran_detail b on b.no_transaksi = a.no_transaksi 
		left join m_barang c on c.id = b.id_barang
		left join m_instansi d on d.id = a.id_instansi  
		 where a.date_assign BETWEEN '".$from."' AND '".$to."'  GROUP BY a.no_transaksi,b.id_barang,d.id  ORDER by a.date_assign ASC";

		$exsql = $this->db->query($sql)->result_array();

 
		echo ' 
		<table width="100%" border="1" cellpadding="3" cellspacing="0"> 
		<tr>
		<td colspan="6" style="text-align:center; font-weight:bold;"> Rekap Pengeluaran Barang Periode '.tanggalan($from).' - '.tanggalan($to).'</td>
		</tr>
		<tr>
			<th> No  </th>
			<th> No Transaksi </th>
			<th> Nama Barang </th>
			<th> Tanggal keluar</th> 
			<th> Departemen Pemohon</th> 
			<th> Total Barang Keluar </th>
		 
		</tr>';
		
		
		//var_dump($exsql);
		 
		$i=0; 
		foreach($exsql as $data){
			$row[$i]=$data;
			$i++;
		}
		$nu=1;
		$n=count($row);
		$cektran="";
		foreach($row as $cell){
			if(isset($total[$cell['no_transaksi']]['jml'])) { 
				$total[$cell['no_transaksi']]['jml']++; 
			}else{
				$total[$cell['no_transaksi']]['jml']=1; 
			}	
		}
		 
			for($i=0;$i<$n;$i++){
				$cell=$row[$i];
				echo '<tr>';
				echo "<td>".$nu."</td>";
				if($cektran!=$cell['no_transaksi']){
				  echo '<td' .($total[$cell['no_transaksi']]['jml']>1?' rowspan="' .($total[$cell['no_transaksi']]['jml']).'">':'>') ."'".$cell['no_transaksi'].'</td>';
				  $cektran=$cell['no_transaksi'];
				}
				echo "<td>$cell[nama_barang]</td><td>$cell[date_assign]</td>";
				echo "<td>$cell[nama_instansi]</td>";
				echo "<td>$cell[total_barang]</td>";
				
				echo "</tr>";
  
				$nu++;
			  }

			  
		echo ' 
		<table width="100%" border="1" cellpadding="3" cellspacing="0"> 
		<tr>
		<td colspan="6" style="text-align:center; font-weight:bold;"> Statistik Jumlah Departemen Pemohon Barang Periode '.tanggalan($from).' - '.tanggalan($to).'</td>
		</tr>
		<tr>
			<th> Nama Departemen  </th>
			<th> Total Request </th> 
		</tr>';
		$listreq = $this->db->query("select a.*,b.nama_instansi, count(a.id_instansi) as totalreq from t_pengeluaran a
		left join m_instansi b on b.id = a.id_instansi WHERE a.date_assign BETWEEN '".$from."' AND '".$to."' GROUP BY a.id_instansi")->result();
		foreach($listreq as $j=>$i){
			echo '<tr> 
				<td>'.$i->nama_instansi.'</td>
				<td>'.$i->totalreq.'</td>
			</tr>';
		}
		echo '</table>';

	   die();

		 
	
  

}
}
