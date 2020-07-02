<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Member_model extends CI_Model
{
	
	private $member = 'tbl_member';
	public $idmember = 'id';
	function get_username($username) {
		$this->db->where('username', $username);
		$this->db->limit(1);
		$query = $this->db->get($this->member);

		if ($query->num_rows() == 1) {
			return TRUE;
		}
		
		return FALSE;
    }
    function insert(){
        $data = [
            'nama' => $this->input->post('nama', true),
            'alamat' => $this->input->post('alamat', true),
            'email' => $this->input->post('email', true),
            'nohp' => $this->input->post('phone', true),
            'username' => $this->input->post('username', true),
            'password' => md5($this->input->post('password', true)),
        ];
        $this->db->set('uid','UUID()',false);
        $this->db->insert($this->member, $data);
    }
    function check_member(){
        $user = $this->input->post("username", true);
        $pass = $this->input->post("password",true);
        $this->db->where('username',$user);
        $this->db->where('password',md5($pass));
        return $this->db->get($this->member);
    }
    function getmemberbyid(){
        $uid = $this->session->userdata('uid');
        return $this->db->get_where($this->member, ['uid'=>$uid])->row();
    }
    
}