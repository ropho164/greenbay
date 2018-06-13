<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Abouts extends CI_Controller {
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
		$this->load->helper('ckeditor');
		$this->load->model("admin/M_abouts");
		$this->load->model("admin/M_main_menu");
		$this->load->model("admin/M_sub_menu");
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		else{
			redirect('./admin/login', 'refresh');
		}
	}
	public function fillter()
	{	
		$session_data = $this->session->userdata('logged_in');
		$langue = ($this->uri->segment($this->config->item('langu'))) ? $this->uri->segment($this->config->item('langu')) : 'en';
		$types = ($this->uri->segment($this->config->item('types'))) ? $this->uri->segment($this->config->item('types')) : 1;
		$config = array();
		$config["first_link"]           = 'First';
		$config["next_link"]            = '&gt;';
		$config["prev_link"]            = '&lt;';
		$config["last_link"]            = 'Last';
		$config["base_url"] = base_url() . "admin/abouts/fillter/".$langue."/".$types;
		$config["total_rows"] = $this->M_abouts->record_count_fillter($langue,$types);
		$config["per_page"] = $this->config->item('per_page');
		$config["uri_segment"] = $this->config->item('pages-fillter-lang-type');
		$config["num_links"]			=  $this->config->item('num_links');
		$this->pagination->initialize($config);
		$page = ($this->uri->segment($this->config->item('pages-fillter-lang-type'))) ? $this->uri->segment($this->config->item('pages-fillter-lang-type')) : 0;
		$data["results"] = $this->M_abouts->listDataFillter($config["per_page"], $page, $langue,$types);
		$data["links"] = $this->pagination->create_links();
		$data['count'] = $this->M_abouts->record_count_fillter($langue,$types);
		$data['langue'] = $langue;
		$data['types'] = $types;
		$this->session->unset_userdata('page_back_link');
		$this->session->set_userdata('page_back_link',current_url());
		$this->load->view("admin/abouts/v_".$data["types"]."/list", $data);
	}
	public function delrecord()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = $this->M_abouts->delDataPhoto($_POST['id']);
		$data = $this->M_abouts->delData($_POST['id']);
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
				$data = $this->M_abouts->delDataPhoto($checkbox[$i]);
				$data = $this->M_abouts->delData($checkbox[$i]);				
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
		$langue = ($this->uri->segment($this->config->item('idgroup'))) ? $this->uri->segment($this->config->item('idgroup')) : 'en';
		$types = ($this->uri->segment($this->config->item('types'))) ? $this->uri->segment($this->config->item('types')) : 1;
		$data["langue"] = $langue;
		$data["types"] = $types;
		$data['count'] = $this->M_abouts->record_count_fillter($langue,$types);
		$data["list_photo"] = NULL;
		$data['ckeditor'] = array(		
			'id' 	=> 	'article_content',
			'path'	=>	'templates/js/ckeditor',			
			'config' => array(
				'toolbar' 	=> 	"FULL",
				'width' 	=> 	"100%",
				'height' 	=> 	'300px',
			)
		);
		$this->load->view("admin/abouts/v_".$data["types"]."/add", $data);
	}
	public function proaddata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		
		$this->form_validation->set_rules('article_langue', '', 'trim|required');
		$this->form_validation->set_rules('article_intro_type', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('article_status', 'lang:lang_orther_num', 'numeric');			
		$this->form_validation->set_rules('article_order', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('article_parent', 'lang:lang_orther_num', 'numeric');
		
		if($this->input->post('article_intro_type')==1 || $this->input->post('article_intro_type')==2){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
			
		}
		if($this->input->post('article_intro_type')==3 || $this->input->post('article_intro_type')==13){
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
		}
		if($this->input->post('article_intro_type')==4 || $this->input->post('article_intro_type')==5){
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_content_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content_1', 'lang:article_content', 'trim');
			$this->form_validation->set_rules('article_title_content_2', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content_2', 'lang:article_content', 'trim');
			$this->form_validation->set_rules('article_title_content_3', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_content_3', 'lang:article_content', 'trim|required');
			
			$this->form_validation->set_rules('article_title_files_1', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_files_1', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_files_2', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_files_2', 'lang:article_content', 'trim|required');

			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==6){
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_content_1', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_content_1', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_files_1', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_files_1', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==7 || $this->input->post('article_intro_type')==9){
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_files_1', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_files_1', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==8 || $this->input->post('article_intro_type')==10){
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==11){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==12){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_files_1', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_files_1', 'lang:article_content', 'trim|required');
		}
		if($this->input->post('article_intro_type')==14){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==15){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_title_content_1', '', 'trim');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			
		}
		if($this->input->post('article_intro_type')==16){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			
		}
		if($this->input->post('article_intro_type')==17){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_title_content_1', '', 'trim|required');
			$this->form_validation->set_rules('article_content_1', '', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');			
		}
		if($this->input->post('article_intro_type')==18){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('list_files', 'lang:list_files', 'trim|required');
		}
		if($this->input->post('article_intro_type')==19){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
		}
		if($this->input->post('article_intro_type')==20){
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			//$this->form_validation->set_rules('article_title_files_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_files_1', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==21){			
			$this->form_validation->set_rules('article_files_1', '', 'trim|required');			
		}
		$b_Check = false;
		$b_Check_Ins = 0;
		if($this->form_validation->run() == TRUE){
			$data_ins = array(
				'uid'=>$session_data['id'],
				'main_id'=>($this->input->post('main_id'))?$this->input->post('main_id'):0,
				'sub_id'=>($this->input->post('sub_id'))?$this->input->post('sub_id'):0,
				'article_langue'=>$this->input->post('article_langue'),
				'article_intro_type'=>$this->input->post('article_intro_type'),
				'article_title_1'=>removeDauNhayKep($this->input->post('article_title_1')),
				'article_title'=>removeDauNhayKep($this->input->post('article_title')),				
				'article_desc'=>str_replace("&nbsp;", " ", removeDauNhayKep($this->input->post('article_desc'))),		
				'article_content'=>str_replace("&nbsp;", " ", removeDauNhayKep($this->input->post('article_content'))),		
				'article_title_content_1'=>removeDauNhayKep($this->input->post('article_title_content_1')),
				'article_content_1'=>removeDauNhayKep($this->input->post('article_content_1')),				
				'article_title_content_2'=>removeDauNhayKep($this->input->post('article_title_content_2')),
				'article_content_2'=>removeDauNhayKep($this->input->post('article_content_2')),				
				'article_title_content_3'=>removeDauNhayKep($this->input->post('article_title_content_3')),
				'article_content_3'=>removeDauNhayKep($this->input->post('article_content_3')),				
				'article_title_content_4'=>removeDauNhayKep($this->input->post('article_title_content_4')),
				'article_content_4'=>removeDauNhayKep($this->input->post('article_content_4')),				
				'article_title_content_5'=>removeDauNhayKep($this->input->post('article_title_content_5')),
				'article_content_5'=>removeDauNhayKep($this->input->post('article_content_5')),				
				'article_title_content_6'=>removeDauNhayKep($this->input->post('article_title_content_6')),
				'article_content_6'=>removeDauNhayKep($this->input->post('article_content_6')),				
				'article_title_content_7'=>removeDauNhayKep($this->input->post('article_title_content_7')),
				'article_content_7'=>removeDauNhayKep($this->input->post('article_content_7')),				
				'article_title_content_8'=>removeDauNhayKep($this->input->post('article_title_content_8')),
				'article_content_8'=>removeDauNhayKep($this->input->post('article_content_8')),				
				'article_title_content_9'=>removeDauNhayKep($this->input->post('article_title_content_9')),
				'article_content_9'=>removeDauNhayKep($this->input->post('article_content_9')),				
				'article_title_content_10'=>removeDauNhayKep($this->input->post('article_title_content_10')),
				'article_content_10'=>removeDauNhayKep($this->input->post('article_content_10')),				
				'article_picture_1'=>$this->input->post('article_picture_1'),
				'article_picture_2'=>$this->input->post('article_picture_2'),
				'article_title_files_1'=>$this->input->post('article_title_files_1'),
				'article_files_1'=>$this->input->post('article_files_1'),
				'article_title_files_2'=>$this->input->post('article_title_files_2'),
				'article_files_2'=>$this->input->post('article_files_2'),
				'article_title_files_3'=>$this->input->post('article_title_files_3'),
				'article_files_3'=>$this->input->post('article_files_3'),
				'article_title_files_4'=>$this->input->post('article_title_files_4'),
				'article_files_4'=>$this->input->post('article_files_4'),
				'article_title_files_5'=>$this->input->post('article_title_files_5'),
				'article_files_5'=>$this->input->post('article_files_5'),
				'article_post_date'=>$this->input->post('article_post_date'),
				'article_parent'=>$this->input->post('article_parent'),
				'article_order'=>$this->input->post('article_order'),
				'article_status'=>$this->input->post('article_status')
			);
			$b_Check_Ins = $this->db->insert("cms_articles_abouts",$data_ins);
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
							'pro_photo_type'=>1,
							'pro_photo_date'=>date("Y-m-d"),
							'pro_photo_order'=>$order_photo
						);
						$b_Check_Ins = $this->db->insert("cms_products_photo",$data_ins_photo);
					}
				}
			}
			$b_Check = true;
		}
		$data["langue"] = $this->input->post('article_langue');
		$data["types"] = $this->input->post('article_intro_type');
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
			$data['ckeditor'] = array(		
				'id' 	=> 	'article_content',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"FULL",
					'width' 	=> 	"100%",
					'height' 	=> 	'300px',
				)
			);
			$data['count'] = $this->M_abouts->record_count_fillter($data["langue"],$data["types"]);
			$this->load->view("admin/abouts/v_".$data["types"]."/add", $data);	
		}
	}
	public function editdata(){
		$session_data = $this->session->userdata('logged_in');
		$id = ($this->uri->segment($this->config->item('uri_segment_id'))) ? $this->uri->segment($this->config->item('uri_segment_id')) : 0;
		$data["results_data_edit"] = $this->M_abouts->getDataEdit($id);
		$data["results_data_photo"] = $this->M_abouts->listPhotoSlide($id);
		$data["photo_cnt"] = $this->M_abouts->record_count_photo_slide($id);
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
		$this->load->view("admin/abouts/v_".$data["results_data_edit"][0]["article_intro_type"]."/edit", $data);
	}
	public function proeditdata(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('article_langue', '', 'trim|required');
		$this->form_validation->set_rules('article_intro_type', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('article_status', 'lang:lang_orther_num', 'numeric');			
		$this->form_validation->set_rules('article_order', 'lang:lang_orther_num', 'numeric');
		$this->form_validation->set_rules('article_parent', 'lang:lang_orther_num', 'numeric');
		
		if($this->input->post('article_intro_type')==1 || $this->input->post('article_intro_type')==2){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
			
		}
		if($this->input->post('article_intro_type')==3 || $this->input->post('article_intro_type')==13){
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
		}
		if($this->input->post('article_intro_type')==4 || $this->input->post('article_intro_type')==5){
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_content_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content_1', 'lang:article_content', 'trim');
			$this->form_validation->set_rules('article_title_content_2', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content_2', 'lang:article_content', 'trim');
			$this->form_validation->set_rules('article_title_content_3', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_content_3', 'lang:article_content', 'trim|required');
			
			$this->form_validation->set_rules('article_title_files_1', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_files_1', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_files_2', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_files_2', 'lang:article_content', 'trim|required');

			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==6){
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_content_1', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_content_1', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_files_1', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_files_1', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==7 || $this->input->post('article_intro_type')==9){
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_files_1', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_files_1', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==8 || $this->input->post('article_intro_type')==10){
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==11){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			
		}
		if($this->input->post('article_intro_type')==12){
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_title_files_1', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_files_1', 'lang:article_content', 'trim|required');
		}
		if($this->input->post('article_intro_type')==14){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==15){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_title_content_1', '', 'trim');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');			
		}
		if($this->input->post('article_intro_type')==16){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');			
		}
		if($this->input->post('article_intro_type')==17){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_title_content_1', '', 'trim|required');
			$this->form_validation->set_rules('article_content_1', '', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');			
		}
		if($this->input->post('article_intro_type')==18){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');			
		}
		if($this->input->post('article_intro_type')==19){			
			//$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_title_1', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim');
			$this->form_validation->set_rules('article_desc', 'lang:article_desc', 'trim|required');
		}
		if($this->input->post('article_intro_type')==20){
			$this->form_validation->set_rules('article_title', 'lang:title', 'trim|required');
			$this->form_validation->set_rules('article_content', 'lang:article_content', 'trim|required');
			//$this->form_validation->set_rules('article_title_files_1', 'lang:title', 'trim|required');
			//$this->form_validation->set_rules('article_files_1', 'lang:article_content', 'trim|required');
			$this->form_validation->set_rules('article_picture_1', 'lang:article_picture_1', 'trim|required');
			$this->form_validation->set_rules('article_picture_2', 'lang:article_picture_1', 'trim|required');
		}
		if($this->input->post('article_intro_type')==21){			
			$this->form_validation->set_rules('article_files_1', '', 'trim|required');			
		}
		$b_Check = false;
		$b_Check_Ins = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			$data_upd = array(
				'uid'=>$session_data['id'],
				'main_id'=>($this->input->post('main_id'))?$this->input->post('main_id'):0,
				'sub_id'=>($this->input->post('sub_id'))?$this->input->post('sub_id'):0,
				'article_langue'=>$this->input->post('article_langue'),
				'article_intro_type'=>$this->input->post('article_intro_type'),
				'article_title_1'=>removeDauNhayKep($this->input->post('article_title_1')),
				'article_title'=>removeDauNhayKep($this->input->post('article_title')),				
				'article_desc'=>str_replace("&nbsp;", " ", removeDauNhayKep($this->input->post('article_desc'))),		
				'article_content'=>str_replace("&nbsp;", " ", removeDauNhayKep($this->input->post('article_content'))),
				'article_title_content_1'=>removeDauNhayKep($this->input->post('article_title_content_1')),
				'article_content_1'=>removeDauNhayKep($this->input->post('article_content_1')),				
				'article_title_content_2'=>removeDauNhayKep($this->input->post('article_title_content_2')),
				'article_content_2'=>removeDauNhayKep($this->input->post('article_content_2')),				
				'article_title_content_3'=>removeDauNhayKep($this->input->post('article_title_content_3')),
				'article_content_3'=>removeDauNhayKep($this->input->post('article_content_3')),				
				'article_title_content_4'=>removeDauNhayKep($this->input->post('article_title_content_4')),
				'article_content_4'=>removeDauNhayKep($this->input->post('article_content_4')),				
				'article_title_content_5'=>removeDauNhayKep($this->input->post('article_title_content_5')),
				'article_content_5'=>removeDauNhayKep($this->input->post('article_content_5')),				
				'article_title_content_6'=>removeDauNhayKep($this->input->post('article_title_content_6')),
				'article_content_6'=>removeDauNhayKep($this->input->post('article_content_6')),				
				'article_title_content_7'=>removeDauNhayKep($this->input->post('article_title_content_7')),
				'article_content_7'=>removeDauNhayKep($this->input->post('article_content_7')),				
				'article_title_content_8'=>removeDauNhayKep($this->input->post('article_title_content_8')),
				'article_content_8'=>removeDauNhayKep($this->input->post('article_content_8')),				
				'article_title_content_9'=>removeDauNhayKep($this->input->post('article_title_content_9')),
				'article_content_9'=>removeDauNhayKep($this->input->post('article_content_9')),				
				'article_title_content_10'=>removeDauNhayKep($this->input->post('article_title_content_10')),
				'article_content_10'=>removeDauNhayKep($this->input->post('article_content_10')),
				'article_picture_1'=>$this->input->post('article_picture_1'),
				'article_picture_2'=>$this->input->post('article_picture_2'),
				'article_title_files_1'=>$this->input->post('article_title_files_1'),
				'article_files_1'=>$this->input->post('article_files_1'),
				'article_title_files_2'=>$this->input->post('article_title_files_2'),
				'article_files_2'=>$this->input->post('article_files_2'),
				'article_title_files_3'=>$this->input->post('article_title_files_3'),
				'article_files_3'=>$this->input->post('article_files_3'),
				'article_title_files_4'=>$this->input->post('article_title_files_4'),
				'article_files_4'=>$this->input->post('article_files_4'),
				'article_title_files_5'=>$this->input->post('article_title_files_5'),
				'article_files_5'=>$this->input->post('article_files_5'),
				'article_post_date'=>$this->input->post('article_post_date'),
				'article_parent'=>$this->input->post('article_parent'),
				'article_order'=>$this->input->post('article_order'),
				'article_status'=>$this->input->post('article_status')
			);
			if($this->input->post('idget')>0 && $this->input->post('idget')){
				$where = array('id' => $this->input->post("idget"));
				$this->db->where($where); 
				$b_Check_Ins = $this->db->update("cms_articles_abouts",$data_upd);
				if($this->input->post('idget')>0 && $this->input->post('idget') && $b_Check_Ins==1 && $this->input->post('slidephoto')){
					$slidephoto = $this->input->post('slidephoto');
					$slidephoto_order = $this->input->post('slidephotoorder');
					for($i=0;$i<count($this->input->post('slidephoto'));$i++)
					{
						$order_photo = $slidephoto_order[$i]?$slidephoto_order[$i]:0;					
						$data_ins_photo = array(
							'pro_id'=>$this->input->post("idget"),
							'pro_photo'=>$slidephoto[$i],
							'pro_photo_type'=>1,
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
			$data['ckeditor'] = array(		
				'id' 	=> 	'article_content',
				'path'	=>	'templates/js/ckeditor',			
				'config' => array(
					'toolbar' 	=> 	"FULL",
					'width' 	=> 	"100%",
					'height' 	=> 	'300px',
				)
			);
			$data["results_data_edit"] = $this->M_abouts->getDataEdit($this->input->post('idget'));
			$data["results_data_photo"] = $this->M_abouts->listPhotoSlide($this->input->post('idget'));
			$data["photo_cnt"] = $this->M_abouts->record_count_photo_slide($this->input->post('idget'));
			$this->load->view("admin/abouts/v_".$data["results_data_edit"][0]["article_intro_type"]."/edit", $data);
		}
	}
	public function delrecordphoto()
	{
		$session_data = $this->session->userdata('logged_in');
		if($this->session->userdata('logged_in')){
			$data = $this->M_abouts->delDataPhotoEdit($_POST['id']);
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
			$this->output->set_output($data);
		}
	}
	public function duplicaterow(){
		$session_data = $this->session->userdata('logged_in');
		if($this->session->userdata('logged_in')){
			$primary_key_field = $_POST['id'];
			$primary_key_val = $_POST['nid'];
			$data = $this->M_abouts->duplicateRecord($primary_key_field, $primary_key_val);
			$this->output->set_content_type('Content-Type: text/html; charset=utf-8;');
			$this->output->set_output($data);
		}
	}
	public function updOrder(){
		$session_data = $this->session->userdata('logged_in');
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('numeric', $this->lang->line('numeric'));
		$this->form_validation->set_rules('article_order', 'lang:category_order', 'trim|required|numeric');
		$data = 0;
		$data_upd = array();
		if($this->form_validation->run() == TRUE){
			$data_upd = array('article_order'=>$this->input->post('article_order'));
			if($this->input->post('id')>0 && $this->input->post('id')){
				$where = array('id' => $this->input->post("id"));
				$this->db->where($where); 
				$data = $this->db->update("cms_articles_abouts",$data_upd);
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