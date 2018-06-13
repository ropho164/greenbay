<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_main_menu extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function record_count() {
		$query = $this->db->get("cms_categories_main");
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->order_by('category_order asc');
        $query = $this->db->get("cms_categories_main"); 
        $data = $query->result_array();
		return $data;
   }
   public function listDataFollow() {
		$this->db->order_by('category_order asc');
		$query = $this->db->get("cms_categories_main"); 
		return $query->result();
   }
   public function listAllData() {
	    $this->db->order_by('category_order asc');
		$query = $this->db->get("cms_categories_main"); 
        return $query->result_array();
   }
   public function listAllDataActive($act) {
	    $this->db->where('status', $act);
		$this->db->order_by('category_order asc');
		$query = $this->db->get("cms_categories_main"); 
        return $query->result_array();
   }
   public function listAllDataActiveRooms($act,$link) {
	    $this->db->where('status', $act);
		$this->db->where('category_lnk', $link);
		$this->db->order_by('category_order asc');
		$query = $this->db->get("cms_categories_main"); 
        return $query->result_array();
   }
   public function getDataEdit($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('cms_categories_main');
        $data = $query->result_array();
		return $data;
   }
   public function insData($data){
		$result = 0;
		$this->db->insert("cms_categories_main",$data);
		if($this->db->insert_id()>0){
			$result	= $this->db->insert_id();
		}
		return $result;
   }
   public function updateData($id,$data){
		$this->db->where('id', $id);
		return $this->db->update('cms_categories_main', $data);
   }
   public function delData($id) {
		$result = 0;
		$this->db->where('id',$id);
        $this->db->delete("cms_categories_main"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   public function getDataByLnkID($lnk) {
		$this->db->where('category_lnk', $lnk);
		$query = $this->db->get('cms_categories_main');
        $data = $query->result_array();
		return $data[0]['id'];
   }
   public function getDataByLnk($lnk) {
		$this->db->where('category_lnk', $lnk);
		$query = $this->db->get('cms_categories_main');
        $data = $query->result_array();
		return $data;
   }
}
?>