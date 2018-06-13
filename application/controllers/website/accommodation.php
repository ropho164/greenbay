<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Accommodation extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->config->load('globals');
		$this->load->helper(array('form', 'url', 'text'));
		$this->load->helper('date');
		$this->load->helper("image");
		$this->load->library('session');		
		$this->load->library("pagination");
		$this->load->library('form_validation');
		$this->lang->load('vi', 'vietnamese');
		$this->load->model("admin/M_main_menu");
		$this->load->model("admin/M_sub_menu");
		$this->load->model("admin/M_rooms");
		$this->load->model("admin/M_banner");
		$this->load->model("admin/M_infocontact");
		$this->load->model("admin/M_abouts");
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'vn';
		$this->session->set_userdata('site_lang', $data["language"]);
	}
	public function index($main = '',$sub = ''){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'vn';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main =($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$sub = ($this->uri->segment($this->config->item('sub_page'))) ? $this->uri->segment($this->config->item('sub_page')) : '';
		$data["sub_menu_link"] = $sub;
		$main_menu_id = $this->M_main_menu->getDataByLnkID($main);
		$data["results_sub_menu_page"] = $this->M_sub_menu->listAllDataActive($main_menu_id,1);
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_acc");
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($main != '' && $sub == ''){		
			$data["results_rooms"] = $this->M_rooms->listDataActive(5, 0, $data["language"] ,1);
			if($data["results_rooms"] && sizeof($data["results_rooms"])>0){
				$this->load->view("webiste/accommodation",$data);
			}
			else{
				redirect(base_url().$data["language"].'/'.$main, 'refresh');
			}
		}
		else if($main != '' && $sub != ''){
			$data["results_rooms_details"] = $this->M_rooms->listDataDetailsActiveLnk($data["language"],$main,$sub);
			if($data["results_rooms_details"] && sizeof($data["results_rooms_details"])>0){
				$data["results_photo_slide"] = $this->M_rooms->listPhotoSlide($data["results_rooms_details"][0]['id']);
				$data["results_rooms_orther"] = $this->M_rooms->listDataActiveOrther(4,0,$data["language"],1,$data["results_rooms_details"][0]['id']);
				$this->load->view("webiste/accommodation-details",$data);
			}
			else{
				redirect(base_url().$data["language"].'/'.$main, 'refresh');
			}
		}
		else{
			redirect(base_url().$data["language"].'/'.$main, 'refresh');
		}
	}
	public function list_rooms($main = '',$sub = ''){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'vn';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main =($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$sub = ($this->uri->segment($this->config->item('sub_page'))) ? $this->uri->segment($this->config->item('sub_page')) : '';
		$data["sub_menu_link"] = $sub;
		$main_menu_id = $this->M_main_menu->getDataByLnkID($main);
		$data["results_sub_menu_page"] = $this->M_sub_menu->listAllDataActive($main_menu_id,1);
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_acc");
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["datestart"] = ($this->input->post("txtFrom"))?$this->input->post("txtFrom"):"";
		$data["dateend"] = ($this->input->post("txtTo"))?$this->input->post("txtTo"):"";
		$data["numRooms"] = ($this->input->post("TROOMS"))?$this->input->post("TROOMS"):"1";
		$data["numAdult"] = ($this->input->post("ADULT"))?$this->input->post("ADULT"):"1";
		$data["numChild"] = ($this->input->post("CHILD"))?$this->input->post("CHILD"):"0";
		$data["typeRooms"] = ($this->input->post("ROOMSTYPE"))?$this->input->post("ROOMSTYPE"):"0";
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($main != '' && $sub == 'list'){		
			$data["results_rooms"] = $this->M_rooms->listDataActive(5, 0, $data["language"] ,1);
			if($data["results_rooms"] && sizeof($data["results_rooms"])>0){
				$this->load->view("webiste/accommodation-booking",$data);
			}
			else{
				redirect(base_url().$data["language"].'/'.$main, 'refresh');
			}
		}
	}
	public function testLayout($main = '',$sub = ''){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'vn';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main =($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$sub = ($this->uri->segment($this->config->item('sub_page'))) ? $this->uri->segment($this->config->item('sub_page')) : '';
		$data["sub_menu_link"] = $sub;
		$main_menu_id = $this->M_main_menu->getDataByLnkID($main);
		$data["results_sub_menu_page"] = $this->M_sub_menu->listAllDataActive($main_menu_id,1);
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_acc");
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($main != '' && $sub == ''){		
			$data["results_rooms"] = $this->M_rooms->listDataActive(5, 0, $data["language"] ,1);
			if($data["results_rooms"] && sizeof($data["results_rooms"])>0){
				$this->load->view("webiste/accommodation",$data);
			}
			else{
				redirect(base_url().$data["language"].'/'.$main, 'refresh');
			}
		}
		else if($main != '' && $sub != ''){
			$data["results_rooms_details"] = $this->M_rooms->listDataDetailsActiveLnk($data["language"],$main,$sub);
			if($data["results_rooms_details"] && sizeof($data["results_rooms_details"])>0){
				$data["results_photo_slide"] = $this->M_rooms->listPhotoSlide($data["results_rooms_details"][0]['id']);
				$data["results_rooms_orther"] = $this->M_rooms->listDataActiveOrther(4,0,$data["language"],1,$data["results_rooms_details"][0]['id']);
				$this->load->view("webiste/accommodation-details-test",$data);
			}
			else{
				redirect(base_url().$data["language"].'/'.$main, 'refresh');
			}
		}
		else{
			redirect(base_url().$data["language"].'/'.$main, 'refresh');
		}
	}
	public function getSubMenu($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
	public function getHotRooms($lang){
		return $this->M_rooms->listDataHotActive(1, 0,$lang,1,1);
	}
}
?>