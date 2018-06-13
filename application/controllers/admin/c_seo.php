<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_seo extends CI_Controller {
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
		$this->load->model("admin/M_seo");
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
		$config["base_url"] = base_url() . "/admin/c_seo/index/";
		$config["total_rows"] = $this->M_seo->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
 
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		
		
		$data["results"] = $this->M_seo->listData($config["per_page"], $page);
		
		$data["links"] = $this->pagination->create_links();
		
		$data['count'] = $this->M_seo->record_count();
		$this->load->view("admin/v_seo/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_seo->delData($this->input->post('id'));
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
				$data = $this->M_seo->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
	}
	public function addata(){
		$data['count'] = $this->M_seo->record_count();
		$this->load->view("admin/v_seo/add",$data);

	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('seo_title', 'lang:lang_seo_title', 'trim|required');
		$this->form_validation->set_rules('seo_title_page', 'lang:article_seo_title', 'trim|required');	
		$this->form_validation->set_rules('seo_key', 'lang:title_seo', 'trim|required');
		$this->form_validation->set_rules('seo_des', 'lang:article_des_seo', 'trim|required');
		$this->form_validation->set_rules('is_trangchu', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_thuonghieu', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_sanpham', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_hotro', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_chuyende', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_tintuc', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_muaodau', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_lienhe', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_khac', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('b_active', 'lang:category_order', 'numeric');
		
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_ins = array(
				'uid'=>mysql_real_escape_string($session_data['id']),
				'seo_title'=>removeDauNhayKep($this->input->post('seo_title')),
				'seo_title_page'=>removeDauNhayKep($this->input->post('seo_title_page')),
				'seo_key'=>removeDauNhayKep($this->input->post('seo_key')),
				'seo_des'=>removeDauNhayKep($this->input->post('seo_des')),
				'is_trangchu'=>$this->input->post('is_trangchu'),
				'is_thuonghieu'=>$this->input->post('is_thuonghieu'),
				'is_sanpham'=>$this->input->post('is_sanpham'),
				'is_hotro'=>$this->input->post('is_hotro'),
				'is_chuyende'=>$this->input->post('is_chuyende'),
				'is_tintuc'=>$this->input->post('is_tintuc'),
				'is_muaodau'=>$this->input->post('is_muaodau'),
				'is_lienhe'=>$this->input->post('is_lienhe'),
				'is_khac'=>$this->input->post('is_khac'),
				'b_date'=>date("Y-m-d"),
				'b_active'=>$this->input->post('b_active')
			);
			$b_Check_Ins = $this->db->insert("cms_seo",$data_ins);
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/c_seo', 'refresh');
		}
		else{
			$data['count'] = $this->M_seo->record_count();
			$this->load->view("admin/v_seo/add", $data);	
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->M_seo->getDataEdit($id);
		$this->load->view("admin/v_seo/edit", $data);
	}
	public function proeditdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = $this->input->post('idget');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('seo_title', 'lang:lang_seo_title', 'trim|required');
		$this->form_validation->set_rules('seo_title_page', 'lang:article_seo_title', 'trim|required');		
		$this->form_validation->set_rules('seo_key', 'lang:title_seo', 'trim|required');
		$this->form_validation->set_rules('seo_des', 'lang:article_des_seo', 'trim|required');
		$this->form_validation->set_rules('is_trangchu', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_thuonghieu', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_sanpham', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_hotro', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_chuyende', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_tintuc', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_muaodau', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_lienhe', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('is_khac', 'lang:category_order', 'numeric');
		$this->form_validation->set_rules('b_active', 'lang:category_order', 'numeric');
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_upd = array(
				'uid'=>mysql_real_escape_string($session_data['id']),
				'seo_title'=>removeDauNhayKep($this->input->post('seo_title')),
				'seo_title_page'=>removeDauNhayKep($this->input->post('seo_title_page')),
				'seo_key'=>removeDauNhayKep($this->input->post('seo_key')),
				'seo_des'=>removeDauNhayKep($this->input->post('seo_des')),
				'is_trangchu'=>$this->input->post('is_trangchu'),
				'is_thuonghieu'=>$this->input->post('is_thuonghieu'),
				'is_sanpham'=>$this->input->post('is_sanpham'),
				'is_hotro'=>$this->input->post('is_hotro'),
				'is_chuyende'=>$this->input->post('is_chuyende'),
				'is_tintuc'=>$this->input->post('is_tintuc'),
				'is_muaodau'=>$this->input->post('is_muaodau'),
				'is_lienhe'=>$this->input->post('is_lienhe'),
				'is_khac'=>$this->input->post('is_khac'),
				'b_date'=>date("Y-m-d"),
				'b_active'=>$this->input->post('b_active')
			);
			if($this->input->post('idget')>0 && $this->input->post('idget')){
				$where = array('id' => $this->input->post("idget"));
				$this->db->where($where); 
				$b_Check_Ins = $this->db->update("cms_seo",$data_upd);
			}
			$b_Check = true;
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect('./admin/c_seo', 'refresh');
		}
		else{
			$data["results_data_edit"] = $this->M_seo->getDataEdit($id);
			$this->load->view("admin/v_seo/edit", $data);
		}
	}
}
?>