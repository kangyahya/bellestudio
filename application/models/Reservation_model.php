<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Reservation_model extends CI_Model
{
	
	private $table = 'tbl_reservation';
    
    
    public function insert(){
        $data = [
            'uid_paket' => $this->input->post('uid_paket'),
            'uid_member' => $this->input->post('uid_member'),
            'tanggal' => $this->input->post('tanggal'),
            'jam_mulai' => $this->input->post('jam'),
            'jam_selesai' => $this->input->post('jam'),
        ];
        $this->db->set('uid','UUID()', false);
        $this->db->insert($this->table, $data);
    }

    public function getAllByMember(){
        $id = $this->session->userdata('uid');
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_paket','tbl_paket.uid = tbl_reservation.uid_paket');
        $this->db->where('uid_member',$id);
        return $this->db->get()->result();
    }
}