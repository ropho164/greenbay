<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Roles_system extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->config->load('globals');
		$this->load->library("pagination");
		$this->load->library('form_validation');
		
		$this->lang->load('vi', 'vietnamese');
		
		$this->load->model("admin/M_roles_system");	
	}
	public function index()
	{	
		if($this->session->userdata('logged_in')){  	
			$config = array();
			$config["first_link"]           = 'First';
			$config["next_link"]            = '&gt;';
			$config["prev_link"]            = '&lt;';
			$config["last_link"]            = 'Last';
			$config["base_url"] = base_url() . "/admin/roles_system/index/";
			$config["total_rows"] = $this->M_roles_system->record_count();
			$config["per_page"] = $this->config->item('per_page');
			$config["uri_segment"] = $this->config->item('uri_segment');
			$config["num_links"]			=  $this->config->item('num_links');
			$this->pagination->initialize($config);
	 
			$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
			
			
			$data["results"] = $this->M_roles_system->listData($config["per_page"], $page);
			
			$data["links"] = $this->pagination->create_links();
			
			$data['count'] = $this->M_roles_system->record_count();
			$this->load->view("admin/roles_system/list", $data);
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function delrecord()
	{
		if($this->session->userdata('logged_in')){			
			$data = $this->M_roles_system->delData($_POST['id']);
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function delmultirecord()
	{
		if($this->session->userdata('logged_in')){			
			if($this->input->post('delete'))
			{
				$checkbox = $this->input->post('checkbox');
				for($i=0;$i<count($this->input->post('checkbox'));$i++)
				{
					$data = $this->M_roles_system->delData($checkbox[$i]);
					if($data==0){
						break;	
					}
				}
				$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
				$this->output->set_output($data);
			}
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function addata(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in')){
			$this->load->view("admin/roles_system/add");
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function proaddata(){
		if($this->session->userdata('logged_in')){
			$this->form_validation->set_message('required', $this->lang->line('required'));
			$this->form_validation->set_rules('role_name', 'lang:permission_name', 'trim|required|xss_clean');
			$b_Check = false;
			$b_Check_Ins = 0;
			if($this->form_validation->run() == TRUE){
				$data_ins = array(
					'role_name'=>$this->input->post('role_name')
				);
				$b_Check_Ins = $this->db->insert("cms_role_system",$data_ins);
				$b_Check = true;
			}
			$data['b_Check']= $b_Check;
			$data['b_Check_Ins']= $b_Check_Ins;
			if($b_Check && $b_Check_Ins==1){
				redirect('./admin/roles_system', 'refresh');
			}
			else{
				$this->load->view("admin/roles_system/add", $data);	
			}
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	
	public function editdata(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		if($this->session->userdata('logged_in')){			
			$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
			$data["results_data_edit"] = $this->M_roles_system->getDataEdit($id);
			$this->load->view("admin/roles_system/edit", $data);
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function proeditdata(){
		if($this->session->userdata('logged_in')){
			$this->form_validation->set_message('required', $this->lang->line('required'));
			$this->form_validation->set_rules('role_name', 'lang:permission_name', 'trim|required|xss_clean');
			$b_Check = false;
			$b_Check_Ins = 0;
			if($this->form_validation->run() == TRUE){
				$data_upd = array(
					'role_name'=>$this->input->post('role_name')
				);
				if($this->input->post('idget')>0 && $this->input->post('idget')){
					$this->db->where("id",$this->input->post('idget'));
					$b_Check_Ins = $this->db->update("cms_role_system",$data_upd);
				}
				$b_Check = true;
			}
			$data['b_Check']= $b_Check;
			$data['b_Check_Ins']= $b_Check_Ins;
			if($b_Check && $b_Check_Ins==1){
				redirect('./admin/roles_system', 'refresh');
			}
			else{
				$data["results_data_edit"] = $this->M_roles_system->getDataEdit($this->input->post('idget'));
				$this->load->view("admin/roles_system/edit", $data);	
			}
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
}
?>