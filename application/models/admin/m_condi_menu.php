<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_condi_menu extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function record_count() {
		$query = $this->db->get("cms_condi_menu");
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->order_by('trade_order asc');
        $query = $this->db->get("cms_condi_menu"); 
        $data = $query->result_array();
		return $data;
   }
   public function listDataFollow() {
		$this->db->order_by('trade_order asc');
		$query = $this->db->get("cms_condi_menu"); 
		return $query->result();
   }
   public function listAllData() {
	    $this->db->order_by('trade_order asc');
		$query = $this->db->get("cms_condi_menu"); 
        return $query->result_array();
		return $data;
   }
   public function getDataEdit($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('cms_condi_menu');
        $data = $query->result_array();
		return $data;
   }
   public function getDataEditByLnk($trade_link) {
		$this->db->where('trade_link', $trade_link);
		$query = $this->db->get('cms_condi_menu');
        $data = $query->result_array();
		return $data;
   }   
   public function delData($id) {
		$result = 0;
		$this->db->where('id',$id);
        $this->db->delete("cms_condi_menu"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
}
?>