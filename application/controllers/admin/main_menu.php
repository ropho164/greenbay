<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_menu extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper("url"); 
		$this->load->helper("form"); 
		$this->load->helper("text");  
		$this->config->load('globals');
		$this->load->library('session');	
		$this->load->library("pagination");
		$this->load->library('form_validation');
		$this->lang->load('vi', 'vietnamese');
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
		$config["base_url"] = base_url() . "/admin/main_menu/index/";
		$config["total_rows"] = $this->M_main_menu->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
 
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		
		
		$data["results"] = $this->M_main_menu->listData($config["per_page"], $page);
		
		$data["links"] = $this->pagination->create_links();
		
		$data['count'] = $this->M_main_menu->record_count();
		$this->load->view("admin/mainmenu/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_main_menu->delData($this->input->post('id'));
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
				$data = $this->M_main_menu->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
	}
	public function addata(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->view("admin/mainmenu/add");

	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('category_name_en', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('category_name_vn', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('category_order', 'lang:category_order', 'trim|required|numeric');
		$this->form_validation->set_rules('seo_title_en', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('seo_title_vn', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('seo_key_en', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('seo_key_vn', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('seo_des_en', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('seo_des_vn', 'lang:not_blank', 'trim|required');
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_ins = array(
				'uid'=>mysql_real_escape_string($session_data['id']),
				'category_order'=>removeDauNhayKep($this->input->post('category_order')),
				'category_name_en'=>removeDauNhayKep($this->input->post('category_name_en')),
				'category_name_vn'=>removeDauNhayKep($this->input->post('category_name_vn')),
				'category_lnk'=>mb_strtolower(url_title(removesign($this->input->post('category_name_en')))),
				'seo_title_en'=>removeDauNhayKep($this->input->post('seo_title_en')),
				'seo_title_vn'=>removeDauNhayKep($this->input->post('seo_title_vn')),
				'seo_key_en'=>removeDauNhayKep($this->input->post('seo_key_en')),
				'seo_key_vn'=>removeDauNhayKep($this->input->post('seo_key_vn')),
				'seo_des_en'=>removeDauNhayKep($this->input->post('seo_des_en')),
				'seo_des_vn'=>removeDauNhayKep($this->input->post('seo_des_vn')),
				'status'=>$this->input->post('status')
			);
			$b_Check_Ins = $this->M_main_menu->insData($data_ins);
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins>0){
			redirect('./admin/main_menu', 'refresh');
		}
		else{
			$this->load->view("admin/mainmenu/add", $data);	
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->M_main_menu->getDataEdit($id);
		$this->load->view("admin/mainmenu/edit", $data);
	}
	public function proeditdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = $this->input->post('idget');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('category_name_en', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('category_name_vn', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('category_order', 'lang:category_order', 'trim|required|numeric');
		$this->form_validation->set_rules('seo_title_en', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('seo_title_vn', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('seo_key_en', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('seo_key_vn', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('seo_des_en', 'lang:not_blank', 'trim|required');
		$this->form_validation->set_rules('seo_des_vn', 'lang:not_blank', 'trim|required');
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_upd = array(
				'uid'=>mysql_real_escape_string($session_data['id']),
				'category_order'=>removeDauNhayKep($this->input->post('category_order')),
				'category_name_en'=>removeDauNhayKep($this->input->post('category_name_en')),
				'category_name_vn'=>removeDauNhayKep($this->input->post('category_name_vn')),
				//'category_lnk'=>mb_strtolower(url_title(removesign($this->input->post('category_name_en')))),
				'seo_title_en'=>removeDauNhayKep($this->input->post('seo_title_en')),
				'seo_title_vn'=>removeDauNhayKep($this->input->post('seo_title_vn')),
				'seo_key_en'=>removeDauNhayKep($this->input->post('seo_key_en')),
				'seo_key_vn'=>removeDauNhayKep($this->input->post('seo_key_vn')),
				'seo_des_en'=>removeDauNhayKep($this->input->post('seo_des_en')),
				'seo_des_vn'=>removeDauNhayKep($this->input->post('seo_des_vn')),
				'status'=>$this->input->post('status')
			);
			if($this->input->post('idget')>0 && $this->input->post('idget')){ 
				$b_Check_Ins = $this->M_main_menu->updateData($this->input->post("idget"),$data_upd);
			}
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins>0){
			redirect('./admin/main_menu', 'refresh');
		}
		else{
			$data["results_data_edit"] = $this->M_main_menu->getDataEdit($id);
			$this->load->view("admin/mainmenu/edit", $data);
		}
	}
	public function updOrder(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('category_order', 'lang:category_order', 'trim|required|numeric');
		$data = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			$data_upd = array('category_order'=>$this->input->post('category_order'));
			if($this->input->post('id')>0 && $this->input->post('id')){
				$data = $this->M_main_menu->updateData($this->input->post("id"),$data_upd);
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