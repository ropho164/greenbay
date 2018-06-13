<?php
if ( !defined('BASEPATH') )
	exit('No direct script access allowed');

class C_fileup extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->helper(array('form', 'url', 'date','text','file','directory','path'));
		$this->load->library('session');
		$this->config->load('globals');
		$this->load->library("pagination");
		$this->load->library('form_validation');		
		$this->lang->load('vi', 'vietnamese');
		$this->load->model("admin/M_main_menu");
		$this->load->model("admin/M_sub_menu");
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		else{
			redirect('./admin/login', 'refresh');
		}
	}
	public function index(){
		$data["session_data"] = $this->session->userdata('logged_in');
		if($data["session_data"]){
			$this->load->view('admin/elfinder',$data);	
		}
		else{
			redirect('./admin/login', 'refresh');
		}
		
	}
    public function elfinder_init(){
	  $opts = array(
	    // 'debug' => true, 
	    'roots' => array(
	      array( 
	        'driver' => 'LocalFileSystem', 
	        'path'   => set_realpath(realpath(APPPATH.'../uploads')), 
	        'URL'    => base_url() . 'uploads/',
			'AccessControl' => 'Access'
	        // more elFinder options here
	      ),
		  array(
		  	'alias'         => 'Templates Images',
	        'driver' => 'LocalFileSystem', 
	        'path'   => set_realpath(realpath(APPPATH.'../templates/website/images/')), 
	        'URL'    => base_url() . 'templates/website/images/',
			'AccessControl' => 'Access'
	        // more elFinder options here
	      ),
		  array(
		  	'alias'         => 'Templates CSS',
	        'driver' => 'LocalFileSystem', 
	        'path'   => set_realpath(realpath(APPPATH.'../templates/website/css/')), 
	        'URL'    => base_url() . 'templates/website/css/',
			'AccessControl' => 'Access'
	        // more elFinder options here
	      )
	    )
	  );
	  $this->load->library('elfinder_lib', $opts);
	}
	public function getMainMenuLeft(){
		return $this->M_main_menu->listAllDataActive(1);
	}
	public function getSubMenuLeft($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
}