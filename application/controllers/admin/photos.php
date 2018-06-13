<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Photos extends CI_Controller {
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
		$this->load->helper('ckeditor');
		$this->load->model("admin/M_photos");
		$this->load->model("admin/M_main_menu");
		$this->load->model("admin/M_sub_menu");
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		else{
			redirect('./admin/login', 'refresh');
		}
	}
	public function index()
	{	
		$session_data = $this->session->userdata('logged_in');
		$config = array();
		$config["first_link"]           = 'First';
		$config["next_link"]            = '&gt;';
		$config["prev_link"]            = '&lt;';
		$config["last_link"]            = 'Last';
		$config["base_url"] = base_url() . "/admin/photos/index/";
		$config["total_rows"] = $this->M_photos->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		$data["results"] = $this->M_photos->listData($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['count'] = $this->M_photos->record_count();
		$this->session->unset_userdata('page_back_link');
		$this->session->set_userdata('page_back_link',current_url());
		$this->load->view("admin/photos/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_photos->delData($_POST['id']);
		$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
		$this->output->set_output($data);
	}
	public function delmultirecord()
	{
		$session_data = $this->session->userdata('logged_in');
		if($_POST['delete'])
		{
			$checkbox = $_POST['checkbox'];
			for($i=0;$i<count($_POST['checkbox']);$i++)
			{
				$data = $this->M_photos->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
			$this->output->set_output($data);
		}
	}
	public function addata(){
		$session_data = $this->session->userdata('logged_in');
		$data['count'] = $this->M_photos->record_count();
		$data["list_photo"] = NULL;
		$this->load->view("admin/photos/add", $data);
	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$b_Check = false;
		$b_Check_Ins = 0;
		if(count($this->input->post('slidephoto'))>0){
			$maxOd = $this->M_photos->getMaxOrder();
			$slidephoto = $this->input->post('slidephoto');
			$slidephoto_order = $this->input->post('slidephotoorder');
			for($i=0;$i<count($this->input->post('slidephoto'));$i++)
			{
				if($slidephoto[$i] != NULL && $slidephoto[$i] != ""){
					$order_photo = $slidephoto_order[$i]?$slidephoto_order[$i]:0;
					$data_ins_photo = array(
						'uid'=>$session_data['id'],
						'article_picture_1'=>$slidephoto[$i],
						'article_post_date'=>date("Y-m-d"),
						'order_article'=>$order_photo+$maxOd
					);
					$b_Check_Ins = $this->db->insert("cms_articles_photos",$data_ins_photo);
				}
			}
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect($this->session->userdata('page_back_link'), 'refresh');
		}
		else{
			$data["list_photo"] = array();
			if($this->input->post('slidephoto')){
				if(count($this->input->post('slidephoto'))>0){
					$slidephoto = $_POST['slidephoto'];
					for($i=0;$i<count($_POST['slidephoto']);$i++)
					{
						array_push($data["list_photo"], $slidephoto[$i]);
					}
				}
			}
			$data['count'] = $this->M_photos->record_count();
			$this->load->view("admin/photos/add", $data);	
		}
	}
	public function updOrder(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('order_article', 'lang:category_order', 'trim|required|numeric');
		$data = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			$data_upd = array('order_article'=>$this->input->post('order_article'));
			if($this->input->post('id')>0 && $this->input->post('id')){
				$where = array('id' => $this->input->post("id"));
				$this->db->where($where); 
				$data = $this->db->update("cms_articles_photos",$data_upd);
			}
			else{
				$data = -1;				
			}
		}
		else{
			$data = -2;
		}
		$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
		$this->output->set_output($data);
	}
	public function getMainMenuLeft(){
		return $this->M_main_menu->listAllDataActive(1);
	}
	public function getSubMenuLeft($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
}