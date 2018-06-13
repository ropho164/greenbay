<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_booking extends CI_Model
{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->load->helper('date');
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function record_count() {
		$query = $this->db->get('cms_reservation');
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->select('cms_reservation.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_reservation');
		$this->db->order_by('id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_reservation');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_reservation"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   public function get_all_email_cust_col() {	
		$this->db->select('cms_reservation.id,cms_reservation.email');
		$this->db->from('cms_reservation');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
	public function insData($data){
		$result = 0;
		$this->db->insert("cms_reservation",$data);
		if($this->db->insert_id()>0){
			$result	= $this->db->insert_id();
		}
		return $result;
   }
   public function updateData($id,$data){
		$this->db->where('id', $id);
		return $this->db->update("cms_reservation", $data);
   }
   public function checkRoomAvailible($roomType,$fromDate,$toDate) {
	   $room_booking = 0;
	    //$roomType = 1;
	    //$fromDate = '2017-08-01';
	    //$toDate = '2017-08-04';
	    if($fromDate=='' || $fromDate==NULL){
		   $fromDate = date("Y/m/d");
	    }
	    if($toDate=='' || $toDate==NULL){
		   $toDate = date("Y/m/d", strtotime("+1 days"));
	    }
	    $sql = '(date_from<="'.$fromDate.'" AND date_to>="'.$fromDate.'")';
        $sql .= ' OR ';
	    $sql .= '(date_from<'.$toDate.' AND date_to>="'.$toDate.'")';
        $sql .= ' OR ';
        $sql .= '(date_from>="'.$fromDate.'" AND date_to<"'.$toDate.'")';
	    $sql .= ' AND ';
	    $sql .= '(room_type = '.$roomType.')';
		$this->db->select_sum('room_number');
		$this->db->from('cms_reservation');
		$this->db->where($sql);
		$query = $this->db->get();
	    //echo $this->db->last_query();
		$data = $query->result_array();
		$room_booking = $data[0]['room_number'];
		   if($room_booking>0){
			   $room_booking = $room_booking;
		   }
		   else{
			   $room_booking = 0;
		   }
	   return $room_booking;
    }
}
?>