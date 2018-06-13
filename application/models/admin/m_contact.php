<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_contact extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function record_count() {
		$query = $this->db->get('cms_contact');
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->select('cms_contact.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_contact');
		$this->db->order_by('id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_contact');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_contact"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   public function get_all_email_cust_col() {	
		$this->db->select('cms_contact.id,cms_contact.cus_email');
		$this->db->from('cms_contact');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
}
?>