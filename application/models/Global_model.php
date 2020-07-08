<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Global_model extends CI_Model
{
	
	private $paket = 'tbl_paket';
	public $idpaket = 'id_paket';
	public function getPaket(){
		$query = $this->db->get($this->paket);
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
	public function getProducts($limit = null, $start = null, $big_get, $vendor_id = false)
    {
		$this->db->select('*');
		$this->db->from('tbl_paket');
        $query = $this->db->get();
        return $query->result_array();
    }
	public function view_include($id){
		$query = $this->db->get_where('tbl_detail_paket',['id_detail_paket'=>$id]);
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
	function getpaketbyid($id){
		return $this->db->get_where($this->paket, ['uid'=>$id])->row();
	}
	function getpaketbynotid($id){
		$this->db->where('uid !=', $id);
		return $this->db->get($this->paket)->result();
	}
	function gettambahanbypaket($field){
        return $this->db->get_where('tbl_tambahan', $field)->result();
	}
	function getNoteByPaket($field){
        return $this->db->get_where('tbl_note', $field);
	}
	function getKategoriById($field){
        return $this->db->get_where('tbl_kategori_paket', $field);
	}
}