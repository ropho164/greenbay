<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rooms extends CI_Controller {
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
		$this->load->model("admin/M_rooms");
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
		$config["base_url"] = base_url() . "/admin/rooms/index/";
		$config["total_rows"] = $this->M_rooms->record_count();
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
		$page = ($this->uri->segment($this->config->item('page'))) ? $this->uri->segment($this->config->item('page')) : 0;
		$data["results"] = $this->M_rooms->listData($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['count'] = $this->M_rooms->record_count();
		$this->session->unset_userdata('page_back_link');
		$this->session->set_userdata('page_back_link',current_url());
		$this->load->view("admin/rooms/list", $data);
	}
	public function fillter()
	{	
		$session_data = $this->session->userdata('logged_in');
		$langue = ($this->uri->segment($this->config->item('idgroup'))) ? $this->uri->segment($this->config->item('idgroup')) : 'en';
		$config = array();
		$config["first_link"]           = 'First';
		$config["next_link"]            = '&gt;';
		$config["prev_link"]            = '&lt;';
		$config["last_link"]            = 'Last';
		$config["base_url"] = base_url() . "admin/rooms/fillter/".$langue;
		$config["total_rows"] = $this->M_rooms->record_count_fillter($langue);
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('uri_segment_fillter');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
		$page = ($this->uri->segment($this->config->item('idgroup_pro'))) ? $this->uri->segment($this->config->item('idgroup_pro')) : 0;
		$data["results"] = $this->M_rooms->listDataFillter($config["per_page"], $page, $langue);
		$data["links"] = $this->pagination->create_links();
		$data['count'] = $this->M_rooms->record_count_fillter($langue);
		$this->session->unset_userdata('page_back_link');
		$this->session->set_userdata('page_back_link',current_url());
		$this->load->view("admin/rooms/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_rooms->delData($_POST['id']);
		$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
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
				$data = $this->M_rooms->delData($checkbox[$i]);
				if($data==0){
					break;	
				}
			}
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
			$this->output->set_output($data);
		}
	}
	public function addata(){
		$session_data = $this->session->userdata('logged_in');
		$data["list_photo"] = NULL;
		$data['count'] = $this->M_rooms->record_count();
		$data['results_main_menu'] = $this->M_main_menu->listAllDataActiveRooms(1,'accommodation');
		$data['results_sub_menu'] = $this->M_sub_menu->listAllDataActive($data['results_main_menu'][0]['id'],1);
		$data['ckeditor'] = array(		
			'id' 	=> 	'article_content',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"FULL",
				'width' 	=> 	"100%",
				'height' 	=> 	'300px',
			)
		);
		$data['ckeditor1'] = array(		
			'id' 	=> 	'article_content_orther',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"FULL",
				'width' 	=> 	"100%",
				'height' 	=> 	'300px',				
			)
		);
		$this->load->view("admin/rooms/add", $data);
	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('article_seo_title', 'lang:article_seo_title', 'trim|required');
		$this->form_validation->set_rules('article_key', 'lang:title_seo', 'trim|required');
		$this->form_validation->set_rules('article_des', 'lang:article_des_seo', 'trim|required');
		$this->form_validation->set_rules('order_article', 'lang:category_order', 'trim|required|numeric');
		$this->form_validation->set_rules('article_price', '', 'trim|required|numeric');
		$this->form_validation->set_rules('article_price_vn', '', 'trim|required|numeric');
		$this->form_validation->set_rules('article_price_promo', '', 'trim|required');
		$this->form_validation->set_rules('article_quantity', '', 'trim|required');
		$this->form_validation->set_rules('article_size', '', 'trim|required');
		$this->form_validation->set_rules('article_price_apply', 'lang:title', 'trim|required');
		$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
		$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
		$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
		$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
		$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
		$this->form_validation->set_rules('article_langue', '', 'trim|required');
		$this->form_validation->set_rules('main_menu_id', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('sub_menu_id', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('article_status', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('article_hot', 'lang:lang_orther_num', 'numeric');
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$link= $this->input->post('article_title');
			if($link != '' && $link != NULL){
				$link = $link;
			} else {
				$link = $this->input->post('article_price_apply');
			}
			$data_ins = array(
				'uid'=>$session_data['id'],
				'order_article'=>$this->input->post('order_article'),
				'article_langue'=>$this->input->post('article_langue'),
				'categories_main_id'=>$this->input->post('main_menu_id'),
				'categories_sub_id'=>$this->input->post('sub_menu_id'),
				'article_lnk'=>mb_strtolower(url_title(removesign($link))),
				'article_seo_title'=>removeDauNhayKep($this->input->post('article_seo_title')),
				'article_key'=>removeDauNhayKep($this->input->post('article_key')),
				'article_des'=>removeDauNhayKep($this->input->post('article_des')),
				'article_picture_1'=>$this->input->post('article_picture_1'),
				'article_picture_2'=>$this->input->post('article_picture_2'),			
				'article_price'=>removeDauNhayKep($this->input->post('article_price')),
				'article_price_vn'=>removeDauNhayKep($this->input->post('article_price_vn')),
				'article_price_promo'=>removeDauNhayKep($this->input->post('article_price_promo')),
				'article_price_apply'=>$this->input->post('article_price_apply'),
				'article_quantity'=>removeDauNhayKep($this->input->post('article_quantity')),
				'article_size'=>removeDauNhayKep($this->input->post('article_size')),
				'article_title'=>removeDauNhayKep($this->input->post('article_title')),				
				'article_desc'=>str_replace("&nbsp;", " ", removeDauNhayKep($this->input->post('article_desc'))),
				'article_content'=>str_replace("&nbsp;", " ", $this->input->post('article_content')),
				'article_content_orther'=>str_replace("&nbsp;", " ", $this->input->post('article_content_orther')),
				'article_post_date'=>$this->input->post('article_post_date'),
				'article_status'=>$this->input->post('article_status'),
				'article_hot'=>$this->input->post('article_hot')
			);
			$b_Check_Ins = $this->db->insert("cms_articles_rooms",$data_ins);
			
			$pro_id = $this->db->insert_id();
			if($pro_id > 0 && $b_Check_Ins==1 && count($this->input->post('slidephoto'))>0){
				$slidephoto = $this->input->post('slidephoto');
				$slidephoto_order = $this->input->post('slidephotoorder');
				for($i=0;$i<count($this->input->post('slidephoto'));$i++)
				{
					if($slidephoto[$i] != NULL && $slidephoto[$i] != ""){
						$order_photo = $slidephoto_order[$i]?$slidephoto_order[$i]:0;
						$data_ins_photo = array(
							'pro_id'=>$pro_id,
							'pro_photo'=>$slidephoto[$i],
							'pro_photo_date'=>date("Y-m-d"),
							'pro_photo_order'=>$order_photo
						);
						$b_Check_Ins = $this->db->insert("cms_products_photo",$data_ins_photo);
					}
				}
			}				
			$b_Check = true;
		}
		$data["list_photo"] = array();
		if($this->input->post('slidephoto')){
			if(count($this->input->post('slidephoto'))>0){
				$slidephoto = $_POST['slidephoto'];
				for($i=0;$i<count($_POST['slidephoto']);$i++)
				{
					array_push($data["list_photo"], $slidephoto[$i]);
				}
			}
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect($this->session->userdata('page_back_link'), 'refresh');
		}
		else{
			$data['count'] = $this->M_rooms->record_count();
			$data["results_main_menu"] = $this->M_main_menu->listAllDataActiveRooms(1,'accommodation');
			$data['results_sub_menu'] = $this->M_sub_menu->listAllDataActive($data['results_main_menu'][0]['id'],1);
			$data['ckeditor'] = array(		
				'id' 	=> 	'article_content',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"FULL",
					'width' 	=> 	"100%",
					'height' 	=> 	'300px',
				)
			);
			$data['ckeditor1'] = array(		
				'id' 	=> 	'article_content_orther',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"FULL",
					'width' 	=> 	"100%",
					'height' 	=> 	'300px',				
				)
			);
			$this->load->view("admin/rooms/add", $data);	
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->M_rooms->getDataEdit($id);
		$data['results_main_menu'] = $this->M_main_menu->listAllDataActiveRooms(1,'accommodation');
		$data['results_sub_menu'] = $this->M_sub_menu->listAllDataActive($data["results_data_edit"][0]['categories_main_id'],1);
		$data["results_data_photo"] = $this->M_rooms->listPhotoSlide($id);
		$data["photo_cnt"] = $this->M_rooms->record_count_photo_slide($id);
		$data["list_photo"] =	NULL;
		$data['ckeditor'] = array(		
			'id' 	=> 	'article_content',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"FULL",
				'width' 	=> 	"100%",
				'height' 	=> 	'300px',
			)
		);
		$data['ckeditor1'] = array(		
			'id' 	=> 	'article_content_orther',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"FULL",
				'width' 	=> 	"100%",
				'height' 	=> 	'300px',				
			)
		);
		$this->load->view("admin/rooms/edit", $data);
	}
	public function proeditdata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('article_seo_title', 'lang:article_seo_title', 'trim|required');
		$this->form_validation->set_rules('article_key', 'lang:title_seo', 'trim|required');
		$this->form_validation->set_rules('article_des', 'lang:article_des_seo', 'trim|required');
		$this->form_validation->set_rules('order_article', 'lang:category_order', 'trim|required|numeric');
		$this->form_validation->set_rules('article_price', '', 'trim|required|numeric');
		$this->form_validation->set_rules('article_price_vn', '', 'trim|required|numeric');
		$this->form_validation->set_rules('article_price_promo', '', 'trim|required');
		$this->form_validation->set_rules('article_quantity', '', 'trim|required');
		$this->form_validation->set_rules('article_size', '', 'trim|required');
		$this->form_validation->set_rules('article_price_apply', 'lang:title', 'trim|required');
		$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
		$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
		$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
		$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
		$this->form_validation->set_rules('article_langue', '', 'trim|required');
		$this->form_validation->set_rules('main_menu_id', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('sub_menu_id', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('article_status', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('article_hot', 'lang:lang_orther_num', 'numeric');
		$b_Check = false;
		$b_Check_Ins = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			$link= $this->input->post('article_title');
			if($link != '' && $link != NULL){
				$link = $link;
			} else {
				$link = $this->input->post('article_price_apply');
			}
			$data_upd = array(
				'uid'=>$session_data['id'],
				'order_article'=>$this->input->post('order_article'),
				'article_langue'=>$this->input->post('article_langue'),
				'categories_main_id'=>$this->input->post('main_menu_id'),
				'categories_sub_id'=>$this->input->post('sub_menu_id'),
				'article_lnk'=>mb_strtolower(url_title(removesign($link))),
				'article_seo_title'=>removeDauNhayKep($this->input->post('article_seo_title')),
				'article_key'=>removeDauNhayKep($this->input->post('article_key')),
				'article_des'=>removeDauNhayKep($this->input->post('article_des')),
				'article_picture_1'=>$this->input->post('article_picture_1'),
				'article_picture_2'=>$this->input->post('article_picture_2'),
				'article_price'=>removeDauNhayKep($this->input->post('article_price')),
				'article_price_vn'=>removeDauNhayKep($this->input->post('article_price_vn')),
				'article_price_promo'=>removeDauNhayKep($this->input->post('article_price_promo')),
				'article_price_apply'=>$this->input->post('article_price_apply'),
				'article_quantity'=>removeDauNhayKep($this->input->post('article_quantity')),
				'article_size'=>removeDauNhayKep($this->input->post('article_size')),
				'article_title'=>removeDauNhayKep($this->input->post('article_title')),
				'article_desc'=>str_replace("&nbsp;", " ", removeDauNhayKep($this->input->post('article_desc'))),
				'article_content'=>str_replace("&nbsp;", " ", $this->input->post('article_content')),
				'article_content_orther'=>str_replace("&nbsp;", " ", $this->input->post('article_content_orther')),
				'article_post_date'=>$this->input->post('article_post_date'),
				'article_status'=>$this->input->post('article_status'),
				'article_hot'=>$this->input->post('article_hot')
			);
			if($this->input->post('idget')>0 && $this->input->post('idget')){
				$where = array('id' => $this->input->post("idget"));
				$this->db->where($where); 
				$b_Check_Ins = $this->db->update("cms_articles_rooms",$data_upd);
				if($this->input->post('idget')>0 && $this->input->post('idget') && $b_Check_Ins==1 && $this->input->post('slidephoto')){
					$slidephoto = $this->input->post('slidephoto');
					$slidephoto_order = $this->input->post('slidephotoorder');
					for($i=0;$i<count($this->input->post('slidephoto'));$i++)
					{
						$order_photo = $slidephoto_order[$i]?$slidephoto_order[$i]:0;							
						$data_ins_photo = array(
							'pro_id'=>$this->input->post("idget"),
							'pro_photo'=>$slidephoto[$i],
							'pro_photo_date'=>date("Y-m-d"),
							'pro_photo_order'=>$order_photo
						);
						$b_Check_Ins = $this->db->insert("cms_products_photo",$data_ins_photo);
					}
				}
				$b_Check = true;
			}
		}
		$data['b_Check']= $b_Check;
		$data['b_Check_Ins']= $b_Check_Ins;
		if($b_Check && $b_Check_Ins==1){
			redirect($this->session->userdata('page_back_link'), 'refresh');
		}
		else{
			$data['ckeditor'] = array(		
				'id' 	=> 	'article_content',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"FULL",
					'width' 	=> 	"100%",
					'height' 	=> 	'300px',
				)
			);
			$data['ckeditor1'] = array(		
				'id' 	=> 	'article_content_orther',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"FULL",
					'width' 	=> 	"100%",
					'height' 	=> 	'300px',				
				)
			);
			$data["list_photo"] = array();
			if($this->input->post('slidephoto')){
				if(count($_POST['slidephoto']>0)>0){
					$slidephoto = $_POST['slidephoto'];
					for($i=0;$i<count($_POST['slidephoto']);$i++)
					{
						array_push($data["list_photo"], $slidephoto[$i]);
					}
				}
			}
			$data["results_data_edit"] = $this->M_rooms->getDataEdit($this->input->post('idget'));
			$data['results_main_menu'] = $this->M_main_menu->listAllDataActiveRooms(1,'accommodation');
			$data['results_sub_menu'] = $this->M_sub_menu->listAllDataActive($data["results_data_edit"][0]['categories_main_id'],1);
			$data["results_data_photo"] = $this->M_rooms->listPhotoSlide($this->input->post('idget'));
			$data["photo_cnt"] = $this->M_rooms->record_count_photo_slide($this->input->post('idget'));
			$this->load->view("admin/rooms/edit", $data);
		}
	}
	public function updOrder(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('order_article', 'lang:category_order', 'trim|required|numeric');
		$data = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			$data_upd = array('order_article'=>$this->input->post('order_article'));
			if($this->input->post('id')>0 && $this->input->post('id')){
				$where = array('id' => $this->input->post("id"));
				$this->db->where($where); 
				$data = $this->db->update("cms_articles_rooms",$data_upd);
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
	public function delrecordphoto()
	{
		$session_data = $this->session->userdata('logged_in');
		if($this->session->userdata('logged_in')){
			$data = $this->M_rooms->delDataPhotoEdit($_POST['id']);
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
			$this->output->set_output($data);
		}
	}
	public function getSubFollowMain(){
		$mainid = $_POST['mainid'];
		echo json_encode($this->M_sub_menu->listAllDataActive($mainid,1));
	}
	public function getGroupMenu(){
		echo json_encode($this->M_main_menu->listAllData());
	}
	public function getLinkNameMenu($cateid){
		$subLinkName = "";
		$dataLink = $this->M_main_menu->getDataEdit($cateid);
		if($dataLink)
		{
		  foreach($dataLink as $row){
			$subLinkName = $row['category_lnk'].'/';
		  }
		}
		return $subLinkName;
	}
	public function getMainMenuLeft(){
		return $this->M_main_menu->listAllDataActive(1);
	}
	public function getSubMenuLeft($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
	public function duplicaterow(){
		$session_data = $this->session->userdata('logged_in');
		if($this->session->userdata('logged_in')){
			$primary_key_field = $_POST['id'];
			$primary_key_val = $_POST['nid'];
			$data = $this->M_rooms->duplicateRecord($primary_key_field, $primary_key_val);
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
			$this->output->set_output($data);
		}
	}
}