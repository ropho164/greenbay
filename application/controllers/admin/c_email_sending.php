<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_email_sending extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->config->load('globals');
		$this->load->library("pagination");
		$this->load->library('form_validation');		
		$this->lang->load('vi', 'vietnamese');
		$this->load->model("admin/M_email_sending");
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
		$config["base_url"] = base_url() . "/admin/c_email_sending/index/";
		$config["total_rows"] = $this->M_email_sending->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
 
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		
		
		$data["results"] = $this->M_email_sending->listData($config["per_page"], $page);
		
		$data["links"] = $this->pagination->create_links();
		
		$data['count'] = $this->M_email_sending->record_count();
		$this->load->view("admin/v_email_sending/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_email_sending->delData($_POST['id']);
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
				$data = $this->M_email_sending->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
	}
	public function addata(){
		$this->load->view("admin/v_email_sending/add");
	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		# Thiết lập lại các lời báo lỗi cho từng quy tắc được thiết lập ở dưới
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		
		# Thiết lập các quy tắc cho từng trường trong form
		$this->form_validation->set_rules('smtp_name', '', 'trim|required');
		$this->form_validation->set_rules('smtp_user', '', 'required|valid_email');
		$this->form_validation->set_rules('smtp_pass', '', 'trim|required');
		$this->form_validation->set_rules('smtp_host', '', 'required|trim');
		$this->form_validation->set_rules('smtp_port', '', 'required|numeric');
		#Kiểm tra điều kiện validate
		$b_Check = false;
		$b_Check_Ins = 0;
		//load permission
		if($this->form_validation->run() == TRUE){
			if($this->M_email_sending->checkExitEmail(0,$this->input->post('smtp_user'))<=0){
				if($this->input->post('is_send_news')==1){
					$data_upd_reset = array(
						'is_send_news'=>0
					);
					$this->db->update("cms_mail_sending",$data_upd_reset);
				}
				$data_ins = array(
					'smtp_name'=>$this->input->post('smtp_name'),
					'smtp_user'=>$this->input->post('smtp_user'),
					'smtp_pass'=>$this->input->post('smtp_pass'),
					'smtp_host'=>$this->input->post('smtp_host'),
					'smtp_port'=>$this->input->post('smtp_port'),
					'is_send_news'=>$this->input->post('is_send_news')
				);
				$b_Check_Ins = $this->db->insert("cms_mail_sending",$data_ins);
				$b_Check = true;
			}
			else{
				$b_Check_Ins = -1;
				$b_Check = true;
			}
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/c_email_sending', 'refresh');
		}
		else{
			$this->load->view("admin/v_email_sending/add", $data);	
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->M_email_sending->getDataEdit($id);
		$this->load->view("admin/v_email_sending/edit", $data);
	}
	public function proeditata(){
		$session_data = $this->session->userdata('logged_in');
		# Thiết lập lại các lời báo lỗi cho từng quy tắc được thiết lập ở dưới
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		
		# Thiết lập các quy tắc cho từng trường trong form
		$this->form_validation->set_rules('smtp_name', '', 'trim|required');
		$this->form_validation->set_rules('smtp_user', '', 'required|valid_email');
		$this->form_validation->set_rules('smtp_pass', '', 'trim|required');
		$this->form_validation->set_rules('smtp_host', '', 'required|trim');
		$this->form_validation->set_rules('smtp_port', '', 'required|numeric');
		$b_Check = false;
		$b_Check_Ins = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			if($this->input->post('idget') && $this->input->post('idget')>0){
				if($this->M_email_sending->checkExitEmail($this->input->post('idget'),$this->input->post('smtp_user'))<=0){
					if($this->input->post('is_send_news')==1){
						$data_upd_reset = array(
							'is_send_news'=>0
						);
						$this->db->update("cms_mail_sending",$data_upd_reset);
					}
					$data_upd = array(
						'smtp_name'=>$this->input->post('smtp_name'),
						'smtp_user'=>$this->input->post('smtp_user'),
						'smtp_pass'=>$this->input->post('smtp_pass'),
						'smtp_host'=>$this->input->post('smtp_host'),
						'smtp_port'=>$this->input->post('smtp_port'),
						'is_send_news'=>$this->input->post('is_send_news')
					);
					$this->db->where("id",$this->input->post('idget'));
					$b_Check_Ins = $this->db->update("cms_mail_sending",$data_upd);
					$b_Check = true;
				}
				else{
					$b_Check_Ins = -1;
					$b_Check = true;
				}
			}
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/c_email_sending', 'refresh');
		}
		else{
			$data["results_data_edit"] = $this->M_email_sending->getDataEdit($this->input->post('idget'));
			$this->load->view("admin/v_email_sending/edit", $data);
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