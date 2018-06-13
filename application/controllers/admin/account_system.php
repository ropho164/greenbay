<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Account_system extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->config->load('globals');
		$this->load->library("pagination");
		$this->load->library('form_validation');		
		$this->lang->load('vi', 'vietnamese');		
		$this->load->model("admin/Muser");
		$this->load->model("admin/M_roles_system");
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
		$config["base_url"] = base_url() . "/admin/account_system/index/";
		$config["total_rows"] = $this->Muser->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
 
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		
		
		$data["results"] = $this->Muser->listData($config["per_page"], $page);
		
		$data["links"] = $this->pagination->create_links();
		
		$data['count'] = $this->Muser->record_count();
		$this->load->view("admin/account_system/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->Muser->delData($_POST['id']);
		$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
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
				$data = $this->Muser->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
	}
	public function addata(){
		$data["results_roles"] = $this->M_roles_system->listAllData();
		$this->load->view("admin/account_system/add",$data);
	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		# Thiết lập lại các lời báo lỗi cho từng quy tắc được thiết lập ở dưới
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('min_length', $this->lang->line('min_length'));
		$this->form_validation->set_message('max_length', $this->lang->line('max_length'));
		
		# Thiết lập các quy tắc cho từng trường trong form
		$this->form_validation->set_rules('uemail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('upassword', 'lang:password', 'trim|required|md5');
		$this->form_validation->set_rules('re_upassword', 'lang:passconf', 'trim|required|matches[upassword]|md5');
		$this->form_validation->set_rules('ufname', 'lang:acc_full_name', 'trim|required');
		$this->form_validation->set_rules('uphone', 'lang:acc_phone_number', 'required|numeric|min_length[9]|max_length[15]');
		#Kiểm tra điều kiện validate
		$b_Check = false;
		$b_Check_Ins = 0;
		
		//load permission
		$data["results_roles"] = $this->M_roles_system->listAllData();
		if($this->form_validation->run() == TRUE){
			if($this->Muser->checkExitEmail($this->input->post('uemail'))<=0){
				$data_ins = array(
					'uemail'=>$this->input->post('uemail'),
					'upassword'=>$this->input->post('upassword'),
					'ufname'=>$this->input->post('ufname'),
					'uphone'=>$this->input->post('uphone'),
					'role_id'=>$this->input->post('role_id'),
					'udate'=>date("Y-m-d"),
					'uactive'=>$this->input->post('uactive')
				);
				$b_Check_Ins = $this->db->insert("cms_user_system",$data_ins);
				$b_Check = true;
			}
			else{
				$b_Check_Ins = -1;
				$b_Check = true;
			}
		}
		else{
			
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/account_system', 'refresh');
		}
		else{
			$this->load->view("admin/account_system/add", $data);	
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data["results_roles"] = $this->M_roles_system->listAllData();	
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->Muser->getDataEdit($id);
		$this->load->view("admin/account_system/edit", $data);
	}
	public function proeditata(){
		$session_data = $this->session->userdata('logged_in');
		# Thiết lập lại các lời báo lỗi cho từng quy tắc được thiết lập ở dưới
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('min_length', $this->lang->line('min_length'));
		$this->form_validation->set_message('max_length', $this->lang->line('max_length'));
		# Thiết lập các quy tắc cho từng trường trong form
		$this->form_validation->set_rules('uemail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('upassword', 'lang:password', 'trim|md5');
		$this->form_validation->set_rules('re_upassword', 'lang:passconf', 'trim|matches[upassword]|md5');
		$this->form_validation->set_rules('ufname', 'lang:acc_full_name', 'trim|required');
		$this->form_validation->set_rules('uphone', 'lang:acc_phone_number', 'required|numeric|min_length[9]|max_length[15]');
		if($this->input->post('upassword') && $this->input->post('upassword')!=""){
			$this->form_validation->set_rules('re_upassword', 'lang:passconf', 'trim|required|matches[upassword]|md5');
		}
		$b_Check = false;
		$b_Check_Ins = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			if($this->input->post('upassword') && $this->input->post('upassword')!=""){
				$data_upd['upassword'] = $this->input->post('upassword');
			}
			$data_upd['ufname'] = $this->input->post('ufname');
			$data_upd['uphone'] = $this->input->post('uphone');
			$data_upd['role_id'] = $this->input->post('role_id');
			$data_upd['udate'] = date("Y-m-d");
			$data_upd['uactive'] = $this->input->post('uactive');
			
			if($this->input->post('idget') && $this->input->post('idget')>0){
				$this->db->where("id",$this->input->post('idget'));
				$b_Check_Ins = $this->db->update("cms_user_system",$data_upd);
			}
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/account_system', 'refresh');
		}
		else{
			$data["results_roles"] = $this->M_roles_system->listAllData();	
			$data["results_data_edit"] = $this->Muser->getDataEdit($this->input->post('idget'));
			$this->load->view("admin/account_system/edit", $data);
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