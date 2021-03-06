<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_banner_promotion extends CI_Controller {
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
		$this->load->model("admin/M_banner_promotion");
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
		$config["base_url"] = base_url() . "/admin/c_banner_promotion/index/";
		$config["total_rows"] = $this->M_banner_promotion->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
 
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		
		
		$data["results"] = $this->M_banner_promotion->listData($config["per_page"], $page);
		
		$data["links"] = $this->pagination->create_links();
		
		$data['count'] = $this->M_banner_promotion->record_count();
		$this->load->view("admin/v_banner_promotion/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_banner_promotion->delData($this->input->post('id'));
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
				$data = $this->M_banner_promotion->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
	}
	public function addata(){
		$data['count'] = $this->M_banner_promotion->record_count();
		$this->load->view("admin/v_banner_promotion/add",$data);

	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('banner_title', 'lang:lag_banner_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('banner_photo', 'lang:lag_banner_file', 'trim|required');
		$this->form_validation->set_rules('banner_lnk', 'lang:lag_banner_lnk', 'trim|required');
		$this->form_validation->set_rules('b_active', 'lang:category_order', 'numeric');
		
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_ins = array(
				'uid'=>mysql_real_escape_string($session_data['id']),
				'banner_title'=>removeDauNhayKep($this->input->post('banner_title')),
				'banner_photo'=>$this->input->post('banner_photo'),
				'banner_lnk'=>$this->input->post('banner_lnk'),
				'b_date'=>date("Y-m-d"),
				'b_active'=>$this->input->post('b_active')
			);
			$b_Check_Ins = $this->db->insert("cms_banner_promotion",$data_ins);
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/c_banner_promotion', 'refresh');
		}
		else{
			$data['count'] = $this->M_banner_promotion->record_count();
			$this->load->view("admin/v_banner_promotion/add", $data);	
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->M_banner_promotion->getDataEdit($id);
		$this->load->view("admin/v_banner_promotion/edit", $data);
	}
	public function proeditdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = $this->input->post('idget');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('banner_title', 'lang:lag_banner_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('banner_photo', 'lang:lag_banner_file', 'trim|required');
		$this->form_validation->set_rules('banner_lnk', 'lang:lag_banner_lnk', 'trim|required');
		$this->form_validation->set_rules('b_active', 'lang:category_order', 'numeric');
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_upd = array(
				'uid'=>mysql_real_escape_string($session_data['id']),
				'banner_title'=>removeDauNhayKep($this->input->post('banner_title')),
				'banner_photo'=>$this->input->post('banner_photo'),
				'banner_lnk'=>$this->input->post('banner_lnk'),
				'b_date'=>date("Y-m-d"),
				'b_active'=>$this->input->post('b_active')
			);
			if($this->input->post('idget')>0 && $this->input->post('idget')){
				$where = array('id' => $this->input->post("idget"));
				$this->db->where($where); 
				$b_Check_Ins = $this->db->update("cms_banner_promotion",$data_upd);
			}
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/c_banner_promotion', 'refresh');
		}
		else{
			$data["results_data_edit"] = $this->M_banner_promotion->getDataEdit($id);
			$this->load->view("admin/v_banner_promotion/edit", $data);
		}
	}
}
?>