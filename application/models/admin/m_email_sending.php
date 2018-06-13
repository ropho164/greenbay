<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_email_sending extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function record_count() {
		$query = $this->db->get('cms_mail_sending');
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->select('cms_mail_sending.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_mail_sending');
		$this->db->order_by('id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_mail_sending');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_mail_sending"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   public function checkExitEmail($id,$email) {
		if($id>0){
			$where = array('id <>' => $id,'smtp_user' => $email);	
		}
		else{
			$where = array('smtp_user'=>$email);	
		}
		$this->db->where($where);
		$query = $this->db->get('cms_mail_sending');
		return $query->num_rows();
   }
   public function get_all_email() {	
		$this->db->select('*');
		$this->db->from('cms_mail_sending');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function get_one_email($id) {
		$where = array('id' => $id);	
		$this->db->select('*');
		$this->db->from('cms_mail_sending');
		$this->db->where($where);
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function get_one_email_newsletter() {	
	   	$where = array('is_send_news' => 1);
		$this->db->select('*');
		$this->db->from('cms_mail_sending');
		$this->db->where($where);
		$this->db->limit(1, 0);
		$this->db->order_by('id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
}
?>