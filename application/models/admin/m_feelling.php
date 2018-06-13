<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_feelling extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function record_count() {
		$query = $this->db->get("cms_feeling_customer");
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->order_by('order_feel desc');
		$this->db->limit($limit, $start);
        $query = $this->db->get("cms_feeling_customer"); 
        $data = $query->result_array();
		return $data;
   }
   public function listAllDataActive($limit,$start) {	    
		$where = array('active_feel' => 1);
		$this->db->where($where);
		$this->db->limit($limit, $start);
	    $this->db->order_by('order_feel desc');
		$query = $this->db->get("cms_feeling_customer"); 
        return $query->result_array();
		return $data;
   }
   public function listAllDataActiveHot($limit,$start) {	    
		$where = array('active_feel' => 1,'is_home' => 1);
		$this->db->where($where);
		$this->db->limit($limit, $start);
	    $this->db->order_by('order_feel desc');
		$query = $this->db->get("cms_feeling_customer"); 
        return $query->result_array();
		return $data;
   }
    public function getDataEdit($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('cms_feeling_customer');
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$this->db->where('id',$id);
        $this->db->delete("cms_feeling_customer"); 
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