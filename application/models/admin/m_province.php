<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_province extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function listAllData() {
        $this->db->order_by('Name_City asc');
		$query = $this->db->get("cms_province"); 
        $data = $query->result_array();
		return $data;
   }
   public function getDataLnk($lnk) {
		$idcity = 0;
		$this->db->where('Link_City', $lnk);
		$query = $this->db->get('cms_province');
        $data = $query->result_array();
		if($data && sizeof($data)>0){
			$idcity = $data[0]['ID_City'];
		}
		return $idcity;
   }
}
?>