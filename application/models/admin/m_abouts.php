<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_abouts extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function record_count($type) {
		$this->db->where('cms_articles_abouts.article_langue','en');
		$this->db->where('cms_articles_abouts.article_intro_type',$type);
		$query = $this->db->get('cms_articles_abouts');
		return $query->num_rows();
    }
 
    public function listData($limit, $start,$type) {
		$this->db->where('cms_articles_abouts.article_langue','en');
		$this->db->where('cms_articles_abouts.article_intro_type',$type);
		$this->db->select('cms_articles_abouts.*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_abouts');
		$this->db->order_by('article_order desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function listDataActive($limit, $start,$langu,$types,$act) {
		$this->db->where('article_langue',$langu);
	    $this->db->where('article_intro_type',$types);
		$this->db->where('article_status',$act);
		$this->db->select('*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_abouts');
		$this->db->order_by('article_order desc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function listDataSubActive($limit, $start,$langu,$types,$act,$pid) {
		$this->db->where('article_langue',$langu);
	    $this->db->where('article_intro_type',$types);
		$this->db->where('article_status',$act);
	    $this->db->where('article_parent',$pid);
		$this->db->select('*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_abouts');
		$this->db->order_by('article_order desc');
		$query = $this->db->get();
        $data = $query->result_array();
	   // $sql = $this->db->last_query();
		//echo $sql; 
		return $data;
   }
   public function listDataMainSubActive($limit, $start,$langu,$types,$act,$mid,$sid) {
		$this->db->where('article_langue',$langu);
	    $this->db->where('article_intro_type',$types);
		$this->db->where('article_status',$act);
	    $this->db->where('main_id',$mid);
		$this->db->where('sub_id',$sid);
		$this->db->select('*');
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_abouts');
		$this->db->order_by('article_order desc');
		$query = $this->db->get();
        $data = $query->result_array();
	   // $sql = $this->db->last_query();
		//echo $sql; 
		return $data;
   }
   public function listDataAllMainSubActive($limit, $start,$langu,$act,$mid,$sid) {
		$this->db->where('article_langue',$langu);
		$this->db->where('article_status',$act);
	    $this->db->where('main_id',$mid);
		$this->db->where('sub_id',$sid);
		$this->db->select();
		$this->db->limit($limit, $start);
		$this->db->from('cms_articles_abouts');
		$this->db->order_by('article_order desc');
		$query = $this->db->get();
        $data = $query->result_array();
	   // $sql = $this->db->last_query();
		//echo $sql; 
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
		$query = $this->db->get('cms_articles_abouts');
		return $query->num_rows();
   }
   
   public function record_count_fillter($langue,$type) {
	    $where = array('article_langue'=>$langue,'article_intro_type'=>$type);
	    $this->db->where($where);
		$query = $this->db->get('cms_articles_abouts');
		return $query->num_rows();
   }
   
   public function listDataFillter($limit, $start,$langue,$type) {
		$where = array('article_langue'=>$langue,'article_intro_type'=>$type);
	    $this->db->limit($limit, $start);
		$this->db->select('cms_articles_abouts.*');
		$this->db->from('cms_articles_abouts');
		$this->db->where($where);
		$this->db->order_by('article_order desc');
		$query = $this->db->get();
        $data = $query->result_array();
		//$sql = $this->db->last_query();
		//echo $sql; 
	   return $data;
   }
   
   public function getDataEdit($id) {
        $where = array('id' => $id);
		$this->db->select();
		$this->db->from('cms_articles_abouts');
		$this->db->where($where); 
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id);
		$this->db->where($where);
        $this->db->delete("cms_articles_abouts"); 
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
		$where = array('pro_id'=>$pro_id,'pro_photo_type'=>1);	
		$this->db->where($where);
		$query = $this->db->get('cms_products_photo');
		return $query->num_rows();
   }
   public function listPhotoSlide($id) {
		$where = array('pro_id' => $id,'pro_photo_type'=>1);
		$this->db->select();
		$this->db->from('cms_products_photo');
		$this->db->where($where); 
		$this->db->order_by('pro_photo_order asc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
	public function listDataPhotoThumb($limit, $start,$id) {
		$this->db->limit($limit, $start);
		$where = array('pro_id' => $id,'pro_photo_type'=>1);
		$this->db->select();
		$this->db->from('cms_products_photo');
		$this->db->where($where); 
		$this->db->order_by('pro_photo_order asc');
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
	}
	public function delDataPhoto($pro_id) {
		$result = 0;
		$where = array('pro_id' => $pro_id,'pro_photo_type'=>1);
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
   public function delDataPhotoEdit($id) {
		$result = 0;
		$where = array('id' => $id,'pro_photo_type'=>1);
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
		$table = "cms_articles_abouts";
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
}
?>