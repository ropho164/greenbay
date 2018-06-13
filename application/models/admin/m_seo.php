<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_seo extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function record_count() {
		$query = $this->db->get("cms_seo");
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->order_by('id desc');
        $query = $this->db->get("cms_seo"); 
        $data = $query->result_array();
		return $data;
   }
   public function listAllDataActive($limit,$start,$checkLoad) {	    
		$where = NULL;
		if($checkLoad=='is_trangchu'){
			$where = array('b_active' => 1,'is_trangchu' => 1);
		}
		else if($checkLoad=='is_thuonghieu'){
			$where = array('b_active' => 1,'is_thuonghieu' => 1);
		}
		else if($checkLoad=='is_sanpham'){
			$where = array('b_active' => 1,'is_sanpham' => 1);
		}
		else if($checkLoad=='is_hotro'){
			$where = array('b_active' => 1,'is_hotro' => 1);
		}
		else if($checkLoad=='is_chuyende'){
			$where = array('b_active' => 1,'is_chuyende' => 1);
		}
		else if($checkLoad=='is_tintuc'){
			$where = array('b_active' => 1,'is_tintuc' => 1);
		}
		else if($checkLoad=='is_muaodau'){
			$where = array('b_active' => 1,'is_muaodau' => 1);
		}
		else if($checkLoad=='is_lienhe'){
			$where = array('b_active' => 1,'is_lienhe' => 1);
		}
		else{
			$where = array('b_active' => 1,'is_khac' => 1);
		}
		$this->db->where($where);
		$this->db->limit($limit, $start);
	    $this->db->order_by('id desc');
		$query = $this->db->get("cms_seo"); 
        return $query->result_array();
		return $data;
   }
    public function getDataEdit($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('cms_seo');
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$this->db->where('id',$id);
        $this->db->delete("cms_seo"); 
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