<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_sub_menu extends CI_Model{
	var $table = 'cms_categories_sub';
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function record_count() {
		$this->db->select('cms_categories_sub.*,cms_categories_main.category_name_en,cms_categories_main.category_name_vn');
		$this->db->join('cms_categories_main', 'cms_categories_sub.main_menu_id = cms_categories_main.id');
		$query = $this->db->get("cms_categories_sub");
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->order_by('main_menu_id asc');
		$this->db->order_by('sub_order asc');
        $this->db->select('cms_categories_sub.*,cms_categories_main.category_name_en,cms_categories_main.category_name_vn');
		$this->db->join('cms_categories_main', 'cms_categories_sub.main_menu_id = cms_categories_main.id');
		$query = $this->db->get("cms_categories_sub"); 
        $data = $query->result_array();
		return $data;
   }
   public function listAllDataActive($mainid,$act) {
	    $this->db->where('main_menu_id', $mainid);
		$this->db->where('status', $act);
		$this->db->order_by('sub_order asc');
		$query = $this->db->get("cms_categories_sub"); 
        return $query->result_array();
   }
   public function getDataEdit($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('cms_categories_sub');
        $data = $query->result_array();
		return $data;
   }
   public function insData($data){
		$result = 0;
		$this->db->insert("cms_categories_sub",$data);
		if($this->db->insert_id()>0){
			$result	= $this->db->insert_id();
		}
		return $result;
   }
   public function updateData($id,$data){
		$this->db->where('id', $id);
		return $this->db->update('cms_categories_sub', $data);
   }
   public function delData($id) {
		$result = 0;
		$this->db->where('id',$id);
        $this->db->delete("cms_categories_sub"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   public function getDataByLnkID($lnk) {
	    $this->db->limit(1, 0);
		$this->db->where('sub_lnk', $lnk);
	    $this->db->where('status', 1);
		$query = $this->db->get('cms_categories_sub');
        $data = $query->result_array();
		return $data[0]['id'];
   }
   public function getDataByLnk($lnk) {
	    $this->db->limit(1, 0);
		$this->db->where('sub_lnk', $lnk);
		$this->db->where('status', 1);
		$query = $this->db->get('cms_categories_sub');
        $data = $query->result_array();
		return $data;
   }
   public function checkLinkEN($id,$link) {
		if($id>0){
			$where = array('id <>' => $id,'sub_lnk_en'=>$link);	
		}
		else{
			$where = array('sub_lnk_en'=>$link);	
		}
		$this->db->where($where);
		$query = $this->db->get($this->table);
		return $query->num_rows();
   }
	public function checkLinkVN($id,$link) {
		if($id>0){
			$where = array('id <>' => $id,'sub_lnk_vn'=>$link);	
		}
		else{
			$where = array('sub_lnk_vn'=>$link);	
		}
		$this->db->where($where);
		$query = $this->db->get($this->table);
		return $query->num_rows();
   }
}
?>