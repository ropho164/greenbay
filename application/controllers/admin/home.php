<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->helper('date');
		$this->load->model("admin/Muser");
		$this->load->model("admin/M_roles_system");
		$this->load->model("admin/M_main_menu");
		$this->load->model("admin/M_sub_menu");
	}
	public function index(){
		//var_dump($this->session->all_userdata()); 
		//var_dump($this->session->userdata('logged_in')); 
		if($this->session->userdata('logged_in')){
				$this->load->view("admin/home/home_view");
		}
		else{
			redirect(base_url().'admin/login/', 'refresh');	
		}
	}
	public function getMainMenuLeft(){
		return $this->M_main_menu->listAllDataActive(1);
	}
	public function getSubMenuLeft($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
	public function logout(){
		//$this->session->sess_destroy();
		$this->session->unset_userdata('logged_in');
		redirect(base_url().'admin/login/', 'refresh');	
    }
}
?>