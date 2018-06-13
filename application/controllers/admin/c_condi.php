<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_condi extends CI_Controller {
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
		$this->load->model("admin/M_condi");
		$this->load->model("admin/M_main_menu");
		$this->load->model("admin/M_sub_menu");
		$this->load->helper('ckeditor');
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
		$config["base_url"] = base_url() . "/admin/c_condi/index/";
		$config["total_rows"] = $this->M_condi->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		$data["results"] = $this->M_condi->listData($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['count'] = $this->M_condi->record_count();
		$this->session->unset_userdata('page_back_link');
		$this->session->set_userdata('page_back_link',current_url());
		$this->load->view("admin/v_condi/list", $data);
	}
	public function fillter()
	{	
		$session_data = $this->session->userdata('logged_in');
		$idgroup = ($this->uri->segment($this->config->item('idgroup'))) ? $this->uri->segment($this->config->item('idgroup')) : '';
		$config = array();
		$config["first_link"]           = 'First';
		$config["next_link"]            = '&gt;';
		$config["prev_link"]            = '&lt;';
		$config["last_link"]            = 'Last';
		$config["base_url"] = base_url() . "/admin/c_condi/fillter/".$idgroup;
		$config["total_rows"] = $this->M_condi->record_count_fillter($idgroup);
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment_fillter');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
		$page = ($this->uri->segment($this->config->item('page_fillter'))) ? $this->uri->segment($this->config->item('page_fillter')) : 0;
		$data["results"] = $this->M_condi->listDataFillter($config["per_page"], $page, $idgroup);
		$data["links"] = $this->pagination->create_links();
		$data['count'] = $this->M_condi->record_count_fillter($idgroup);
		$this->session->unset_userdata('page_back_link');
		$this->session->set_userdata('page_back_link',current_url());
		$this->load->view("admin/v_condi/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_condi->delData($_POST['id']);
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
				$data = $this->M_condi->delData($checkbox[$i]);
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
		$data['ckeditor'] = array(		
			'id' 	=> 	'trade_content',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"FULL",
				'width' 	=> 	"700px",
				'height' 	=> 	'350px',
			)
		);
		$this->load->view("admin/v_condi/add", $data);
	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('seo_title', 'lang:article_seo_title', 'trim|required');
		$this->form_validation->set_rules('trade_key', 'lang:title_seo', 'trim|required');
		$this->form_validation->set_rules('trade_desc', 'lang:article_des_seo', 'trim|required');
		$this->form_validation->set_rules('trade_title', 'lang:title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('trade_content', 'lang:article_content', 'trim|required');
		$this->form_validation->set_rules('article_langue', '', 'trim|required');
		$this->form_validation->set_rules('trade_active', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('group_id', 'lang:lang_orther_num', 'numeric');
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_ins = array(
				'uid'=>$session_data['id'],
				'article_langue'=>$this->input->post('article_langue'),
				'trade_lnk'=>mb_strtolower(url_title(removesign($this->input->post('trade_title')))),
				'seo_title'=>removeDauNhayKep($this->input->post('seo_title')),
				'trade_key'=>removeDauNhayKep($this->input->post('trade_key')),
				'trade_desc'=>removeDauNhayKep($this->input->post('trade_desc')),
				'trade_title'=>removeDauNhayKep($this->input->post('trade_title')),				
				'trade_content'=>str_replace("&nbsp;", " ", $this->input->post('trade_content')),
				'trade_date'=>$this->input->post('trade_date'),
				'trade_active'=>$this->input->post('trade_active'),
				'group_id'=>$this->input->post('group_id')
			);
			$b_Check_Ins = $this->db->insert("cms_condi_content",$data_ins);
			if($b_Check_Ins==1){
				$b_Check = true;
			}
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect($this->session->userdata('page_back_link'), 'refresh');
		}
		else{
			$data['ckeditor'] = array(		
				'id' 	=> 	'trade_content',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"FULL",
					'width' 	=> 	"700px",
					'height' 	=> 	'350px',
				)
			);
			$this->load->view("admin/v_condi/add", $data);	
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->M_condi->getDataEdit($id);
		$data['ckeditor'] = array(		
			'id' 	=> 	'trade_content',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"FULL",
				'width' 	=> 	"700px",
				'height' 	=> 	'350px',
			)
		);
		$this->load->view("admin/v_condi/edit", $data);
	}
	public function proeditdata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('seo_title', 'lang:article_seo_title', 'trim|required');
		$this->form_validation->set_rules('trade_key', 'lang:title_seo', 'trim|required');
		$this->form_validation->set_rules('trade_desc', 'lang:article_des_seo', 'trim|required');
		$this->form_validation->set_rules('trade_title', 'lang:title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('trade_content', 'lang:article_content', 'trim|required');
		$this->form_validation->set_rules('article_langue', '', 'trim|required');
		$this->form_validation->set_rules('trade_active', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('group_id', 'lang:lang_orther_num', 'numeric');
		
		$b_Check = false;
		$b_Check_Ins = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			$data_upd = array(
				'uid'=>$session_data['id'],
				'article_langue'=>$this->input->post('article_langue'),
				'trade_lnk'=>mb_strtolower(url_title(removesign($this->input->post('trade_title')))),
				'seo_title'=>removeDauNhayKep($this->input->post('seo_title')),
				'trade_key'=>removeDauNhayKep($this->input->post('trade_key')),
				'trade_desc'=>removeDauNhayKep($this->input->post('trade_desc')),
				'trade_title'=>removeDauNhayKep($this->input->post('trade_title')),				
				'trade_content'=>str_replace("&nbsp;", " ", $this->input->post('trade_content')),
				'trade_date'=>$this->input->post('trade_date'),
				'trade_active'=>$this->input->post('trade_active'),
				'group_id'=>$this->input->post('group_id')
			);
			
			if($this->input->post('idget') && $this->input->post('idget')>0){
				$where = array('id' => $this->input->post("idget"));
				$this->db->where($where); 
				$b_Check_Ins = $this->db->update("cms_condi_content",$data_upd);
			}
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect($this->session->userdata('page_back_link'), 'refresh');
		}
		else{
			$data['ckeditor'] = array(		
				'id' 	=> 	'trade_content',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"FULL",
					'width' 	=> 	"700px",
					'height' 	=> 	'350px',
				)
			);
			$data["results_data_edit"] = $this->M_condi->getDataEdit($this->input->post('idget'));
			$this->load->view("admin/v_condi/edit", $data);
		}
	}
	public function getMainMenuLeft(){
		return $this->M_main_menu->listAllDataActive(1);
	}
	public function getSubMenuLeft($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
}