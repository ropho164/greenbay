<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_photos extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function record_count() {
		$query = $this->db->get('cms_articles_photos');
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->select('cms_articles_photos.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_photos');
		$this->db->order_by('cms_articles_photos.order_article desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function listDataActive($limit, $start) {
		$this->db->select('*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_photos');
		$this->db->order_by('order_article desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_articles_photos');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
	public function getMaxOrder() {
		 $this->db->select('MAX(order_article) AS maxorder',false);
		$this->db->from('cms_articles_photos');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data[0]['maxorder'];
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_articles_photos"); 
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