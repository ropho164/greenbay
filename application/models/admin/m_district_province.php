<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_district_province extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getDataFollowProvince($ID_City){
		$this->db->where('ID_City',$ID_City);
		$this->db->order_by('Name_Dist DESC');
		$query = $this->db->get('cms_district_province');
        $data = $query->result_array();
		return $data;
	}
}
?>