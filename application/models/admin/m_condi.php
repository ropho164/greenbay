<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_condi extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function record_count() {
		$query = $this->db->get('cms_condi_content');
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->select('cms_condi_content.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_condi_content');
		$this->db->order_by('cms_condi_content.id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   
   public function record_count_fillter($idgroup) {
		if($idgroup!=''){
			$this->db->where('cms_condi_content.article_langue',$idgroup);
		}
		$query = $this->db->get('cms_condi_content');
		return $query->num_rows();
   }
   
   public function listDataFillter($limit, $start,$idgroup) {
		$this->db->limit($limit, $start);
		$this->db->select('cms_condi_content.*');
		$this->db->from('cms_condi_content');
		if($idgroup!=''){
			$this->db->where('cms_condi_content.article_langue',$idgroup);
		}
		$this->db->order_by('cms_condi_content.id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_condi_content');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_condi_content"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   /*webiste list*/
    public function record_count_fillter_categories($catid) {
		$this->db->where('cms_condi_content.menu_id',$catid);
		$query = $this->db->get('cms_condi_content');
		return $query->num_rows();
    }
    public function listDataNewsCategories($limit, $start, $lang, $idgroup) {
		$this->db->where('cms_condi_content.trade_active',1);
		$this->db->where('cms_condi_content.article_langue',$lang);
		$this->db->where('cms_condi_content.group_id',$idgroup);
		$this->db->select('cms_condi_content.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_condi_content');
		$this->db->order_by('cms_condi_content.id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function listDataActive($limit, $start,$link) {
		$where = array('cms_condi_content.trade_active' => 1,'cms_condi_menu.trade_link'=>$link);
		$this->db->select('cms_condi_content.*,cms_condi_menu.trade_menu,cms_condi_menu.trade_link');
		$this->db->limit($limit, $start);
		$this->db->from('cms_condi_content');
		$this->db->where($where);
		$this->db->join('cms_condi_menu', 'cms_condi_content.menu_id = cms_condi_menu.id');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
}
?>