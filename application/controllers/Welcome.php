<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model(['Global_model'=>'global']);
	}
	public function index()
	{
		$x['paket'] = $this->global->view_paket();
		$this->load->view('homepage',$x);
	}
}
