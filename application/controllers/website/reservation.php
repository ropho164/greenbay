<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reservation extends CI_Controller {
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
		$this->load->model("admin/M_email_sending");
		$this->load->model("admin/M_abouts");
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'vn';
		$this->session->set_userdata('site_lang', $data["language"]);
	}
	public function index($main_menu_link=''){
		/*$this->load->view("webiste/under");*/		
		$dateFromRight =  ($this->input->post("datetimepickerStartRight"))?$this->input->post("datetimepickerStartRight"):"";
		$dateToRight = ($this->input->post("datetimepickerEndRight"))?$this->input->post("datetimepickerEndRight"):"";
			
		$data["datestart"] = ($this->input->post("datetimepickerStart"))?$this->input->post("datetimepickerStart"):$dateFromRight;
		$data["dateend"] = ($this->input->post("datetimepickerEnd"))?$this->input->post("datetimepickerEnd"):$dateToRight;
		
		$adultFromRight =  ($this->input->post("ADULTRIGHT"))?$this->input->post("ADULTRIGHT"):0;
		$childToRight = ($this->input->post("CHILDRIGHT"))?$this->input->post("CHILDRIGHT"):0;
		$data["typeRooms"] = ($this->input->post("ROOMSTYPE"))?$this->input->post("ROOMSTYPE"):"0";
		$data["numRooms"] = ($this->input->post("ROOMS"))?$this->input->post("ROOMS"):"1";
		$data["numAdult"] = ($this->input->post("ADULT"))?$this->input->post("ADULT"):$adultFromRight;
		$data["numChild"] = ($this->input->post("CHILD"))?$this->input->post("CHILD"):$childToRight;
		
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		//echo $this->lang->line('key');
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_res");
		$data["results_rooms"] = $this->M_rooms->listDataActive(5, 0, $data["language"] ,1);
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		$this->load->view("webiste/reservation",$data);
	}
	public function booking(){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$fields = array(
			array('name' => 'date-from', 'title' => 'From', 'valid' => array('require'), 'err_message' => ''),
			array('name' => 'date-to', 'title' => 'To', 'valid' => array('require')),
			array('name' => 'numrooms', 'title' => 'frm_lbl_room_number', 'valid' => array('require')),
			array('name' => 'room-type', 'title' => 'Room', 'valid' => array('require')),
			array('name' => 'room-requirements', 'title' => 'Room requirements'),
			array('name' => 'adults', 'title' => 'Adults', 'valid' => array('require')),
			array('name' => 'children', 'title' => 'Children', 'valid' => array('require')),
			array('name' => 'name', 'title' => 'Name', 'valid' => array('require')),
			array('name' => 'email', 'title' => 'Email', 'valid' => array('require')),
			array('name' => 'phone', 'title' => 'Phone', 'valid' => array('require')),
			array('name' => 'special-requirements', 'title' => 'Special requirements')
		);
		
		$error_fields = array();
		$email_content = array();
		foreach ($fields as $field){
			$value = isset($_POST[$field['name']])?$_POST[$field['name']]:'';
			$title = empty($field['title'])?$field['name']:$field['title'];
			$email_content[] = $title.': '.nl2br(stripslashes($value));
			$is_valid = true;
			$err_message = '';
			if (!empty($field['valid'])){
				foreach ($field['valid'] as $valid) {
					switch ($valid) {
						case 'require':
							$is_valid = $is_valid && strlen($value) > 0;
							$err_message = $this->lang->line('frm_field_require');
							break;
						case 'email':
							$is_valid = $is_valid && preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $value);
							$err_message = $this->lang->line('frm_field_email');
							break;
						default:				
							break;
					}
				}
			}
			if (!$is_valid){
				if (!empty($field['err_message'])){
					$err_message = $field['err_message'];
				}
				$error_fields[] = array('name' => $field['name'], 'message' => $err_message);
			}
		}
		
		if (empty($error_fields)){
			$data_ins = array(
				'fname'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'phone'=>$this->input->post('phone'),
				'date_from'=>$this->input->post('date-from'),
				'date_to'=>$this->input->post('date-to'),
				'room_number'=>$this->input->post('numrooms'),
				'room_type'=>0,
				'room_name'=>$this->input->post('room-type'),
				'room_requirements'=>$this->input->post('room-requirements'),
				'adults'=>$this->input->post('adults'),
				'children'=>$this->input->post('children'),
				'special_requirements'=>$this->input->post('special-requirements'),
				'date_booking'=>date("Y-m-d"),
				'booking_status'=>0,
				'booking_payment'=>'0',
				'trans_feference'=>'0',
				'trans_number'=>'0',
				'booking_prepayment'=>0,
				'notes'=>''				
			);
			$b_Check_Ins = $this->db->insert("cms_reservation",$data_ins);	
			if($b_Check_Ins && $b_Check_Ins>0){
				$bookingHtml = '';
				$bookingHtml .= '<table width="500" border="1" align="center" cellpadding="0" cellspacing="0">';
				  $bookingHtml .= '<tbody>';
					$bookingHtml .= '<tr><th colspan="2" height="50" nowrap style="color: #0f9e4a"><h2>Reservation Info</h2></th></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">From</td><td style="padding-left: 5px">'.$data_ins['date_from'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">To</td><td style="padding-left: 5px">'.$data_ins['date_to'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Room type</td><td style="padding-left: 5px">'.$data_ins['room_type'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Room requirements</td><td style="padding-left: 5px">'.$data_ins['room_requirements'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Adults</td><td style="padding-left: 5px">'.$data_ins['adults'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Children</td><td style="padding-left: 5px">'.$data_ins['children'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Name</td><td style="padding-left: 5px">'.$data_ins['fname'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Email</td><td style="padding-left: 5px">'.$data_ins['email'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Phone</td><td style="padding-left: 5px">'.$data_ins['phone'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Special requirements</td><td style="padding-left: 5px">'.$data_ins['special_requirements'].'</td></tr>';
				  $bookingHtml .= '</tbody>';
				$bookingHtml .= '</table>';
				$results_data_email = $this->M_email_sending->get_one_email_newsletter();
				$config_email = array(
						'protocol' => 'smtp',
						'smtp_host' => $results_data_email[0]['smtp_host'],
						'smtp_user' => $results_data_email[0]['smtp_user'],
						'smtp_pass' => $results_data_email[0]['smtp_pass'],
						'_smtp_auth' => TRUE,
						'smtp_port' => $results_data_email[0]['smtp_port'],
						'smtp_timeout' => '30',
						'charset' => 'utf-8',
						'mailtype' => 'html',
						'wordwrap' => FALSE,
						'validate' => FALSE,
						'priority' => 1,
						'newline' => "\r\n",
						'crlf' => "\r\n"
				);
				$this->load->library('email',$config_email);       
				$this->email->from($results_data_email[0]['smtp_user'], $results_data_email[0]['smtp_name']);
				$this->email->to($results_data_email[0]['smtp_user']);    
				$this->email->subject("Customer Booking");
				$this->email->message(html_entity_decode($bookingHtml));
				$this->email->send();
				echo (json_encode(array('code' => 'success')));
			}
			else{
				echo json_encode(array('code' => 'failed'));	
			}
		}else{
			echo json_encode(array('code' => 'failed', 'fields' => $error_fields));
		}
	}
	public function getSubMenu($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
	public function sendMailBooking(){
		
	}
	public function getHotRooms($lang){
		return $this->M_rooms->listDataHotActive(1, 0,$lang,1,1);
	}
}
?>