<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Muser extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->db->simple_query('SET NAMES \'utf-8\''); 
	}
	
	public function login($uemail, $upassword)
	{
		$this -> db -> select('id, uemail, upassword, ufname, role_id, uactive');
		$this -> db -> from('cms_user_system');
		$this -> db -> where('uemail = ' . "'" . $uemail . "'"); 
		$this -> db -> where('upassword = ' . "'" . md5($upassword) . "'"); 
		//$this -> db -> where('role_id',1);
		$this -> db -> where('uactive',1);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1){
			return $query->result();
		}
		else{
			return false;
		}

	}
	public function record_count() {
		$this->db->select('cms_user_system.*,cms_role_system.role_name');
		$this->db->from('cms_user_system');
		$this->db->join('cms_role_system', 'cms_user_system.role_id = cms_role_system.id');	
		$query = $this->db->get();
		return $query->num_rows();
    }
 
    public function listData($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->select('cms_user_system.*,cms_role_system.role_name');
		$this->db->from('cms_user_system');
		$this->db->join('cms_role_system', 'cms_user_system.role_id = cms_role_system.id');	
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function delData($id) {
		$result = 0;
		$where = array('id' => $id, 'role_id !='=>1);
		$this->db->where($where);
        $this->db->delete("cms_user_system"); 
        if ($this->db->affected_rows() > 0){
           $result = 1;
		}
		else{
			$result = 0;
		}
		return $result;
   }
   public function getDataEdit($id) {
        $this->db->select('cms_user_system.*,cms_role_system.role_name');
		$this->db->from('cms_user_system');
		$this->db->join('cms_role_system', 'cms_role_system.id = cms_user_system.role_id');		
		$this->db->where('cms_user_system.id', $id);
		$query = $this->db->get();
        $data = $query->result_array();
		return $data;
   }
   public function checkExitEmail($email){
		$this->db->where('uemail',$email);
		$query = $this->db->get('cms_user_system');
		return $query->num_rows();
   }
   public function updateComp($id,$data)
   {
		$this->db->where('id', $id);
		return $this->db->update('cms_user_system', $data);
	}
}
?>