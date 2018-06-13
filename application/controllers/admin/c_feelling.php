<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_feelling extends CI_Controller {
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
		$this->load->model("admin/M_feelling");
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
		$config["base_url"] = base_url() . "/admin/c_feelling/index/";
		$config["total_rows"] = $this->M_feelling->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
 
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		
		
		$data["results"] = $this->M_feelling->listData($config["per_page"], $page);
		
		$data["links"] = $this->pagination->create_links();
		
		$data['count'] = $this->M_feelling->record_count();
		$this->load->view("admin/v_feelling/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_feelling->delData($this->input->post('id'));
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
				$data = $this->M_feelling->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
	}
	public function addata(){
		$data['count'] = $this->M_feelling->record_count();
		$this->load->view("admin/v_feelling/add",$data);

	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('title_feel', '', 'trim|required');
		$this->form_validation->set_rules('desc_feel', '', 'trim|required');
		$this->form_validation->set_rules('article_picture_1', '', 'trim|required');
		$this->form_validation->set_rules('link_feel', '', 'trim');
		$this->form_validation->set_rules('order_feel', '', 'trim');
		$this->form_validation->set_rules('active_feel', '', 'trim');
		$this->form_validation->set_rules('date_feel', '', 'trim');
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_ins = array(
				'uid'=>mysql_real_escape_string($session_data['id']),
				'title_feel'=>$this->input->post('title_feel'),
				'desc_feel'=>$this->input->post('desc_feel'),
				'photo_feel'=>$this->input->post('article_picture_1'),
				'link_feel'=>$this->input->post('link_feel'),
				'order_feel'=>$this->input->post('order_feel'),
				'active_feel'=>$this->input->post('active_feel'),
				'date_feel'=>$this->input->post('date_feel')
				
			);
			$b_Check_Ins = $this->db->insert("cms_feeling_customer",$data_ins);
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/c_feelling', 'refresh');
		}
		else{
			$data['count'] = $this->M_feelling->record_count();
			$this->load->view("admin/v_feelling/add", $data);	
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->M_feelling->getDataEdit($id);
		$this->load->view("admin/v_feelling/edit", $data);
	}
	public function proeditdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = $this->input->post('idget');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('title_feel', '', 'trim|required');
		$this->form_validation->set_rules('desc_feel', '', 'trim|required');
		$this->form_validation->set_rules('article_picture_1', '', 'trim|required');
		$this->form_validation->set_rules('link_feel', '', 'trim');
		$this->form_validation->set_rules('order_feel', '', 'trim');
		$this->form_validation->set_rules('active_feel', '', 'trim');
		$this->form_validation->set_rules('date_feel', '', 'trim');
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_upd = array(
				'uid'=>mysql_real_escape_string($session_data['id']),
				'title_feel'=>$this->input->post('title_feel'),
				'desc_feel'=>$this->input->post('desc_feel'),
				'photo_feel'=>$this->input->post('article_picture_1'),
				'link_feel'=>$this->input->post('link_feel'),
				'order_feel'=>$this->input->post('order_feel'),
				'active_feel'=>$this->input->post('active_feel'),
				'date_feel'=>$this->input->post('date_feel')
			);
			if($this->input->post('idget')>0 && $this->input->post('idget')){
				$where = array('id' => $this->input->post("idget"));
				$this->db->where($where); 
				$b_Check_Ins = $this->db->update("cms_feeling_customer",$data_upd);
			}
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/c_feelling', 'refresh');
		}
		else{
			$data["results_data_edit"] = $this->M_feelling->getDataEdit($id);
			$this->load->view("admin/v_feelling/edit", $data);
		}
	}
	public function updOrder(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('order_feel', 'lang:category_order', 'trim|required|numeric');		
		$data = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			$data_upd = array('order_feel' => $this->input->post('order_feel'));
			if($this->input->post('id')>0 && $this->input->post('id')){
				$where = array('id' => $this->input->post("id"));
				$this->db->where($where); 
				$data = $this->db->update("cms_feeling_customer",$data_upd);
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
?>