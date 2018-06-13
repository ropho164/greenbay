<?php
class Send_email extends CI_Controller{
  	 public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->helper("url"); 
		$this->load->helper("form"); 
		$this->load->helper("text");  
		$this->config->load('globals');
		$this->load->library('session');
		$this->load->library("pagination");
		$this->load->library('form_validation');
		$this->lang->load('vi', 'vietnamese');
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		else{
			redirect('./admin/login', 'refresh');
		}
	}
    function index(){
         $config = array(
                'protocol' => 'smtp',
				'smtp_host' => 'mail.mediagurus.vn',
				'smtp_user' => 'pho.dang@mediagurus.vn',
				'smtp_pass' => '12345!@#$%',
				'_smtp_auth' => TRUE,
				'smtp_port' => '25',
				'smtp_timeout' => '20',
				'charset' => 'utf-8',
				'mailtype' => 'html',
				'wordwrap' => FALSE,
				'validate' => FALSE,
				'priority' => 1,
				'newline' => "\r\n",
				'crlf' => "\r\n"
        );
        $this->load->library('email',$config);       
        $this->email->from('pho.dang@mediagurus.vn', 'RoPho');
        $this->email->to('songamthanh.pr@gmail.com');    
        $this->email->subject('Email testing');
        $this->email->message('Nội dung email tiếng việt');
		/*
		foreach ($list as $name => $address)
		{
			$this->email->clear();
			$this->email->to($address);
			$this->email->from('your@example.com');
			$this->email->subject('Here is your info '.$name);
			$this->email->message('Hi '.$name.' Here is the info you requested.');
			$this->email->send();
		}
		*/
        /*
        //Các dòng được thêm nè
        $path = $this->config->item('server_root');//Test đường dẫn thì echo nó ra,rùi   dùng die(); nếu hiện ra đường dẫn thì ok xóa bỏ nó
        $file = $path . '/ciexam/attachments/yourinfo.txt';
        $this->email->attach($file);
		*/
        if($this->email->send()){
        	echo "send ok";
        }
        else
        {
            show_error($this->email->print_debugger());
        }
    }
}
?>