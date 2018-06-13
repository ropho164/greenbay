<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_email_newsletter extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function record_count() {
		$query = $this->db->get('cms_newsletter');
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->select('cms_newsletter.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_newsletter');
		$this->db->order_by('id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_newsletter');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_newsletter"); 
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
			$where = array('id <>' => $id,'cus_email' => $email);	
		}
		else{
			$where = array('cus_email'=>$email);	
		}
		$this->db->where($where);
		$query = $this->db->get('cms_newsletter');
		return $query->num_rows();
   }
   public function get_all_email() {	
		$this->db->select('*');
		$this->db->from('cms_newsletter');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function get_one_email($id) {
		$where = array('id' => $id);	
		$this->db->select('*');
		$this->db->from('cms_newsletter');
		$this->db->where($where);
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function add_data($data){
        $this->db->insert('cms_newsletter',$data);
        return $this->db->insert_id();
   }
   public function get_all_email_cust_col() {	
		$this->db->select('cms_newsletter.id,cms_newsletter.cus_email');
		$this->db->from('cms_newsletter');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
}
?>