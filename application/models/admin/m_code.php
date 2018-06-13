<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_code extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function record_count() {
		$query = $this->db->get("cms_external_code");
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->order_by('id asc');
        $query = $this->db->get("cms_external_code"); 
        $data = $query->result_array();
		return $data;
   }
   public function listAllDataActive($limit, $start,$lang) {	    
		$where = array('b_active' => 1,'article_langue' => $lang);
		$this->db->where($where);
	    $this->db->limit($limit, $start);
		$this->db->order_by('id asc');
		$query = $this->db->get("cms_external_code"); 
		//$sql = $this->db->last_query();
		//echo $sql; 
        return $query->result_array();
   }
    public function getDataEdit($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('cms_external_code');
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$this->db->where('id',$id);
        $this->db->delete("cms_external_code"); 
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