<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_banner_promotion extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function record_count() {
		$query = $this->db->get("cms_banner_promotion");
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->order_by('id desc');
        $query = $this->db->get("cms_banner_promotion"); 
        $data = $query->result_array();
		return $data;
   }
   public function listAllDataActive($limit,$start) {	    
		$where = array('b_active' => 1);
		$this->db->where($where);
	    $this->db->order_by('id desc');
		$query = $this->db->get("cms_banner_promotion"); 
        return $query->result_array();
		return $data;
   }
    public function getDataEdit($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('cms_banner_promotion');
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$this->db->where('id',$id);
        $this->db->delete("cms_banner_promotion"); 
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