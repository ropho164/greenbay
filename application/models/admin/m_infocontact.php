<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_infocontact extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}	
	public function record_count() {
		$query = $this->db->get('cms_info_contact');
		return $query->num_rows();
    } 
    public function listData($limit, $start) {
		$this->db->select('cms_info_contact.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_info_contact');
		$this->db->order_by('id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function record_count_fillter($idgroup) {
		if($idgroup!=''){
			$this->db->where('cms_info_contact.article_langue',$idgroup);
		}
		$query = $this->db->get('cms_info_contact');
		return $query->num_rows();
   }
   
   public function listDataFillter($limit, $start,$idgroup) {
		$this->db->limit($limit, $start);
		$this->db->select('cms_info_contact.*');
		$this->db->from('cms_info_contact');
		if($idgroup!=''){
			$this->db->where('cms_info_contact.article_langue',$idgroup);
		}
		$this->db->order_by('cms_info_contact.id desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_info_contact');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function insData($data){
		$result = 0;
		$this->db->insert("cms_info_contact",$data);
		if($this->db->insert_id()>0){
			$result	= $this->db->insert_id();
		}
		return $result;
   }
   public function updateData($id,$data){
		$this->db->where('id', $id);
		return $this->db->update('cms_info_contact', $data);
  }
}
?>