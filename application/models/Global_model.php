<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Global_model extends CI_Model
{
	
	private $paket = 'tbl_paket';
	public $idpaket = 'id_paket';
	public function view_paket(){
		$query = $this->db->get($this->paket);
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
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
	function gettambahanbypaket($field){
        return $this->db->get_where('tbl_tambahan', $field)->result();
    }
}