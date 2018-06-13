<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_user_acc extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function record_count() {
		$query = $this->db->get('cms_user_acc');
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->select('cms_user_acc.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_user_acc');
		$this->db->order_by('id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_user_acc');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_user_acc"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   public function record_count_email($id,$email) {
		if($id>0){
			$where = array('id <>' => $id,'user_email' => $email);	
		}
		else{
			$where = array('user_email'=>$email);	
		}
		$this->db->where($where);
		$query = $this->db->get('cms_user_acc');
		return $query->num_rows();
   }
   public function paramax_login($email, $pass) {
		$where = array('user_email' => $email,'user_pass' => md5($pass));	
		$this->db->select('cms_user_acc.*');
		$this->db->from('cms_user_acc');
		$this->db->where($where);
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function get_all_email() {	
		$this->db->select('*');
		$this->db->from('cms_user_acc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
}
?>