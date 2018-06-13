<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uploadify_v3 extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('admin/M_uploads');
    }

    public function index()
    {
        $this->load->view('admin/uploadify_v3');
    }

    public function do_upload()
    {
	    echo $this->M_uploads->upload_data('uploads/news/');
    }
	
}
