<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_routes extends CI_Model{
	var $table = 'cms_routes';
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function record_count() {
		$this->db->where('deleted', 0);
		$query = $this->db->get($this->table);
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->where('deleted', 0);
		$this->db->limit($limit, $start);
		$this->db->order_by('id asc');
		$this->db->order_by('controller asc');
        $query = $this->db->get($this->table); 
        $data = $query->result_array();
		return $data;
   }
   public function getDataEdit($id) {
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
        $data = $query->result_array();
		return $data;
   }
   public function insData($data){
		$result = 0;
		$this->db->insert($this->table,$data);
		if($this->db->insert_id()>0){
			$result	= $this->db->insert_id();
		}
		return $result;
   }
   public function updateData($id,$data){
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
   }
   public function delData($id) {
		$result = 0;
		$data = array('deleted' => 1);
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->update($this->table, $data);	
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