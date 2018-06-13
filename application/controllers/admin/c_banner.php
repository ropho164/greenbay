<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_banner extends CI_Controller {
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
		$this->load->model("admin/M_banner");
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
		$config["base_url"] = base_url() . "/admin/c_banner/index/";
		$config["total_rows"] = $this->M_banner->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
 
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		
		
		$data["results"] = $this->M_banner->listData($config["per_page"], $page);
		
		$data["links"] = $this->pagination->create_links();
		
		$data['count'] = $this->M_banner->record_count();
		$this->load->view("admin/v_banner/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_banner->delData($this->input->post('id'));
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
				$data = $this->M_banner->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
	}
	public function addata(){
		$data['count'] = $this->M_banner->record_count();
		$this->load->view("admin/v_banner/add",$data);

	}
	public function proaddata(){
		$b_affect = '';
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('banner_title_en', 'lang:lag_banner_name', 'trim|required');
		$this->form_validation->set_rules('banner_title_vn', 'lang:lag_banner_name', 'trim|required');
		$this->form_validation->set_rules('banner_photo', 'lang:lag_banner_file', 'trim|required');
		$this->form_validation->set_rules('banner_lnk', 'lang:lag_banner_lnk', 'trim|required');
		$this->form_validation->set_rules('b_order', 'lang:category_order', 'trim|required|numeric');
		
		$this->form_validation->set_rules('is_home', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_wel', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_acc', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_fac', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_din', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_gal', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_spe', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_res', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_con', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_ort', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_sit', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_ply', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('b_active', 'lang:category_order', 'numeric');
		
		$b_Check = false;
		$b_Check_Ins = 0;
		
		$is_affect = $this->M_banner->getPatAffect();
		if($is_affect && sizeof($is_affect)>0){
			$b_affect = $is_affect[0]['b_affect'];
		}
		if($this->form_validation->run() == TRUE){
			$data_ins = array(
				'uid'=>mysql_real_escape_string($session_data['id']),
				'banner_title_en'=>removeDauNhayKep($this->input->post('banner_title_en')),
				'banner_title_vn'=>removeDauNhayKep($this->input->post('banner_title_vn')),
				'banner_photo'=>$this->input->post('banner_photo'),
				'banner_lnk'=>$this->input->post('banner_lnk'),
				'b_order'=>$this->input->post('b_order'),
				'is_home'=>$this->input->post('is_home'),
				'is_wel'=>$this->input->post('is_wel'),
				'is_acc'=>$this->input->post('is_acc'),
				'is_fac'=>$this->input->post('is_fac'),
				'is_din'=>$this->input->post('is_din'),
				'is_gal'=>$this->input->post('is_gal'),
				'is_spe'=>$this->input->post('is_spe'),
				'is_res'=>$this->input->post('is_res'),
				'is_con'=>$this->input->post('is_con'),
				'is_ort'=>$this->input->post('is_ort'),
				'is_sit'=>$this->input->post('is_sit'),
				'is_ply'=>$this->input->post('is_ply'),
				'is_spa'=>$this->input->post('is_spa'),
				'b_date'=>date("Y-m-d"),
				'b_active'=>$this->input->post('b_active'),
				'b_affect'=>$b_affect
			);
			$b_Check_Ins = $this->M_banner->addData($data_ins);
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/c_banner', 'refresh');
		}
		else{
			$data['count'] = $this->M_banner->record_count();
			$this->load->view("admin/v_banner/add", $data);	
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->M_banner->getDataEdit($id);
		$this->load->view("admin/v_banner/edit", $data);
	}
	public function proeditdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = $this->input->post('idget');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('banner_title_en', 'lang:lag_banner_name', 'trim|required');
		$this->form_validation->set_rules('banner_title_vn', 'lang:lag_banner_name', 'trim|required');
		$this->form_validation->set_rules('banner_photo', 'lang:lag_banner_file', 'trim|required');
		$this->form_validation->set_rules('banner_lnk', 'lang:lag_banner_lnk', 'trim|required');
		$this->form_validation->set_rules('b_order', 'lang:category_order', 'trim|required|numeric');
		$this->form_validation->set_rules('is_home', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_wel', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_acc', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_fac', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_din', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_gal', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_spe', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_res', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_con', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_ort', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_sit', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_ply', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('b_active', 'lang:category_order', 'numeric');
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_upd = array(
				'uid'=>mysql_real_escape_string($session_data['id']),
				'banner_title_en'=>removeDauNhayKep($this->input->post('banner_title_en')),
				'banner_title_vn'=>removeDauNhayKep($this->input->post('banner_title_vn')),
				'banner_photo'=>$this->input->post('banner_photo'),
				'banner_lnk'=>$this->input->post('banner_lnk'),
				'b_order'=>$this->input->post('b_order'),
				'is_home'=>$this->input->post('is_home'),
				'is_wel'=>$this->input->post('is_wel'),
				'is_acc'=>$this->input->post('is_acc'),
				'is_fac'=>$this->input->post('is_fac'),
				'is_din'=>$this->input->post('is_din'),
				'is_gal'=>$this->input->post('is_gal'),
				'is_spe'=>$this->input->post('is_spe'),
				'is_res'=>$this->input->post('is_res'),
				'is_con'=>$this->input->post('is_con'),
				'is_ort'=>$this->input->post('is_ort'),
				'is_sit'=>$this->input->post('is_sit'),
				'is_ply'=>$this->input->post('is_ply'),
				'is_spa'=>$this->input->post('is_spa'),
				'b_date'=>date("Y-m-d"),
				'b_active'=>$this->input->post('b_active')
			);
			if($this->input->post('idget')>0 && $this->input->post('idget')){
				$where = array('id' => $this->input->post("idget"));
				$this->db->where($where); 
				$b_Check_Ins = $this->M_banner->updData($data_upd,$this->input->post('idget'));
			}
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/c_banner', 'refresh');
		}
		else{
			$data["results_data_edit"] = $this->M_banner->getDataEdit($id);
			$this->load->view("admin/v_banner/edit", $data);
		}
	}
	public function updOrder(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('b_order', 'lang:category_order', 'trim|required|numeric');
		
		$this->form_validation->set_rules('is_home', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_wel', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_acc', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_fac', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_din', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_gal', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_spe', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_res', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_con', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_ort', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_sit', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_ply', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('b_active', 'lang:category_order', 'numeric');
		
		$data = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			$data_upd = array('b_order'=>$this->input->post('b_order'));
			if($this->input->post('id')>0 && $this->input->post('id')){
				$where = array('id' => $this->input->post("id"));
				$this->db->where($where); 
				$data = $this->db->update("cms_banner",$data_upd);
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
	public function updAffectBanner(){
		$data = 0;
		$data_upd = array();
		if($this->session->userdata('logged_in')){
			$data_upd = array('b_affect'=>$this->input->post('b_affect'));
			if($this->input->post('b_affect')!='null' && $this->input->post('b_affect')!='' && $this->input->post('b_affect')){
				$data = $this->db->update("cms_banner",$data_upd);
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