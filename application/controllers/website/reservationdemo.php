<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reservationdemo extends CI_Controller {
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
		$this->load->model("admin/M_booking");
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'vn';
		$this->session->set_userdata('site_lang', $data["language"]);
	}
	public function index($main_menu_link=''){
		/*$this->load->view("webiste/under");*/		
		$dateFromRight =  ($this->input->post("datetimepickerStartRight"))?$this->input->post("datetimepickerStartRight"):"";
		$dateToRight = ($this->input->post("datetimepickerEndRight"))?$this->input->post("datetimepickerEndRight"):"";
			
		$data["datestart"] = ($this->input->post("datetimepickerStart"))?$this->input->post("datetimepickerStart"):$dateFromRight;		
		$data["dateend"] = ($this->input->post("datetimepickerEnd"))?$this->input->post("datetimepickerEnd"):$dateToRight;
		
		if($data["datestart"]=='' || $data["dateend"]==''){
			$data["datestart"] = date("Y/m/d");
			$data["dateend"]  = date("Y/m/d", strtotime("+1 days"));
		}
		
		$adultFromRight =  ($this->input->post("ADULTRIGHT"))?$this->input->post("ADULTRIGHT"):0;
		$childToRight = ($this->input->post("CHILDRIGHT"))?$this->input->post("CHILDRIGHT"):0;
		$data["typeRooms"] = ($this->input->post("ROOMSTYPE"))?$this->input->post("ROOMSTYPE"):0;
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
		/*
		$data["roomsBooked"] = $this->M_booking->checkRoomAvailible(4,$data["datestart"],$data["dateend"]);
		$data["days"] = $this->datediff($data["datestart"],$data["dateend"]);
		
		if($data["days"]<=0){
			$data["days"] = 0;
		}
		*/
		$this->load->view("webiste/reservation_payment",$data);
	}
	public function booking(){
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		
		$paymethod = $this->input->post('payment-methods');			
		$date_from = $this->input->post('date-from');
		$date_to = $this->input->post('date-to');
		$room_type = $this->input->post('room-type');
		$room_number = $this->input->post('numrooms');
		$amount_prepayment = $this->input->post('prepayment_amount');
		$room_price = 0;
		$totalAmount = 0;
		$room_name = '';
		$prepay = 9999999999999999999999999999999999999990;
		$info_room = $this->M_rooms->getRoomPrice(1,0,$data["language"],$room_type,1);
		if($info_room && sizeof($info_room)>0){
			//check again room availible
			$roomsBooked = $this->M_booking->checkRoomAvailible($room_type,$date_from,$date_to);
			//calculator again num days
			$info_days = $this->datediff($date_from,$date_to);
			
			$room_name = $info_room[0]['sub_name_en'];
				
			$room_type = $info_room[0]['categories_sub_id'];
			
			$room_quantity = $info_room[0]['article_quantity']-$roomsBooked;
			
			$room_price = $info_room[0]['article_price_vn'];
			
			$totalAmount = $room_price*$room_number*$info_days;
			
			$prepay = round($totalAmount/2);
		}
		if($paymethod==0){
			$amount_prepayment = 0;
		}
		
		$fields = array(
			array('name' => 'date-from', 'title' => 'From', 'valid' => array('require'), 'err_message' => ''),
			array('name' => 'date-to', 'title' => 'To', 'valid' => array('require')),
			array('name' => 'numrooms', 'title' => 'frm_lbl_room_number', 'valid' => array('require','numeric')),
			array('name' => 'room-type', 'title' => 'Room', 'valid' => array('require')),
			array('name' => 'room-requirements', 'title' => 'Room requirements'),
			array('name' => 'adults', 'title' => 'Adults', 'valid' => array('require')),
			array('name' => 'children', 'title' => 'Children', 'valid' => array('require')),
			array('name' => 'name', 'title' => 'Name', 'valid' => array('require')),
			array('name' => 'email', 'title' => 'Email', 'valid' => array('require')),
			array('name' => 'phone', 'title' => 'Phone', 'valid' => array('require')),
			array('name' => 'prepayment_amount', 'title' => 'Prepayment', 'valid' => array('custom_method')),
			array('name' => 'special-requirements', 'title' => 'Special requirements'),
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
						case 'numeric':
							$is_valid = $is_valid && $value > 0 && $value <= $room_quantity;
							$err_message = $this->lang->line('frm_num_of_room');
							break;
						case 'custom_method':
							if($paymethod >0){
								$is_valid = $is_valid && $value >= $prepay;
							}else{
								$is_valid = $is_valid;
							}
							$err_message = $this->lang->line('frm_field_prepayment');
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
				'room_type'=>$this->input->post('room-type'),
				'room_name'=>$room_name,
				'room_requirements'=>$this->input->post('room-requirements'),
				'adults'=>$this->input->post('adults'),
				'children'=>$this->input->post('children'),
				'special_requirements'=>$this->input->post('special-requirements'),
				'date_booking'=>date("Y-m-d"),
				'booking_payment'=>$paymethod,
				'trans_feference'=>'0',
				'trans_number'=>'0',
				'booking_prepayment'=>$amount_prepayment,
				'booking_status'=>0,
				'notes'=>''				
			);
			if($paymethod==0){
				$b_Check_Ins = $this->M_booking->insData($data_ins);	
				if($b_Check_Ins && $b_Check_Ins>0){
					$this->sendMailBookingNoPayment($data_ins);
					echo (json_encode(array('code' => 'success','meth' => $paymethod)));
				}
				else{
					echo json_encode(array('code' => 'failed'));	
				}
			}
			elseif($paymethod==1){
				$this->session->set_userdata('info_client',$data_ins);
				echo (json_encode(array('code' => 'success','meth' => $paymethod,'url' => base_url().$data["language"].'/reservation/local-payment')));
			}
			elseif($paymethod==2){
				$this->session->set_userdata('info_client',$data_ins);
				echo (json_encode(array('code' => 'success','meth' => $paymethod,'url' => base_url().$data["language"].'/reservation/international-payment')));
			}
		}else{
			echo json_encode(array('code' => 'failed', 'fields' => $error_fields));
		}
	}
	public function getSubMenu($mainid){
		return $this->M_sub_menu->listAllDataActive($mainid,1);
	}
	public function sendMailBookingNoPayment($obj){
		if($obj && sizeof($obj)>0){
			$bookingHtml = '';
			$bookingHtml .= '<table width="500" border="1" align="center" cellpadding="0" cellspacing="0">';
			  $bookingHtml .= '<tbody>';
				$bookingHtml .= '<tr><th colspan="2" height="50" nowrap style="color: #0f9e4a"><h2>Reservation Info</h2></th></tr>';
				$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">From</td><td style="padding-left: 5px">'.$obj['date_from'].'</td></tr>';
				$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">To</td><td style="padding-left: 5px">'.$obj['date_to'].'</td></tr>';
				$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Room type</td><td style="padding-left: 5px">'.$obj['room_name'].'</td></tr>';
				$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Room requirements</td><td style="padding-left: 5px">'.$obj['room_requirements'].'</td></tr>';
				$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Adults</td><td style="padding-left: 5px">'.$obj['adults'].'</td></tr>';
				$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Children</td><td style="padding-left: 5px">'.$obj['children'].'</td></tr>';
				$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Name</td><td style="padding-left: 5px">'.$obj['fname'].'</td></tr>';
				$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Email</td><td style="padding-left: 5px">'.$obj['email'].'</td></tr>';
				$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Phone</td><td style="padding-left: 5px">'.$obj['phone'].'</td></tr>';
				$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Special requirements</td><td style="padding-left: 5px">'.$obj['special_requirements'].'</td></tr>';
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
		}
	}
	public function sendMailBooking($obj){
		$info_payment = $this->session->userdata('info_client');
		if($info_payment && sizeof($info_payment)>0){
			if($obj && sizeof($obj)>0){
				$info_room = $this->M_rooms->getRoomPrice(1,0,'en',$obj['room_type'],1);
				$bookingHtml = '';
				$bookingHtml .= '<table width="500" border="1" align="center" cellpadding="0" cellspacing="0">';
				  $bookingHtml .= '<tbody>';
					$bookingHtml .= '<tr><th colspan="2" height="50" nowrap style="color: #0f9e4a"><h2>Reservation Info</h2></th></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">From</td><td style="padding-left: 5px">'.$obj['date_from'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">To</td><td style="padding-left: 5px">'.$obj['date_to'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Room type</td><td style="padding-left: 5px">'.$obj['room_name'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Room of price</td><td style="padding-left: 5px">US $'.$info_room[0]['article_price'].'<br/>'. smarty_vnd($info_room[0]['article_price_vn']).'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Prepayment</td><td style="padding-left: 5px">'.smarty_vnd($obj['booking_prepayment']).'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Transaction Number</td><td style="padding-left: 5px">'.$obj['trans_number'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Room requirements</td><td style="padding-left: 5px">'.$obj['room_requirements'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Adults</td><td style="padding-left: 5px">'.$obj['adults'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Children</td><td style="padding-left: 5px">'.$obj['children'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Name</td><td style="padding-left: 5px">'.$obj['fname'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Email</td><td style="padding-left: 5px">'.$obj['email'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Phone</td><td style="padding-left: 5px">'.$obj['phone'].'</td></tr>';
					$bookingHtml .= '<tr><td width="180" height="35" style="padding-left: 5px">Special requirements</td><td style="padding-left: 5px">'.$obj['special_requirements'].'</td></tr>';
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
			}
		}
	}
	function datediff($date1, $date2) { 
		$diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
        return $days;
	}
	public function getPriceRoomType(){
		$data = array();
		$langu = ($this->input->post('langu'))?$this->input->post('langu'):'en';
		$type = ($this->input->post('type'))?$this->input->post('type'):0;
		$dfrom = ($this->input->post('pfrom'))?$this->input->post('pfrom'):0;
		$dto = ($this->input->post('pto'))?$this->input->post('pto'):0;
		$rs = $this->M_rooms->getRoomPrice(1,0,$langu,$type,1);
		if($rs && sizeof($rs)>0){
			$roomsBooked = $this->M_booking->checkRoomAvailible($type,$dfrom,$dto);
			$data['room_type'] = $rs[0]['categories_sub_id'];
			$data['room_quantity'] = $rs[0]['article_quantity']-$roomsBooked;
			$data['price_en'] = $rs[0]['article_price'];
			$data['price_vn'] = $rs[0]['article_price_vn'];
			$data['price_vn_view'] = smarty_vnd($rs[0]['article_price_vn']);
		}
		else{
			$data['room_type'] = 0;
		}
		echo json_encode($data);
	}
	public function atmPayment(){
		$data['infobook'] = '';
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_res");
		$data["results_rooms"] = $this->M_rooms->listDataActive(5, 0, $data["language"] ,1);
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		//$this->session->unset_userdata('info_client');
		$info_payment = $this->session->userdata('info_client');
		if($info_payment && sizeof($info_payment)>0){
			$vpc_Amount = $info_payment['booking_prepayment'];
			$vpc_Customer_Email = $info_payment['email'];
			$vpc_Customer_Phone = $info_payment['phone'];
			$stringHashData = "";
			$appendAmp = 0;
			$transRefer = date('YmdHis').rand().strtotime(date('YmdHis'));
			//config
			$SECURE_SECRET = "A3EFDFABA8653DF2342E8DAC29B51AF0";
			$accesscode = 'D67342C2';
			$merchant = 'ONEPAY';
			$vpcURL = 'https://mtf.onepay.vn/onecomm-pay/vpc.op?';
			$config_pament = array(
				'Title'=>'VPC 3-Party',
				'vpc_AccessCode'=>$accesscode,
				'vpc_Amount'=>$vpc_Amount*100,
				'vpc_Command'=>'pay',
				'vpc_Currency'=>'VND',
				'vpc_Customer_Email'=>$vpc_Customer_Email,
				'vpc_Customer_Phone'=>$vpc_Customer_Phone,
				'vpc_Locale'=>$data["language"],
				'vpc_MerchTxnRef'=>$transRefer,
				'vpc_Merchant'=>$merchant,
				'vpc_OrderInfo'=>'BOOKING ROOM ON GREENBAY',
				'vpc_ReturnURL'=>base_url().$data["language"].'/reservation/local-payment-process',
				'vpc_Version'=>2
			);
			foreach($config_pament as $key => $value) {
				if (strlen($value) > 0) {
					if ($appendAmp == 0) {
						$vpcURL .= urlencode($key) . '=' . urlencode($value);
						$appendAmp = 1;
					} else {
						$vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
					}
					if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
						$stringHashData .= $key . "=" . $value . "&";
					}
				}
			}
			$stringHashData = rtrim($stringHashData, "&");
			if (strlen($SECURE_SECRET) > 0) {
				$vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $stringHashData, pack('H*',$SECURE_SECRET)));
			}
			redirect($vpcURL);
		}
		else{
			$data['msg_line'] = $this->lang->line('frm_session_timeout');
			$this->load->view("webiste/reservation-timeout",$data);
		}
	}
	public function atmPaymentProcess(){
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$SECURE_SECRET = "A3EFDFABA8653DF2342E8DAC29B51AF0";
		$vpc_Txn_Secure_Hash = $_GET ["vpc_SecureHash"];
		unset ( $_GET ["vpc_SecureHash"] );
		$errorExists = false;
		ksort ($_GET);
		if (strlen ( $SECURE_SECRET ) > 0 && $_GET ["vpc_TxnResponseCode"] != "7" && $_GET ["vpc_TxnResponseCode"] != "No Value Returned") {
			$stringHashData = "";
			foreach ( $_GET as $key => $value ) {
				if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
					$stringHashData .= $key . "=" . $value . "&";
				}
			}
			$stringHashData = rtrim($stringHashData, "&");
			if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper(hash_hmac('SHA256', $stringHashData, pack('H*',$SECURE_SECRET)))) {
				$hashValidated = "CORRECT";
			} else {
				$hashValidated = "INVALID HASH";
			}
		} else {
			$hashValidated = "INVALID HASH";
		}
		$amount = $this->null2unknown( $_GET ["vpc_Amount"] );
		$locale = $this->null2unknown ( $_GET ["vpc_Locale"] );
		$command = $this->null2unknown ( $_GET ["vpc_Command"] );
		$version = $this->null2unknown ( $_GET ["vpc_Version"] );
		$orderInfo = $this->null2unknown ( $_GET ["vpc_OrderInfo"] );
		$merchantID = $this->null2unknown ( $_GET ["vpc_Merchant"] );
		$merchTxnRef = $this->null2unknown ( $_GET ["vpc_MerchTxnRef"] );
		$transactionNo = $this->null2unknown ( $_GET ["vpc_TransactionNo"] );
		$txnResponseCode = $this->null2unknown ( $_GET ["vpc_TxnResponseCode"] );
		$transStatus = -1;
		if($hashValidated=="CORRECT" && $txnResponseCode=="0"){
			$transStatus = 0;
		}elseif ($hashValidated=="INVALID HASH" && $txnResponseCode=="0"){
			$transStatus = 1;
		}else {
			$transStatus = 2;
		}
		if($transStatus==0){
			$info_payment = $this->session->userdata('info_client');
			$info_payment['trans_feference']=$merchTxnRef;
			$info_payment['trans_number']=$transactionNo;
			$this->session->set_userdata('info_client',$info_payment);
		}
		$data['infobook'] = '';
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_res");
		$data["results_rooms"] = $this->M_rooms->listDataActive(5, 0, $data["language"] ,1);
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($transStatus==0){			
			redirect(base_url().$this->session->userdata('site_lang').'/reservation/booking-proccess?strans='.$transStatus.'&scode='.$txnResponseCode, 'refresh');
		}
		else if($transStatus==1){
			$data['msg_line'] = $this->lang->line('trans_session_pendding');
			$this->load->view("webiste/reservation-timeout",$data);
		}
		else if($transStatus==2){
			$data['msg_line'] = $this->lang->line('trans_session_fail');
			$this->load->view("webiste/reservation-timeout",$data);
		}
		else{
			$data['msg_line'] = $this->getResponseDescription($txnResponseCode);
			$this->load->view("webiste/reservation-timeout",$data);
		}
	}
	public function internationalPayment(){
		$data['infobook']='';
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_res");
		$data["results_rooms"] = $this->M_rooms->listDataActive(5, 0, $data["language"] ,1);
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		/*
		$data_ins = array(
			'fname'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'phone'=>$this->input->post('phone'),
			'date_from'=>$this->input->post('date-from'),
			'date_to'=>$this->input->post('date-to'),
			'room_number'=>$this->input->post('numrooms'),
			'room_type'=>$this->input->post('room-type'),
			'room_requirements'=>$this->input->post('room-requirements'),
			'adults'=>$this->input->post('adults'),
			'children'=>$this->input->post('children'),
			'special_requirements'=>$this->input->post('special-requirements'),
			'date_booking'=>date("Y-m-d"),
			'booking_payment'=>$paymethod,
			'trans_feference'=>'0',
			'trans_number'=>'0',
			'booking_prepayment'=>$amount_prepayment,
			'booking_status'=>0,
			'notes'=>''				
		);
		*/
		//$this->session->unset_userdata('info_client');
		$info_payment = $this->session->userdata('info_client');
		if($info_payment && sizeof($info_payment)>0){
			$vpc_Amount = $info_payment['booking_prepayment'];
			$vpc_Customer_Email = $info_payment['email'];
			$vpc_Customer_Phone = $info_payment['phone'];
			$md5HashData = "";
			$appendAmp = 0;
			$transRefer = date('YmdHis').rand().strtotime(date('YmdHis'));
			//config
			$SECURE_SECRET = "6D0870CDE5F24F34F3915FB0045120DB";
			$accesscode = '6BEB2546';
			$merchant = 'TESTONEPAY';
			$vpcURL = 'https://mtf.onepay.vn/vpcpay/vpcpay.op?';
			$config_pament = array(
				'AVS_City'=>'',
				'AVS_Country'=>'',
				'AVS_PostCode'=>'',
				'AVS_StateProv'=>'',
				'AVS_Street01'=>'',
				'AgainLink'=>"'".base_url()."en/reservation-demo/'",
				'Title'=>'VPC 3-Party',
				'display'=>'',
				'vpc_AccessCode'=>$accesscode,
				'vpc_Amount'=>$vpc_Amount*100,
				'vpc_Command'=>'pay',
				'vpc_Customer_Email'=>$vpc_Customer_Email,
				'vpc_Customer_Id'=>'',
				'vpc_Customer_Phone'=>$vpc_Customer_Phone,
				'vpc_Locale'=>$data["language"],
				'vpc_MerchTxnRef'=>$transRefer,
				'vpc_Merchant'=>$merchant,
				'vpc_OrderInfo'=>'BOOKING ROOM ON GREENBAY',
				'vpc_ReturnURL'=>base_url().$data["language"].'/reservation/international-payment-process',
				'vpc_SHIP_City'=>'',
				'vpc_SHIP_Country'=>'',
				'vpc_SHIP_Provice'=>'',
				'vpc_SHIP_Street01'=>'',
				'vpc_TicketNo'=>'',
				'vpc_Version'=>'2',
			);
			foreach($config_pament as $key => $value) {
				if (strlen($value) > 0) {
					if ($appendAmp == 0) {
						$vpcURL .= urlencode($key) . '=' . urlencode($value);
						$appendAmp = 1;
					} else {
						$vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
					}
					if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
						$md5HashData .= $key . "=" . $value . "&";
					}
				}
			}
			$md5HashData = rtrim($md5HashData, "&");
			if (strlen($SECURE_SECRET) > 0) {
				$vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$SECURE_SECRET)));
			}
			redirect($vpcURL);			
		}
		else{
			$this->load->view("webiste/reservation-timeout",$data);
		}
	}
	public function internalPaymentProcess(){
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$SECURE_SECRET = "6D0870CDE5F24F34F3915FB0045120DB";
		$vpc_Txn_Secure_Hash = $_GET["vpc_SecureHash"];
		$vpc_MerchTxnRef = $_GET["vpc_MerchTxnRef"];
		unset($_GET["vpc_SecureHash"]);
		$errorExists = false;
		if (strlen($SECURE_SECRET) > 0 && $_GET["vpc_TxnResponseCode"] != "7" && $_GET["vpc_TxnResponseCode"] != "No Value Returned") {
			ksort($_GET);
			$md5HashData = "";
			foreach ($_GET as $key => $value) {
				if ($key != "vpc_SecureHash" && (strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
					$md5HashData .= $key . "=" . $value . "&";
				}
			}
			$md5HashData = rtrim($md5HashData, "&");
			if (strtoupper ( $vpc_Txn_Secure_Hash ) == strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$SECURE_SECRET)))) {
				$hashValidated = "CORRECT";
			} else {
				$hashValidated = "INVALID HASH";
			}
		} else {
			$hashValidated = "INVALID HASH";
		}
		$amount = $this->null2unknown($_GET["vpc_Amount"]);
		$locale = $this->null2unknown($_GET["vpc_Locale"]);
		$command = $this->null2unknown($_GET["vpc_Command"]);
		$message = $this->null2unknown($_GET["vpc_Message"]);
		$version = $this->null2unknown($_GET["vpc_Version"]);
		$orderInfo = $this->null2unknown($_GET["vpc_OrderInfo"]);
		$merchantID = $this->null2unknown($_GET["vpc_Merchant"]);
		$merchTxnRef = $this->null2unknown($_GET["vpc_MerchTxnRef"]);
		if (isset($_GET['vpc_TransactionNo'])){
			$transactionNo = $this->null2unknown($_GET["vpc_TransactionNo"]);
		}else{
			$transactionNo = 0;
		}
		$txnResponseCode = $this->null2unknown($_GET["vpc_TxnResponseCode"]);
		// 3-D Secure Data
		$verType = array_key_exists("vpc_VerType", $_GET) ? $_GET["vpc_VerType"] : "No Value Returned";
		$verStatus = array_key_exists("vpc_VerStatus", $_GET) ? $_GET["vpc_VerStatus"] : "No Value Returned";
		$token = array_key_exists("vpc_VerToken", $_GET) ? $_GET["vpc_VerToken"] : "No Value Returned";
		$verSecurLevel = array_key_exists("vpc_VerSecurityLevel", $_GET) ? $_GET["vpc_VerSecurityLevel"] : "No Value Returned";
		$enrolled = array_key_exists("vpc_3DSenrolled", $_GET) ? $_GET["vpc_3DSenrolled"] : "No Value Returned";
		$xid = array_key_exists("vpc_3DSXID", $_GET) ? $_GET["vpc_3DSXID"] : "No Value Returned";
		$acqECI = array_key_exists("vpc_3DSECI", $_GET) ? $_GET["vpc_3DSECI"] : "No Value Returned";
		$authStatus = array_key_exists("vpc_3DSstatus", $_GET) ? $_GET["vpc_3DSstatus"] : "No Value Returned";
		$errorTxt = "";
		if ($txnResponseCode == "7" || $txnResponseCode == "No Value Returned" || $errorExists) {
			$errorTxt = "Error ";
		}
		$title = $_GET["Title"];
		$transStatus = -1;
		if($hashValidated=="CORRECT" && $txnResponseCode=="0"){
			$transStatus = 0;
		}elseif ($hashValidated=="INVALID HASH" && $txnResponseCode=="0"){
			$transStatus = 1;
		}else {
			$transStatus = 2;
		}
		if($transStatus==0){
			$info_payment = $this->session->userdata('info_client');
			$info_payment['trans_feference']=$merchTxnRef;
			$info_payment['trans_number']=$transactionNo;
			$this->session->set_userdata('info_client',$info_payment);
		}
		/*----------------------------*/
		$data['infobook'] = '';
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_res");
		$data["results_rooms"] = $this->M_rooms->listDataActive(5, 0, $data["language"] ,1);
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		if($transStatus==0){			
			redirect(base_url().$this->session->userdata('site_lang').'/reservation/booking-proccess?strans='.$transStatus.'&scode='.$txnResponseCode, 'refresh');
		}
		else if($transStatus==1){
			$data['msg_line'] = $this->lang->line('trans_session_pendding');
			$this->load->view("webiste/reservation-timeout",$data);
		}
		else if($transStatus==2){
			$data['msg_line'] = $this->lang->line('trans_session_fail');
			$this->load->view("webiste/reservation-timeout",$data);
		}
		else{
			$data['msg_line'] = $this->getResponseDescriptionVisa($txnResponseCode);
			$this->load->view("webiste/reservation-timeout",$data);
		}
	}
	public function reservationProccess(){
		$data['infobook'] = '';
		$data["language"] =($this->uri->segment($this->config->item('language_page'))) ? $this->uri->segment($this->config->item('language_page')) : 'en';
		$this->session->set_userdata('site_lang', $data["language"]);
		$main = ($this->uri->segment($this->config->item('root_page'))) ? $this->uri->segment($this->config->item('root_page')) : '';
		$data["main_menu_link"] = $main;
		$data["results_main_menu"] = $this->M_main_menu->listAllDataActive(1);
		$data["results_banner"] = $this->M_banner->listAllDataActive(1,0,"is_res");
		$data["results_rooms"] = $this->M_rooms->listDataActive(5, 0, $data["language"] ,1);
		$data["results_info_contact"] = $this->M_infocontact->listDataFillter(1,0,$data["language"]);
		$data["e_bro"] = $this->M_abouts->listDataActive(1,0,$data["language"],21,1);
		$b_Check_Ins = 0;
		$info_payment = $this->session->userdata('info_client');
		if($info_payment && sizeof($info_payment)>0 && $info_payment['trans_number']>0){
			$strans = $this->null2unknown ( $_GET ["strans"] );
			$scode = $this->null2unknown ( $_GET ["scode"] );
			if($strans==0){
				$b_Check_Ins = $this->M_booking->insData($info_payment);	
				if($b_Check_Ins>0){					
					$data['infobook'] = $this->ShowInfoBooking($info_payment);
					$this->sendMailBooking($info_payment);
					$data['msg_line'] = $this->lang->line('frm_thanks_booking');
				}
				else{					
					$data['msg_line'] = $this->lang->line('trans_session_ok_fail_save');
				}
			}
			else if($strans==1){
				$data['msg_line'] = $this->lang->line('trans_session_pendding');
			}
			else if($strans==2){
				$data['msg_line'] = $this->lang->line('trans_session_fail');
			}
			else{
				redirect(base_url().$data["language"].'/reservation-demo');
			}
			$this->session->unset_userdata('info_client');
			$this->load->view("webiste/reservation-timeout",$data);
		}
		else{
			redirect(base_url().$data["language"].'/reservation-demo');
		}
	}
	function ShowInfoBooking($obj){
		$bookingHtml = '';
		$info_payment = $this->session->userdata('info_client');
		if($info_payment && sizeof($info_payment)>0){
			if($obj && sizeof($obj)>0){
				$info_room = $this->M_rooms->getRoomPrice(1,0,'en',$obj['room_type'],1);
				$bookingHtml .= '<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class="col_info">';
				  $bookingHtml .= '<tbody>';
					$bookingHtml .= '<tr><th colspan="2" height="50" nowrap style="color: #0f9e4a"><h3>The booking information</h3></th></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">From</td><td style="padding-left: 5px">'.$obj['date_from'].'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">To</td><td style="padding-left: 5px">'.$obj['date_to'].'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Room type</td><td style="padding-left: 5px">'.$obj['room_name'].'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Room of price</td><td style="padding-left: 5px">US $'.$info_room[0]['article_price'].'<br/>'. smarty_vnd($info_room[0]['article_price_vn']).'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Prepayment</td><td style="padding-left: 5px">'.smarty_vnd($obj['booking_prepayment']).'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Transaction Number</td><td style="padding-left: 5px">'.$obj['trans_number'].'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Room requirements</td><td style="padding-left: 5px">'.$obj['room_requirements'].'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Adults</td><td style="padding-left: 5px">'.$obj['adults'].'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Children</td><td style="padding-left: 5px">'.$obj['children'].'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Name</td><td style="padding-left: 5px">'.$obj['fname'].'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Email</td><td style="padding-left: 5px">'.$obj['email'].'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Phone</td><td style="padding-left: 5px">'.$obj['phone'].'</td></tr>';
					$bookingHtml .= '<tr><td height="35" style="padding-left: 5px">Special requirements</td><td style="padding-left: 5px">'.$obj['special_requirements'].'</td></tr>';
				  $bookingHtml .= '</tbody>';
				$bookingHtml .= '</table>';
			}
		}
		return $bookingHtml;
	}
	function getResponseDescription($responseCode) {
		switch ($responseCode) {
			case "0" :
				$result = "Giao dịch thành công - Approved";
				break;
			case "1" :
				$result = "Ngân hàng từ chối giao dịch - Bank Declined";
				break;
			case "3" :
				$result = "Mã đơn vị không tồn tại - Merchant not exist";
				break;
			case "4" :
				$result = "Không đúng access code - Invalid access code";
				break;
			case "5" :
				$result = "Số tiền không hợp lệ - Invalid amount";
				break;
			case "6" :
				$result = "Mã tiền tệ không tồn tại - Invalid currency code";
				break;
			case "7" :
				$result = "Lỗi không xác định - Unspecified Failure ";
				break;
			case "8" :
				$result = "Số thẻ không đúng - Invalid card Number";
				break;
			case "9" :
				$result = "Tên chủ thẻ không đúng - Invalid card name";
				break;
			case "10" :
				$result = "Thẻ hết hạn/Thẻ bị khóa - Expired Card";
				break;
			case "11" :
				$result = "Thẻ chưa đăng ký sử dụng dịch vụ - Card Not Registed Service(internet banking)";
				break;
			case "12" :
				$result = "Ngày phát hành/Hết hạn không đúng - Invalid card date";
				break;
			case "13" :
				$result = "Vượt quá hạn mức thanh toán - Exist Amount";
				break;
			case "21" :
				$result = "Số tiền không đủ để thanh toán - Insufficient fund";
				break;
			case "99" :
				$result = "Người sủ dụng hủy giao dịch - User cancel";
				break;
			default :
				$result = "Giao dịch thất bại - Failured";
		}
		return $result;
	}
	function getResponseDescriptionVisa($responseCode){
		switch ($responseCode) {
			case "0" :
				$result = "Transaction Successful";
				break;
			case "?" :
				$result = "Transaction status is unknown";
				break;
			case "1" :
				$result = "Bank system reject";
				break;
			case "2" :
				$result = "Bank Declined Transaction";
				break;
			case "3" :
				$result = "No Reply from Bank";
				break;
			case "4" :
				$result = "Expired Card";
				break;
			case "5" :
				$result = "Insufficient funds";
				break;
			case "6" :
				$result = "Error Communicating with Bank";
				break;
			case "7" :
				$result = "Payment Server System Error";
				break;
			case "8" :
				$result = "Transaction Type Not Supported";
				break;
			case "9" :
				$result = "Bank declined transaction (Do not contact Bank)";
				break;
			case "A" :
				$result = "Transaction Aborted";
				break;
			case "C" :
				$result = "Transaction Cancelled";
				break;
			case "D" :
				$result = "Deferred transaction has been received and is awaiting processing";
				break;
			case "F" :
				$result = "3D Secure Authentication failed";
				break;
			case "I" :
				$result = "Card Security Code verification failed";
				break;
			case "L" :
				$result = "Shopping Transaction Locked (Please try the transaction again later)";
				break;
			case "N" :
				$result = "Cardholder is not enrolled in Authentication scheme";
				break;
			case "P" :
				$result = "Transaction has been received by the Payment Adaptor and is being processed";
				break;
			case "R" :
				$result = "Transaction was not processed - Reached limit of retry attempts allowed";
				break;
			case "S" :
				$result = "Duplicate SessionID (OrderInfo)";
				break;
			case "T" :
				$result = "Address Verification Failed";
				break;
			case "U" :
				$result = "Card Security Code Failed";
				break;
			case "V" :
				$result = "Address Verification and Card Security Code Failed";
				break;
			case "99" :
				$result = "User Cancel";
				break;
			default  :
				$result = "Unable to be determined";
		}
		return $result;
	}
	function null2unknown($data) {
		if ($data == "") {
			return "No Value Returned";
		} else {
			return $data;
		}
	}
}
?>