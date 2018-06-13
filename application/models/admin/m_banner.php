<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_banner extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function record_count() {
		$query = $this->db->get("cms_banner");
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->order_by('b_order desc');
        $query = $this->db->get("cms_banner"); 
        $data = $query->result_array();
		return $data;
   }
   public function listAllDataActive($limit,$start,$checkLoad) {	    
		$where = NULL;
		if($checkLoad=='is_home'){
			$where = array('b_active' => 1,'is_home' => 1);
		}
		if($checkLoad=='is_wel'){
			$where = array('b_active' => 1,'is_wel' => 1);
		}
		else if($checkLoad=='is_acc'){
			$where = array('b_active' => 1,'is_acc' => 1);
		}
		else if($checkLoad=='is_fac'){
			$where = array('b_active' => 1,'is_fac' => 1);
		}
		else if($checkLoad=='is_din'){
			$where = array('b_active' => 1,'is_din' => 1);
		}
		else if($checkLoad=='is_gal'){
			$where = array('b_active' => 1,'is_gal' => 1);
		}
		else if($checkLoad=='is_spe'){
			$where = array('b_active' => 1,'is_spe' => 1);
		}
		else if($checkLoad=='is_res'){
			$where = array('b_active' => 1,'is_res' => 1);
		}
		else if($checkLoad=='is_con'){
			$where = array('b_active' => 1,'is_con' => 1);
		}
		else if($checkLoad=='is_sit'){
			$where = array('b_active' => 1,'is_sit' => 1);
		}
		else if($checkLoad=='is_ply'){
			$where = array('b_active' => 1,'is_ply' => 1);
		}
		else if($checkLoad=='is_ort'){
			$where = array('b_active' => 1,'is_ort' => 1);
		}
	    else if($checkLoad=='is_spa'){
			$where = array('b_active' => 1,'is_spa' => 1);
		}
	   
		$this->db->where($where);
		$this->db->limit($limit, $start);
	    $this->db->order_by('b_order desc');
		$query = $this->db->get("cms_banner"); 
        return $query->result_array();
   }
    public function getDataEdit($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('cms_banner');
        $data = $query->result_array();
		return $data;
   }
   public function addData($data){
		return $this->db->insert("cms_banner",$data);   
   }
   public function updData($data,$id){
	    $this->db->where('id', $id);
		return $this->db->update("cms_banner",$data);   
   }
   public function delData($id) {
		$result = 0;
		$this->db->where('id',$id);
        $this->db->delete("cms_banner"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   public function getPatAffect() {
		$where = array('b_affect <>' => 'null','b_affect <>' => '');
		$this->db->limit(1, 0);
		$this->db->where($where);
		$this->db->order_by('b_order desc');
        $query = $this->db->get("cms_banner"); 
        $data = $query->result_array();
		return $data;
   }
}
?>