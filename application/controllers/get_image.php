<?php
if ( !defined('BASEPATH') )
	exit('No direct script access allowed');

class Get_image extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->helper(array('form', 'url', 'date','text','file','directory','path'));
		$this->load->library('session');
		$this->config->load('globals');
		$this->load->library("pagination");
		$this->load->library('form_validation');		
		$this->lang->load('vi', 'vietnamese');
	}
    public function files(){
	  $opts = array(
	    'roots' => array(
	      array( 
	        'driver' => 'LocalFileSystem', 
	        'path'   => set_realpath(realpath(APPPATH.'../uploads')), 
	        'URL'    => base_url() . 'uploads/',
			'AccessControl' => 'Access',
		  	'fileURL'       => true,
		  	'plugin' => array(
                'Sanitizer' => array(
                    'enable' => true,
                    'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
                    'replace'  => '_'    // replace to this
                )
            )
	        // more elFinder options here
	      ) 
	    )
	  );
	  $this->load->library('elfinder_lib', $opts);
	}
}