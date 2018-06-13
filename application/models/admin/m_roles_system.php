<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_roles_system extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function record_count() {	
		$query = $this->db->get('cms_role_system');
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->limit($limit, $start);
		$query = $this->db->get('cms_role_system');
        $data = $query->result_array();
		return $data;
   }
   public function listAllData() {
        $query = $this->db->get("cms_role_system"); 
        $data = $query->result_array();
		return $data;
   }
   public function getDataEdit($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('cms_role_system');
        $data = $query->result_array();
		return $data;
   }
    public function delData($id) {
		$result = 0;
		$this->db->where('id',$id);
        $this->db->delete("cms_role_system"); 
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