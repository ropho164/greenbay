<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_infocontact extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->helper(array('form', 'url', 'date','text','file','directory'));
		$this->load->library('session');
		$this->config->load('globals');
		$this->load->library("pagination");
		$this->load->library('form_validation');		
		$this->lang->load('vi', 'vietnamese');
		$this->load->helper('ckeditor');
		$this->load->model("admin/M_infocontact");
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
		$config["base_url"] = base_url() . "/admin/c_infocontact/index/";
		$config["total_rows"] = $this->M_infocontact->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		$data["results"] = $this->M_infocontact->listData($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['count'] = $this->M_infocontact->record_count();
		$this->session->unset_userdata('page_back_link');
		$this->session->set_userdata('page_back_link',current_url());
		$this->load->view("admin/info_contact/list", $data);
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
		$config["base_url"] = base_url() . "/admin/c_infocontact/fillter/".$idgroup;
		$config["total_rows"] = $this->M_infocontact->record_count_fillter($idgroup);
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment_fillter');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
		$page = ($this->uri->segment($this->config->item('page_fillter'))) ? $this->uri->segment($this->config->item('page_fillter')) : 0;
		$data["results"] = $this->M_infocontact->listDataFillter($config["per_page"], $page, $idgroup);
		$data["links"] = $this->pagination->create_links();
		$data['count'] = $this->M_infocontact->record_count_fillter($idgroup);
		$this->session->unset_userdata('page_back_link');
		$this->session->set_userdata('page_back_link',current_url());
		$this->load->view("admin/info_contact/list", $data);
	}
	public function addata(){
		$session_data = $this->session->userdata('logged_in');
		$data['ckeditor'] = array(		
			'id' 	=> 	'info_content',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"Small",
				'width' 	=> 	"700px",
				'height' 	=> 	'200px',				
			)
		);
		$data['ckeditor1'] = array(		
			'id' 	=> 	'info_content_office',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"Small",
				'width' 	=> 	"700px",
				'height' 	=> 	'200px',				
			)
		);
		if($this->session->userdata('logged_in')){
			$this->load->view("admin/info_contact/add",$data);
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		if($this->session->userdata('logged_in')){
			$this->form_validation->set_message('required', $this->lang->line('required'));
			$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
			$this->form_validation->set_rules('info_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('info_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('info_title_office', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('info_content_office', 'lang:article_content', 'trim|required');
			$b_Check = false;
			$b_Check_Ins = 0;
			if($this->form_validation->run() == TRUE){
				$data_ins = array(
					'article_langue'=>$this->input->post('article_langue'),
					'info_title'=>$this->input->post('info_title'),
					'info_content'=>$this->input->post('info_content'),
					'info_title_office'=>$this->input->post('info_title_office'),
					'info_content_office'=>$this->input->post('info_content_office')
				);
				$b_Check_Ins = $this->M_infocontact->insData($data_ins);
				$b_Check = true;
			}
			$data['ckeditor'] = array(		
				'id' 	=> 	'info_content',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"Small",
					'width' 	=> 	"700px",
					'height' 	=> 	'200px',				
				)
			);
			$data['ckeditor1'] = array(		
				'id' 	=> 	'info_content_office',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"Small",
					'width' 	=> 	"700px",
					'height' 	=> 	'200px',				
				)
			);
			$data['b_Check']= $b_Check;
			$data['b_Check_Ins']= $b_Check_Ins;
			if($b_Check && $b_Check_Ins==1){
				redirect($this->session->userdata('page_back_link'), 'refresh');
			}
			else{
				$this->load->view("admin/info_contact/add", $data);	
			}
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function editdata(){
		if($this->session->userdata('logged_in')){			
			$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
			$data['ckeditor'] = array(		
				'id' 	=> 	'info_content',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"Small",
					'width' 	=> 	"700px",
					'height' 	=> 	'200px',				
				)
			);
			$data['ckeditor1'] = array(		
				'id' 	=> 	'info_content_office',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"Small",
					'width' 	=> 	"700px",
					'height' 	=> 	'200px',				
				)
			);
			$data["results_data_edit"] = $this->M_infocontact->getDataEdit($id);
			$this->load->view("admin/info_contact/edit", $data);
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function proeditdata(){
		$session_data = $this->session->userdata('logged_in');
		if($this->session->userdata('logged_in')){
			$this->form_validation->set_message('required', $this->lang->line('required'));
			$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
			$this->form_validation->set_rules('info_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('info_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('info_title_office', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('info_content_office', 'lang:article_content', 'trim|required');
			$b_Check = false;
			$b_Check_Ins = 0;
			if($this->form_validation->run() == TRUE){
				$data_upd = array(
					'article_langue'=>$this->input->post('article_langue'),
					'info_title'=>$this->input->post('info_title'),
					'info_content'=>$this->input->post('info_content'),
					'info_title_office'=>$this->input->post('info_title_office'),
					'info_content_office'=>$this->input->post('info_content_office')
					
				);
				if($this->input->post('idget')>0 && $this->input->post('idget')){
					$b_Check_Ins = $this->M_infocontact->updateData($this->input->post('idget'),$data_upd);
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
					'id' 	=> 	'info_content',
					'path'	=>	'templates/js/ckeditor',			
					'config' => array(
						'toolbar' 	=> 	"Small",
						'width' 	=> 	"700px",
						'height' 	=> 	'200px',				
					)
				);
				$data['ckeditor1'] = array(		
					'id' 	=> 	'info_content_office',
					'path'	=>	'templates/js/ckeditor',			
					'config' => array(
						'toolbar' 	=> 	"Small",
						'width' 	=> 	"700px",
						'height' 	=> 	'200px',				
					)
				);
				$data["results_data_edit"] = $this->M_infocontact->getDataEdit($this->input->post('idget'));
				$this->load->view("admin/info_contact/edit", $data);	
			}
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function getMainMenuLeft(){
		return $this->M_main_menu->listAllDataActive(1);
	}
	public function getSubMenuLeft($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
}
?>