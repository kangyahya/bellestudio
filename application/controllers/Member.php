<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model(['Global_model'=>'global','Member_model'=>'member','Reservation_model'=>'reserve']);
	}
	public function index()
	{
		$this->load->view('member/register');
    }
    public function login(){
        if($this->session->userdata('logged')=="logged"){
            redirect();
        }else{
            $this->form_validation->set_rules("username","Username","required");
            $this->form_validation->set_rules("password","Passowrd","required");
            if($this->form_validation->run()==true){
                $check = $this->member->check_member();
                if($check->num_rows()>0){
                    foreach($check->result_array() as $row){
                        $dataArray["username"] = $row['username'];
                        $dataArray["nama"] = $row['nama'];
                        $dataArray["alamat"] = $row['alamat'];
                        $dataArray["hp"] = $row['nohp'];
                        $dataArray["uid"] = $row['uid'];
                        $dataArray["logged"] = "logged";
                    }
                    $this->session->set_userdata($dataArray);
                    redirect();
                }else{
                    redirect('login');
                }
            }
                $this->load->view('member/login');
            
        }
    }
    public function reservation($id=null){
        if($this->session->userdata('logged')=="logged"){
            if(!empty($id)){
                $this->form_validation->set_rules('uid_paket', 'UID Paket','required');
                if($this->form_validation->run() == false){
                    $data['member'] = $this->member->getmemberbyid();
                    $data['paket'] = $this->global->getpaketbyid($this->session->userdata('shopping_cart'));
                    $data['tambahan'] = $this->global->gettambahanbypaket(['uid_paket'=>$data['paket']->uid]);
                    $data['notes'] = $this->global->getNoteByPaket(['uid_paket'=>$data['paket']->uid]);
                    $data['kategori'] =  $this->global->getKategoriById(['id'=>$data['paket']->id_kategori])->row();
                    $data['paket_kategori'] = $this->global->getpaketbynotid($id);
                    $this->load->view('home/detail_paket', $data);
                }else{
                    $this->reserve->insert();
                }
                
            }else{
                $data['list'] = $this->reserve->getAllbyMember();
                $data['paket'] = $this->global->getpaketbyid($this->session->userdata('shopping_cart'));
                $data['tambahan'] = $this->global->gettambahanbypaket(['uid_paket'=>$data['paket']->uid]);
                $data['temporary'] = $this->db->get_where('v_temp',['uid_member'=>$this->session->userdata('uid'),'uid_paket'=>$data['paket']->uid]);
                $this->load->view('reservation/reservation',$data);
            }
        }else{
            redirect("register");
        }
    }
    public function paket($id=null){
            if(!empty($id)){
                $this->form_validation->set_rules('uid_paket', 'UID Paket','required');
                if($this->form_validation->run() == false){
                    $data['member'] = $this->member->getmemberbyid();
                    $data['paket'] = $this->global->getpaketbyid($id);
                    $data['tambahan'] = $this->global->gettambahanbypaket(['uid_paket'=>$data['paket']->uid]);
                    $data['notes'] = $this->global->getNoteByPaket(['uid_paket'=>$data['paket']->uid]);
                    $data['kategori'] =  $this->global->getKategoriById(['id'=>$data['paket']->id_kategori])->row();
                    $data['paket_kategori'] = $this->global->getpaketbynotid($id);
                    $this->load->view('home/detail_paket', $data);
                }else{
                    $this->reserve->insert();
                }
                
            }else{
                $data['list'] = $this->reserve->getAllbyMember();
                $this->load->view('member/list_reservation',$data);
            }
        
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect();
    }
    public function register()
	{
        $this->rules_member();
        if($this->form_validation->run() == false){
            $this->load->view('member/register');
        }else{
            $this->member->insert();
            redirect('login');
        }
		
    }
    public function manageShoppingCart()
    {
        $this->session->set_userdata('shopping_cart', $this->input->post('id_paket'));
        redirect('reservation');
    }
    public function manageCheckout()
    {
        redirect('checkout');
    }
    
    public function sendtambahan(){
        $data = [
            'uid_paket' => $this->session->userdata('shopping_cart'),
            'uid_member' => $this->session->userdata('uid'),
            'uid_tambahan' => $this->input->post('id'),
        ];
        $this->db->insert('tmp_reservation',$data);
        redirect('reservation','refresh');
    }
    public function hapustambahan(){
        $this->db->where('uid_tambahan',$this->input->post('id'));
        $this->db->where('uid_member',$this->session->userdata('uid'));
        $this->db->delete('tmp_reservation');
        redirect('reservation','refresh');
    }
    function get_username_availability() {
		if (isset($_POST['username'])) {
			$username = $_POST['username'];
			$results = $this->member->get_username($username);
			if ($results === TRUE) {
				echo '<span style="color:red;">Username unavailable</span>';
			} else {
				echo '<span style="color:green;">Username available</span>';
			}
		} else {
			echo '<span style="color:red;">Username is required field.</span>';
		}
    }
    function rules_member(){
        $this->form_validation->set_rules('nama',"Nama",'required');
        $this->form_validation->set_rules('alamat',"alamat",'required');
        $this->form_validation->set_rules('email',"Email",'required');
        $this->form_validation->set_rules('phone',"Phone",'required');
        $this->form_validation->set_rules('username',"Username",'required');
        $this->form_validation->set_rules('password',"Passowrd",'required');
    }
}
