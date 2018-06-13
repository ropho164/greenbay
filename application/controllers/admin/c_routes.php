<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_routes extends CI_Controller {
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
		$this->load->model("admin/Muser");
		$this->load->model("admin/M_routes");
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
		if($session_data && $session_data['role_id']==1){
			$data["results"] = $this->M_routes->listData(1000, 0);
			$data['count'] = $this->M_routes->record_count();
			$data['control'] = array(
				array(
					'keyc' =>'website/home/abouts',
					'lablec' =>'KHÁM PHÁ'
				),
				array(
					'keyc' =>'website/accommodation/index',
					'lablec' =>'PHÒNG'
				),
				array(
					'keyc' =>'website/home/dining',
					'lablec' =>'ẨM THỰC'
				),
				array(
					'keyc' =>'website/home/recreation',
					'lablec' =>'HỘI NGHỊ TIỆC CƯỚI'
				),
				array(
					'keyc' =>'website/home/spa',
					'lablec' =>'GIẢI TRÍ'
				),
				array(
					'keyc' =>'website/home/specialoffers',
					'lablec' =>'ƯU ĐÃI'
				)		
			);
			$this->load->view("admin/v_routes/list", $data);
		}else{
			redirect('./admin/home', 'refresh');
		}
	}
	public function delrecord(){
		$session_data = $this->session->userdata('logged_in');
		if($session_data && $session_data['role_id']==1){
			$data = $this->M_routes->delData($this->input->post('id'));
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
			$this->output->set_output($data);
		}
	}
	public function delmultirecord(){
		$session_data = $this->session->userdata('logged_in');
		if($session_data && $session_data['role_id']==1){
			if($this->input->post('delete')){
				$checkbox = $this->input->post('checkbox');
				for($i=0;$i<count($this->input->post('checkbox'));$i++)
				{
					$data = $this->M_routes->delData($checkbox[$i]);
					if($data==0){
						break;	
					}
				}
				$this->output->set_content_type('Content-Type: text/html; charset=utf-8; charset=utf-8');
				$this->output->set_output($data);
			}
		}
	}
	public function addata(){
		$session_data = $this->session->userdata('logged_in');
		if($session_data && $session_data['role_id']==1){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data['control'] = array(
				array(
					'keyc' =>'website/home/abouts',
					'lablec' =>'KHÁM PHÁ'
				),
				array(
					'keyc' =>'website/accommodation/index',
					'lablec' =>'PHÒNG'
				),
				array(
					'keyc' =>'website/home/dining',
					'lablec' =>'ẨM THỰC'
				),
				array(
					'keyc' =>'website/home/recreation',
					'lablec' =>'HỘI NGHỊ TIỆC CƯỚI'
				),
				array(
					'keyc' =>'website/home/spa',
					'lablec' =>'GIẢI TRÍ'
				),
				array(
					'keyc' =>'website/home/specialoffers',
					'lablec' =>'ƯU ĐÃI'
				)		
			);
			$this->load->view("admin/v_routes/add",$data);
		}else{
			redirect('./admin/home', 'refresh');
		}
	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		if($session_data && $session_data['role_id']==1){
			$this->form_validation->set_message('required', $this->lang->line('required'));
			$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
			$this->form_validation->set_rules('sl_controller', 'lang:not_blank', 'trim|required');
			$this->form_validation->set_rules('txt_slug', 'lang:not_blank', 'trim|required');
			$b_Check = false;
			$b_Check_Ins = 0;
			if($this->form_validation->run() == TRUE){
				$linkMenu = mb_strtolower(url_title(removesign($this->input->post('txt_slug'))));
				$data_ins = array(
					'uid'=>mysql_real_escape_string($session_data['id']),
					'controller'=>$this->input->post('sl_controller'),
					'slug'=>$this->input->post('txt_slug'),
					'deleted'=>0
				);
				$b_Check_Ins = $this->M_routes->insData($data_ins);
				$b_Check = true;
			}
			$data['b_Check']= $b_Check;
			$data['b_Check_Ins']= $b_Check_Ins;
			if($b_Check && $b_Check_Ins>0){
				redirect('./admin/c_routes', 'refresh');
			}
			else{
				$data['control'] = array(
					array(
						'keyc' =>'website/home/abouts',
						'lablec' =>'KHÁM PHÁ'
					),
					array(
						'keyc' =>'website/accommodation/index',
						'lablec' =>'PHÒNG'
					),
					array(
						'keyc' =>'website/home/dining',
						'lablec' =>'ẨM THỰC'
					),
					array(
						'keyc' =>'website/home/recreation',
						'lablec' =>'HỘI NGHỊ TIỆC CƯỚI'
					),
					array(
						'keyc' =>'website/home/spa',
						'lablec' =>'GIẢI TRÍ'
					),
					array(
						'keyc' =>'website/home/specialoffers',
						'lablec' =>'ƯU ĐÃI'
					)		
				);
				$this->load->view("admin/v_routes/add", $data);	
			}
		}else{
			redirect('./admin/home', 'refresh');
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		if($session_data && $session_data['role_id']==1){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
			$data["results_data_edit"] = $this->M_routes->getDataEdit($id);
			$data['control'] = array(
				array(
					'keyc' =>'website/home/abouts',
					'lablec' =>'KHÁM PHÁ'
				),
				array(
					'keyc' =>'website/accommodation/index',
					'lablec' =>'PHÒNG'
				),
				array(
					'keyc' =>'website/home/dining',
					'lablec' =>'ẨM THỰC'
				),
				array(
					'keyc' =>'website/home/recreation',
					'lablec' =>'HỘI NGHỊ TIỆC CƯỚI'
				),
				array(
					'keyc' =>'website/home/spa',
					'lablec' =>'GIẢI TRÍ'
				),
				array(
					'keyc' =>'website/home/specialoffers',
					'lablec' =>'ƯU ĐÃI'
				)
			);
			$this->load->view("admin/v_routes/edit", $data);
		}else{
			redirect('./admin/home', 'refresh');
		}
	}
	public function proeditdata(){
		$session_data = $this->session->userdata('logged_in');
		if($session_data && $session_data['role_id']==1){
			$id = $this->input->post('idget');
			$this->form_validation->set_message('required', $this->lang->line('required'));
			$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
			$this->form_validation->set_rules('sl_controller', 'lang:not_blank', 'trim|required');
			$this->form_validation->set_rules('txt_slug', 'lang:not_blank', 'trim|required');
			$b_Check = false;
			$b_Check_Ins = 0;
			if($this->form_validation->run() == TRUE){
				$linkMenu = mb_strtolower(url_title(removesign($this->input->post('txt_slug'))));
				$data_upd = array(
					'uid'=>mysql_real_escape_string($session_data['id']),
					'controller'=>$this->input->post('sl_controller'),
					'slug'=>$this->input->post('txt_slug')
				);
				if($this->input->post('idget')>0 && $this->input->post('idget')){ 
					$b_Check_Ins = $this->M_routes->updateData($this->input->post("idget"),$data_upd);
				}
				$b_Check = true;
			}
			$data['b_Check']= $b_Check;
			$data['b_Check_Ins']= $b_Check_Ins;
			if($b_Check && $b_Check_Ins>0){
				redirect('./admin/c_routes', 'refresh');
			}
			else{
				$data["results_data_edit"] = $this->M_routes->getDataEdit($id);
				$data['control'] = array(
					array(
						'keyc' =>'website/home/abouts',
						'lablec' =>'KHÁM PHÁ'
					),
					array(
						'keyc' =>'website/accommodation/index',
						'lablec' =>'PHÒNG'
					),
					array(
						'keyc' =>'website/home/dining',
						'lablec' =>'ẨM THỰC'
					),
					array(
						'keyc' =>'website/home/recreation',
						'lablec' =>'HỘI NGHỊ TIỆC CƯỚI'
					),
					array(
						'keyc' =>'website/home/spa',
						'lablec' =>'GIẢI TRÍ'
					),
					array(
						'keyc' =>'website/home/specialoffers',
						'lablec' =>'ƯU ĐÃI'
					)	
				);
				$this->load->view("admin/v_routes/edit", $data);
			}
		}else{
			redirect('./admin/home', 'refresh');
		}
	}
	function listPermissionUidKey($uid,$keyid){
		return $this->Muser->listPermissionUidKey($uid,$keyid);
	}
	public function getMainMenuLeft(){
		return $this->M_main_menu->listAllDataActive(1);
	}
	public function getSubMenuLeft($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
}
?>