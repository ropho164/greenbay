<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_email_newsletter extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->helper(array('form', 'url'));
		$this->config->load('globals');
		$this->load->library("pagination");
		$this->load->library('form_validation');		
		$this->lang->load('vi', 'vietnamese');
		$this->load->model("admin/M_main_menu");
		$this->load->model("admin/M_sub_menu");
		$this->load->model("admin/M_email_sending");
		$this->load->model("admin/M_template_newsletter");
		$this->load->model("admin/M_email_newsletter");
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
		$config["base_url"] = base_url() . "/admin/c_email_newsletter/index/";
		$config["total_rows"] = $this->M_email_newsletter->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
 
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		
		
		$data["results"] = $this->M_email_newsletter->listData($config["per_page"], $page);
		
		$data["links"] = $this->pagination->create_links();
		
		$data['count'] = $this->M_email_newsletter->record_count();
		$this->load->view("admin/v_email_newsletter/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_email_newsletter->delData($_POST['id']);
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
				$data = $this->M_email_newsletter->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->M_email_newsletter->getDataEdit($id);
		$this->load->view("admin/v_email_newsletter/edit", $data);
	}
	public function proeditata(){
		$session_data = $this->session->userdata('logged_in');
		# Thiết lập lại các lời báo lỗi cho từng quy tắc được thiết lập ở dưới
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		
		# Thiết lập các quy tắc cho từng trường trong form
		$this->form_validation->set_rules('cus_email', '', 'required|valid_email');
		$this->form_validation->set_rules('cus_send', '', 'numeric');
		$b_Check = false;
		$b_Check_Ins = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			if($this->input->post('idget') && $this->input->post('idget')>0){
				if($this->M_email_newsletter->checkExitEmail($this->input->post('idget'),$this->input->post('cus_email'))<=0){
					$data_upd = array(
						'cus_email'=>$this->input->post('cus_email'),
						'cus_send'=>$this->input->post('cus_send')
					);
					$this->db->where("id",$this->input->post('idget'));
					$b_Check_Ins = $this->db->update("cms_newsletter",$data_upd);
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
			redirect('./admin/c_email_newsletter', 'refresh');
		}
		else{
			$data["results_data_edit"] = $this->M_email_newsletter->getDataEdit($this->input->post('idget'));
			$this->load->view("admin/v_email_newsletter/edit", $data);
		}
	}
	public function sendNewsletter(){
		$data = 0;
		if($this->session->userdata('logged_in')){
			$results_data_email = $this->M_email_sending->get_one_email_newsletter();
			$results_template = $this->M_template_newsletter->get_one_template();
			if($results_data_email && sizeof($results_data_email)>0){
				if($results_template && sizeof($results_template)>0){
					if($this->input->post('id')>0 && $this->input->post('id')){
						$results_mail_to = $this->M_email_newsletter->get_one_email($this->input->post('id'));
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
							$this->email->to($results_mail_to[0]['cus_email']);    
							$this->email->subject($results_template[0]['title_email']);
							$this->email->message(html_entity_decode($results_template[0]['content_email']));
							if($this->email->send()){
								$data_upd_send = array(
									'cus_send'=>1
								);
								$where = array('id' => $results_mail_to[0]['id']);
								$this->db->where($where); 
								$data = $this->db->update("cms_newsletter",$data_upd_send);
							}
							else
							{
								$data = -4;
							}
					}
					else{
						$data = -3;				
					}
				}
				else{
					$data = -2;
				}	
			}
			else{
				$data = -1;
			}
		}
		else{
			$data = -10;
		}
		$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
		$this->output->set_output($data);
	}
	public function sendmailmultirecord(){
		$data['result'] = 0;
		//$data['list_mail_err'] = array();
		$results_data_email = $this->M_email_sending->get_one_email_newsletter();
		$results_template = $this->M_template_newsletter->get_one_template();
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
			$mailFrom = $results_data_email[0]['smtp_user'];
			$nameFrom = $results_data_email[0]['smtp_name'];
			if($results_template && sizeof($results_template)>0){
				$tilte = $results_template[0]['title_email'];
				$content = html_entity_decode($results_template[0]['content_email']);			
				if($_POST['delete']){
					$checkbox = $_POST['checkbox'];
					for($i=0;$i<count($_POST['checkbox']);$i++)
					{
						$results_mail_to = $this->M_email_newsletter->get_one_email($checkbox[$i]);
						if($results_mail_to && sizeof($results_mail_to)>0){
							$this->email->from($mailFrom, $nameFrom);
							$this->email->to($results_mail_to[0]['cus_email']);    
							$this->email->subject($tilte);
							$this->email->message($content);
							if($this->email->send()){
								$data_upd_send = array('cus_send'=>1);
								$where = array('id' => $checkbox[$i]);
								$this->db->where($where); 
								$data['result'] = $this->db->update("cms_newsletter",$data_upd_send);
								//array_push($data['list_mail_err'], $results_mail_to[0]['cus_email']);
							}
							else
							{
								$data['result'] = -1;
								//array_push($data['list_mail_err'], $results_mail_to[0]['cus_email']);
							}
						}
						else{
							$data['result'] = -2;		
						}
					}
				}
			}
			else{
				$data['result'] = -3;
			}
		}
		else{
			$data['result'] = -4;
		}
		//echo json_encode($data);
		$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
		$this->output->set_output($data['result']);
	}
	public function getMainMenuLeft(){
		return $this->M_main_menu->listAllDataActive(1);
	}
	public function getSubMenuLeft($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
}
?>