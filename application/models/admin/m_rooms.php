<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_rooms extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function record_count() {
		$this->db->where('cms_articles_rooms.article_langue','en');
		$query = $this->db->get('cms_articles_rooms');
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->where('cms_articles_rooms.article_langue','en');
		$this->db->select('cms_articles_rooms.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_rooms');
		$this->db->order_by('cms_articles_rooms.order_article asc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function listDataActive($limit, $start,$langu,$act) {
		$this->db->where('article_langue',$langu);
		$this->db->where('article_status',$act);
		$this->db->select('cms_articles_rooms.*,cms_categories_main.category_lnk,cms_categories_sub.sub_lnk,cms_categories_sub.sub_lnk_en,cms_categories_sub.sub_lnk_vn,cms_categories_sub.sub_name_en,cms_categories_sub.sub_name_vn');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_rooms');
		$this->db->join('cms_categories_main', 'cms_articles_rooms.categories_main_id = cms_categories_main.id'); 
		$this->db->join('cms_categories_sub', 'cms_articles_rooms.categories_sub_id = cms_categories_sub.id'); 
		$this->db->order_by('cms_articles_rooms.order_article asc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function listDataDetailsActiveLnk($langu,$main,$link) {
		//$where = array('article_status' => 1,'article_langue' => $langu,'cms_categories_main.category_lnk' => $main,'cms_categories_sub.sub_lnk' => $link);
	    $where = 'article_status = 1 AND article_langue = "'.$langu.'" AND cms_categories_main.category_lnk = "'.$main.'" AND (cms_categories_sub.sub_lnk = "'.$link.'" OR cms_categories_sub.sub_lnk_en = "'.$link.'" OR cms_categories_sub.sub_lnk_vn = "'.$link.'") ';
	    //$this->db->where('article_status', 1);
	   	//$this->db->where('article_langue', $langu);
	   	//$this->db->where('cms_categories_main.category_lnk', $main);
	    $this->db->where($where);
	    //$this->db->or_where('cms_categories_sub.sub_lnk_en', $link);
	    //$this->db->or_where('cms_categories_sub.sub_lnk_vn', $link);
		$this->db->select('cms_articles_rooms.*,cms_categories_main.category_lnk,cms_categories_sub.sub_lnk,cms_categories_sub.sub_lnk_en,cms_categories_sub.sub_lnk_vn');
		$this->db->from('cms_articles_rooms');
		//$this->db->where($where);
		$this->db->join('cms_categories_main', 'cms_articles_rooms.categories_main_id = cms_categories_main.id'); 
		$this->db->join('cms_categories_sub', 'cms_articles_rooms.categories_sub_id = cms_categories_sub.id'); 
		$this->db->limit(1, 0);
		$query = $this->db->get();
        $data = $query->result_array();
	   	//$sql = $this->db->last_query();
	    //echo $sql;
		return $data;
   }
   public function listDataActiveOrther($limit, $start,$langu,$act,$id) {
		$this->db->where('article_langue',$langu);
		$this->db->where('article_status',$act);
		$this->db->where('cms_articles_rooms.id <> ',$id);
		$this->db->select('cms_articles_rooms.*,cms_categories_main.category_lnk,cms_categories_sub.sub_lnk,cms_categories_sub.sub_lnk_en,cms_categories_sub.sub_lnk_vn');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_rooms');
		$this->db->join('cms_categories_main', 'cms_articles_rooms.categories_main_id = cms_categories_main.id'); 
		$this->db->join('cms_categories_sub', 'cms_articles_rooms.categories_sub_id = cms_categories_sub.id'); 
		$this->db->order_by('cms_articles_rooms.categories_sub_id asc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function record_count_link($id,$link) {
		if($id>0){
			$where = array('id <>' => $id,'article_lnk'=>$link);	
		}
		else{
			$where = array('article_lnk'=>$link);	
		}
		$this->db->where($where);
		$query = $this->db->get('cms_articles_rooms');
		return $query->num_rows();
   }
   
   public function record_count_fillter($langue) {
		$this->db->where('cms_articles_rooms.article_langue',$langue);
		$query = $this->db->get('cms_articles_rooms');
		return $query->num_rows();
   }
   
   public function listDataFillter($limit, $start,$langue) {
		$this->db->limit($limit, $start);
		$this->db->select('cms_articles_rooms.*');
		$this->db->from('cms_articles_rooms');
		$this->db->where('cms_articles_rooms.article_langue',$langue);
		$this->db->order_by('cms_articles_rooms.order_article asc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_articles_rooms');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_articles_rooms"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   /*photo*/
    public function record_count_photo_slide($pro_id) {
		$where = array('pro_id'=>$pro_id);	
		$this->db->where($where);
		$query = $this->db->get('cms_products_photo');
		return $query->num_rows();
   }
   public function listPhotoSlide($id) {
		$where = array('pro_id' => $id);
		$this->db->select();
		$this->db->from('cms_products_photo');
		$this->db->where($where); 
		$this->db->order_by('pro_photo_order asc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delDataPhotoEdit($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_products_photo"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
	public function duplicateRecord($primary_key_field, $primary_key_val){
		$table = "cms_articles_rooms";
		$this->db->where($primary_key_field, $primary_key_val); 
		$query = $this->db->get($table);
		foreach ($query->result() as $row){   
			foreach($row as $key=>$val){        
			  if($key != $primary_key_field){ 
			  $this->db->set($key, $val);               
			  }//endif              
			}//endforeach
		}//endforeach
		return $this->db->insert($table); 
	 }
	public function getRoomPrice($limit, $start,$langu,$type,$act) {
		$this->db->where('article_langue',$langu);
		$this->db->where('categories_sub_id',$type);
		$this->db->where('article_status',$act);
		$this->db->select('categories_sub_id,sub_name_en,sub_name_vn,article_quantity,article_price,article_price_vn');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_rooms');
		$this->db->join('cms_categories_sub', 'cms_articles_rooms.categories_sub_id = cms_categories_sub.id'); 
		$this->db->order_by('order_article asc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
	public function listDataHotActive($limit, $start,$langu,$act,$hot) {
		$this->db->where('article_langue',$langu);
		$this->db->where('article_status',$act);
		$this->db->where('article_hot',$hot);
		$this->db->select('cms_articles_rooms.*,cms_categories_main.category_lnk,cms_categories_sub.sub_lnk,cms_categories_sub.sub_name_en,cms_categories_sub.sub_name_vn');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_rooms');
		$this->db->join('cms_categories_main', 'cms_articles_rooms.categories_main_id = cms_categories_main.id'); 
		$this->db->join('cms_categories_sub', 'cms_articles_rooms.categories_sub_id = cms_categories_sub.id'); 
		$this->db->order_by('cms_articles_rooms.order_article asc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
}
?>