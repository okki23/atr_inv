<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_login extends Parent_Model { 
 
	var $nama_tabel = 'm_user';
	var $daftar_field = array('id','username','password','id_pegawai','level');
	var $primary_key = 'id';
	  
	public function __construct(){
        parent::__construct();
        $this->load->database();
	}
 
	public function autentikasi($username,$password){
		$key = array("username"=>$username,"password"=>$password);
		$sql = $this->db->where($key)->get($this->nama_tabel); 
		return $sql;
	}

	public function get_profile($username){
		$sql = $this->db->query("select a.*,b.nama,c.nama_divisi,d.nama_jabatan from m_user a
		left join m_pegawai b on b.id = a.id_pegawai 
		left join m_divisi c on c.id = b.id_divisi
		left join m_jabatan d on d.id = b.id_jabatan
		where a.username = '".$username."' ")->row();
		return $sql;
	} 
}
