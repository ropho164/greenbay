<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_contact extends CI_Controller {
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
		$this->load->model("admin/M_contact");
		$this->load->model("admin/M_email_sending");
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
		$config["base_url"] = base_url() . "/admin/c_contact/index/";
		$config["total_rows"] = $this->M_contact->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
 
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		
		
		$data["results"] = $this->M_contact->listData($config["per_page"], $page);
		
		$data["links"] = $this->pagination->create_links();
		
		$data['count'] = $this->M_contact->record_count();
		$this->load->view("admin/v_contact/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_contact->delData($this->input->post('id'));
		$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
		$this->output->set_output($data);
	}
	public function delmultirecord()
	{
		$session_data = $this->session->userdata('logged_in');
		if($this->input->post('delete'))
		{
			$checkbox = $this->input->post('checkbox');
			for($i=0;$i<count($this->input->post('checkbox'));$i++)
			{
				$data = $this->M_contact->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
	}
	public function editdata(){
		if($this->session->userdata('logged_in')){			
			$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
			$data["results_data_edit"] = $this->M_contact->getDataEdit($id);
			$this->load->view("admin/v_contact/edit", $data);
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
			//$this->form_validation->set_rules('cus_title', '', 'required');
			$this->form_validation->set_rules('cus_cont', '', 'required');
			$this->form_validation->set_rules('cus_status', 'lang:lang_orther_num', 'numeric');
			$b_Check = false;
			$b_Check_Ins = 0;
			if($this->form_validation->run() == TRUE){
				$data_upd = array(
					//'cus_title'=>$this->input->post('cus_title'),
					'cus_cont'=>$this->input->post('cus_cont'),
					'cus_note'=>$this->input->post('cus_note'),
					'cus_status'=>$this->input->post('cus_status')
				);
				if($this->input->post('idget')>0 && $this->input->post('idget')){
					$this->db->where("id",$this->input->post('idget'));
					$b_Check_Ins = $this->db->update("cms_contact",$data_upd);
				}
				$b_Check = true;
			}
			$data['b_Check']= $b_Check;
			$data['b_Check_Ins']= $b_Check_Ins;
			if($b_Check && $b_Check_Ins==1){
				redirect('./admin/c_contact', 'refresh');
			}
			else{
				$data["results_data_edit"] = $this->M_contact->getDataEdit($this->input->post('idget'));
				$this->load->view("admin/v_contact/edit", $data);	
			}
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function ansdata(){
		$data['ckeditor'] = array(		
			'id' 	=> 	'cus_cont_ans',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"FULL",
				'width' 	=> 	"90%",
				'height' 	=> 	'250px',
			)
		);
		if($this->session->userdata('logged_in')){			
			$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
			$data["results_data_edit"] = $this->M_contact->getDataEdit($id);
			$this->load->view("admin/v_contact/ans", $data);
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function proansdata(){
		$session_data = $this->session->userdata('logged_in');
		$data['ckeditor'] = array(		
			'id' 	=> 	'cus_cont_ans',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"FULL",
				'width' 	=> 	"90%",
				'height' 	=> 	'250px',
			)
		);
		if($this->session->userdata('logged_in')){
			$this->form_validation->set_message('required', $this->lang->line('required'));
			$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
			$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
			$this->form_validation->set_rules('cus_mail_to', '', 'required|valid_email');
			$this->form_validation->set_rules('cus_title_ans', '', 'required');
			$this->form_validation->set_rules('cus_cont_ans', '', 'required');
			$this->form_validation->set_rules('slFunction', '', 'numeric');
			
			$b_Check = false;
			$b_Check_Ins = 0;
			if($this->form_validation->run() == TRUE){
				if($this->input->post('slFunction')==1){
					$idemail = $this->input->post('slEmail')?$this->input->post('slEmail'):0;
					$results_data_email = $this->M_email_sending->getDataEdit($idemail);
					if($results_data_email && sizeof($results_data_email)>0){
						$config_email = array(
								'protocol' => 'smtp',
								'smtp_host' => $results_data_email[0]['smtp_host'],
								'smtp_user' => $results_data_email[0]['smtp_user'],
								'smtp_pass' => $results_data_email[0]['smtp_pass'],
								'_smtp_auth' => TRUE,
								'smtp_port' => $results_data_email[0]['smtp_port'],
								'smtp_timeout' => '30',
								'charset' => 'utf-8',
								'mailtype' => 'html',
								'wordwrap' => FALSE,
								'validate' => FALSE,
								'priority' => 1,
								'newline' => "\r\n",
								'crlf' => "\r\n"
						);
						$this->load->library('email',$config_email);       
						$this->email->from($results_data_email[0]['smtp_user'], $results_data_email[0]['smtp_name']);
						$this->email->to($this->input->post('cus_mail_to'));    
						$this->email->subject($this->input->post('cus_title_ans'));
						$this->email->message(html_entity_decode($this->input->post('cus_cont_ans')));
						if($this->email->send()){
							$data_upd = array(
								'cus_title_ans'=>$this->input->post('cus_title_ans'),
								'cus_cont_ans'=>$this->input->post('cus_cont_ans'),
								'cus_status'=>1
							);
							if($this->input->post('idget')>0 && $this->input->post('idget')){
								$this->db->where("id",$this->input->post('idget'));
								$b_Check_Ins = $this->db->update("cms_contact",$data_upd);
							}
						}
						else
						{
							$b_Check_Ins = -400;
						}
					}
					else{
						$b_Check_Ins = -2;
					}
				}
				else{
					$data_upd = array(
						'cus_title_ans'=>$this->input->post('cus_title_ans'),
						'cus_cont_ans'=>$this->input->post('cus_cont_ans')
					);
					if($this->input->post('idget')>0 && $this->input->post('idget')){
						$this->db->where("id",$this->input->post('idget'));
						$b_Check_Ins = $this->db->update("cms_contact",$data_upd);
					}
				}
				$b_Check = true;
			}
			$data['b_Check']= $b_Check;
			$data['b_Check_Ins']= $b_Check_Ins;
			if($b_Check && $b_Check_Ins==1){
				redirect('./admin/c_contact', 'refresh');
			}
			else{
				$data["results_data_edit"] = $this->M_contact->getDataEdit($this->input->post('idget'));
				$this->load->view("admin/v_contact/ans", $data);	
			}
		}
		else
		{
		  redirect('./admin/login', 'refresh');
		}
	}
	public function getAllMail(){
		echo json_encode($this->M_email_sending->get_all_email());
	}
	public function getOneMail(){
		$id = $_POST['idmail'];
		echo json_encode($this->M_email_sending->get_one_email($id));
	}
	public function getMainMenuLeft(){
		return $this->M_main_menu->listAllDataActive(1);
	}
	public function getSubMenuLeft($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
}
?>