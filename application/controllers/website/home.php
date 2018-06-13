<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->config->load('globals');
		$this->load->helper(array('form', 'url', 'text'));
		$this->load->helper('date');
		$this->load->helper("image");
		$this->load->library('session');		
		$this->load->library("pagination");
		$this->load->library('form_validation');
		$this->load->library('IP2Location_lib');
		$this->lang->load('vi', 'vietnamese');
		$this->load->model("admin/M_rooms");
		$this->load->model("admin/M_main_menu");
		$this->load->model("admin/M_sub_menu");
		$this->load->model("admin/M_photos");
		$this->load->model("admin/M_video");
		$this->load->model("admin/M_abouts");
		$this->load->model("admin/M_banner");
		$this->load->model("admin/M_infocontact");
		$this->load->model("admin/M_condi");
		$this->load->model("admin/M_email_newsletter");
		$this->load->model("admin/M_code");
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
	}
	public function index($main = ''){
		/*
		$str =  file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=phu-quoc,kien-giang&appid=f0aa08634dab558e10e1da07e1154bb1&units=metric");
		$json = json_decode($str, true);
		//echo '<pre>' . print_r($json, true) . '</pre>';
		$data['temp_c'] = round($json["main"]["temp"]);
		$data['temp_f'] = round(($json["main"]["temp"]*1.8) + 32);
		$data['time'] = date("h:i");
		*/
		/*$this->load->view("webiste/under");*/
		$countryCode = 'en';
		$yourIP =  $this->input->ip_address();
		$this->ip2location_lib->setKey('f40dbb794b603b0fae4415fa85289e253dcbbacc63b5e8624b06dcee82f39c3e');
		$rscode = $this->ip2location_lib->getCountry($yourIP);
		if(strtolower($rscode['countryCode'])=='vn' && $this->uri->segment($this->config->item('language_page'))==''){
			$countryCode = strtolower($rscode['countryCode']);
			redirect(base_url().$countryCode, 'refresh');
		}
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		echo 'aaaaaaaaaaaaaaaaaaa'.$data["language"];
		//echo $this->lang->line('key');
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(5,0,"is_home");
		$data["results_greenbay"] = $this->M_abouts->listDataActive(1,0,$data["language"],15,1);
		$data["results_dining"] = $this->M_abouts->listDataActive(1,0,$data["language"],16,1);
		$data["results_accom"] = $this->M_abouts->listDataActive(1,0,$data["language"],17,1);
		$data["results_tropical"] = $this->M_abouts->listDataActive(1,0,$data["language"],18,1);
		$data["results_tropical_thumd"] =  $this->M_abouts->listDataPhotoThumb(3,0,$data["results_tropical"][0]["id"]);
		$data["results_special"] = $this->M_abouts->listDataActive(1,0,$data["language"],19,1);
		$data["results_special_item"] = $this->M_abouts->listDataActive(3,0,$data["language"],14,1);
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["results_code"] = $this->M_code->listAllDataActive(1,0,$data["language"]);
		$data["results_feel"] = $this->M_abouts->listDataActive(100,0,$data["language"],22,1);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		$this->load->view("webiste/home",$data);
	}
	public function abouts($main = '',$sub = ''){
		/*$this->load->view("webiste/under");*/		
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		//echo $this->lang->line('key');
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$sub_menu_link =($this->uri->segment($this->config->item('sub_page'))) ? $this->uri->segment($this->config->item('sub_page')) : '';
		$data["main_menu_link"] = $main;
		$data["sub_menu_link"] = $sub_menu_link;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_wel");
		$data["results_greenbay"] = $this->M_abouts->listDataActive(1,0,$data["language"],1,1);
		$data["results_island"] = $this->M_abouts->listDataActive(1,0,$data["language"],2,1);
		$data["results_thingsee"] = $this->M_abouts->listDataActive(10,0,$data["language"],3,1);
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		$this->load->view("webiste/about",$data);
		
	}
	public function dining($main_menu_link='',$sub = ''){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main_menu_link =($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$sub_menu_link =($this->uri->segment($this->config->item('sub_page'))) ? $this->uri->segment($this->config->item('sub_page')) : '';
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($main_menu_link!=''){
			$data["main_menu_link"] = $main_menu_link;
			$data["sub_menu_link"] = $sub_menu_link;
			$main_menu_id = $this->M_main_menu->getDataByLnkID($main_menu_link);
			$data["results_sub_menu_page"] = $this->M_sub_menu->listAllDataActive($main_menu_id,1);
			$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
			$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_din");
			$data["results_sunset"] = $this->M_abouts->listDataActive(1,0,$data["language"],4,1);
			$data["results_greenbay"] = $this->M_abouts->listDataActive(1,0,$data["language"],5,1);
			$data["results_pool"] = $this->M_abouts->listDataActive(1,0,$data["language"],6,1);
			$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
			$this->load->view("webiste/dinning",$data);
		}
		else{
			redirect(base_url().$data["language"], 'refresh');
		}
	}
	public function recreation($main_menu_link='',$sub_menu_link = ''){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main_menu_link =($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$sub_menu_link =($this->uri->segment($this->config->item('sub_page'))) ? $this->uri->segment($this->config->item('sub_page')) : '';
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($main_menu_link!=''){
			$data["main_menu_link"] = $main_menu_link;
			$data["sub_menu_link"] = $sub_menu_link;
			$main_menu_id = $this->M_main_menu->getDataByLnkID($main_menu_link);
			$data["results_sub_menu_page"] = $this->M_sub_menu->listAllDataActive($main_menu_id,1);
			$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
			$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_fac");
			$data["results_wedding"] = $this->M_abouts->listDataActive(1,0,$data["language"],7,1);
			$data["results_event"] = $this->M_abouts->listDataActive(1,0,$data["language"],9,1);
			$data["results_sports"] = $this->M_abouts->listDataActive(10,0,$data["language"],11,1);
			$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
			$this->load->view("webiste/recreation",$data);
		}
		else{
			redirect(base_url().$data["language"], 'refresh');
		}
	}
	public function spa($main_menu_link='',$sub_menu_link = ''){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main_menu_link =($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$sub_menu_link =($this->uri->segment($this->config->item('sub_page'))) ? $this->uri->segment($this->config->item('sub_page')) : '';
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($main_menu_link!=''){			
			$data["main_menu_link"] = $main_menu_link;
			$mid = $this->M_main_menu->getDataByLnkID($main_menu_link);
			$data["results_sub_menu_page"] = $this->M_sub_menu->listAllDataActive($mid,1);
			$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
			$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_spa");
			$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
			if($sub_menu_link != ''){
				$sid = $this->M_sub_menu->getDataByLnkID($sub_menu_link);
				$data['sub_menu_link'] = $sub_menu_link;
				$data["results_spa"] = $this->M_abouts->listDataAllMainSubActive(1,0,$data["language"],1,$mid,$sid);
				if($data["results_spa"] && sizeof($data["results_spa"])>0){
					if($data["results_spa"][0]['sub_id']==20){
						$data["results_spa"] = $this->M_abouts->listDataAllMainSubActive(10,0,$data["language"],1,$mid,$sid);
						$this->load->view("webiste/nature-loving",$data);
					}
					else{
						$data["results_spa_therapies"] = $this->M_abouts->listDataActive(100,0,$data["language"],13,1);
						$this->load->view("webiste/spa",$data);
					}
				}
				else{
					redirect(base_url().$data["language"], 'refresh');
				}
			}
			else{
				$data['sub_menu_link'] = 'interests';
				$data["results_spa"] = $this->M_abouts->listDataActive(1,0,$data["language"],12,1);
				$data["results_spa_therapies"] = $this->M_abouts->listDataActive(100,0,$data["language"],13,1);
				$this->load->view("webiste/spa",$data);
			}
			//echo $data["results_spa"][0]['id'];
		}
		else{
			//echo $main_menu_link .'-'.$sub_menu_link;
			redirect(base_url().$data["language"], 'refresh');
		}
	}
	public function specialoffers($main_menu_link='',$sub = ''){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main_menu_link =($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$sub_menu_link =($this->uri->segment($this->config->item('sub_page'))) ? $this->uri->segment($this->config->item('sub_page')) : '';
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($main_menu_link!=''){
			$data["main_menu_link"] = $main_menu_link;
			$data["sub_menu_link"] = $sub_menu_link;
			$main_menu_id = $this->M_main_menu->getDataByLnkID($main_menu_link);
			$data["results_sub_menu_page"] = $this->M_sub_menu->listAllDataActive($main_menu_id,1);
			$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
			$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_spe");
			$data["results_special_intro"] = $this->M_abouts->listDataActive(1,0,$data["language"],19,1);
			$data["results_special"] = $this->M_abouts->listDataActive(10,0,$data["language"],14,1);
			$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
			$this->load->view("webiste/specialoffers",$data);
		}
		else{
			redirect(base_url().$data["language"], 'refresh');
		}
	}
	public function gallery($main_menu_link='',$sub = ''){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main_menu_link =($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$sub_menu_link =($this->uri->segment($this->config->item('sub_page'))) ? $this->uri->segment($this->config->item('sub_page')) : '';
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($main_menu_link!=''){
			$data["main_menu_link"] = $main_menu_link;
			$data["sub_menu_link"] = $sub_menu_link;
			$main_menu_id = $this->M_main_menu->getDataByLnkID($main_menu_link);
			$data["results_sub_menu_page"] = $this->M_sub_menu->listAllDataActive($main_menu_id,1);
			$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
			$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_gal");
			$data["results_photo"] = $this->M_photos->listDataActive(100, 0);
			$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
			$this->load->view("webiste/gallery",$data);
		}
		else{
			redirect(base_url().$data["language"], 'refresh');
		}
	}
	public function videos($main_menu_link='',$sub = ''){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main_menu_link =($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$sub_menu_link =($this->uri->segment($this->config->item('sub_page'))) ? $this->uri->segment($this->config->item('sub_page')) : '';
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($main_menu_link!=''){
			$data["main_menu_link"] = $main_menu_link;
			$data["sub_menu_link"] = $sub_menu_link;
			$main_menu_id = $this->M_main_menu->getDataByLnkID($main_menu_link);
			$data["results_sub_menu_page"] = $this->M_sub_menu->listAllDataActive($main_menu_id,1);
			$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
			$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_gal");
			$data["results_video"] = $this->M_video->listAllDataActive(2, 0);
			$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
			$this->load->view("webiste/gallery-videos",$data);
		}
		else{
			redirect(base_url().$data["language"], 'refresh');
		}
	}
	public function policy($main = ''){
		/*$this->load->view("webiste/under");*/		
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		//echo $this->lang->line('key');
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_ply");
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["results_pol"] = $this->M_condi->listDataNewsCategories(1,0,$data["language"],1);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		$this->load->view("webiste/policy",$data);		
	}
	public function paymentCancellation($main = ''){
		/*$this->load->view("webiste/under");*/		
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		//echo $this->lang->line('key');
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_ply");
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["results_pol"] = $this->M_condi->listDataNewsCategories(1,0,$data["language"],2);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		$this->load->view("webiste/policy",$data);		
	}
	public function addNewsletter(){
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_rules('cus_email', '', 'valid_email');
		if($this->form_validation->run() == TRUE){
			$data_ins = array(
				'cus_email'=>$this->input->post('cus_email'),
				'cus_date'=>date("Y-m-d")
			);
			if($this->M_email_newsletter->checkExitEmail(0,$this->input->post('cus_email'))<=0){
				$b_Check_Ins = $this->db->insert("cms_newsletter",$data_ins);	
				$this->output->set_content_type('Content-type: text/xml');
				echo "<?xml version='1.0' encoding='UTF-8'?>";
				echo "<status state='".$b_Check_Ins."'><![CDATA[Data has been saved]]></status>";
			}
			else{
				echo "<?xml version='1.0' encoding='UTF-8'?>";
				echo "<status state='-1'><![CDATA[Email exited]]></status>";
			}
		}
	}
	public function contact($main = ''){
		/*$this->load->view("webiste/under");*/		
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		//echo $this->lang->line('key');
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_con");
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		$this->load->view("webiste/contact",$data);		
	}
	public function addContact(){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_rules('cus_name_contact', '', 'trim|required');
		$this->form_validation->set_rules('cus_email_contact', '', 'valid_email');
		$this->form_validation->set_rules('cus_cont_contact', '', 'trim|required');
		if($this->form_validation->run() == TRUE){
			$data_ins = array(
				'cus_name'=>$this->input->post('cus_name_contact'),
				'cus_phone'=>'',
				'cus_email'=>$this->input->post('cus_email_contact'),
				'cus_title'=>'',
				'cus_cont'=>$this->input->post('cus_cont_contact'),
				'cus_date'=>date("Y-m-d"),
				'cus_status'=>0,
				'cus_note'=>''
			);
			$b_Check_Ins = $this->db->insert("cms_contact",$data_ins);	
			if($b_Check_Ins && $b_Check_Ins>0){
				$this->output->set_content_type('Content-type: text/xml');
				echo "<?xml version='1.0' encoding='UTF-8'?>";
				echo "<status state='".$b_Check_Ins."'><![CDATA[".$this->lang->line('frm_contact_send_thanks')."]]></status>";
			}
		}
		else{
			$this->output->set_content_type('Content-type: text/xml');
			echo "<?xml version='1.0' encoding='UTF-8'?>";
			echo "<status state='-1'><![CDATA[".$this->lang->line('frm_contact_send_invalid')."]]></status>";
		}
	}
	public function sitemap($main = ''){
		/*$this->load->view("webiste/under");*/		
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		//echo $this->lang->line('key');
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_sit");
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		$this->load->view("webiste/sitemap",$data);		
	}
	public function pageNotFound(){
		$this->output->set_status_header('404'); 
    	$data['content'] = 'Sorry, this page is not avilible!'; // View name 
		$this->load->view("webiste/page_not_found",$data);		
	}
	public function undercontruction(){
		$this->load->view("webiste/under");
	}
	public function getSubMenu($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
	public function getPhotoThumb($pid){
		return $this->M_abouts->listDataPhotoThumb(30,0,$pid);
	}
	public function listDataSubActive($lang,$type,$pid){
		return $this->M_abouts->listDataSubActive(10,0,$lang,$type,1,$pid);
	}
	public function getHotRooms($lang){
		return $this->M_rooms->listDataHotActive(1, 0,$lang,1,1);
	}
}
?>