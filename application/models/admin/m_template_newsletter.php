<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_template_newsletter extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function record_count() {
		$query = $this->db->get('cms_newsletter_form');
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->select('cms_newsletter_form.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_newsletter_form');
		$this->db->order_by('id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_newsletter_form');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_newsletter_form"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   public function get_one_template() {
		$where = array('default_email' => 1);
		$this->db->select('*');
		$this->db->from('cms_newsletter_form');
		$this->db->where($where);
		$this->db->limit(1, 0);
		$this->db->order_by('id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
}
?>