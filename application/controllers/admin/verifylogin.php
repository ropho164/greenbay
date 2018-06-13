<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class VerifyLogin extends CI_Controller {

  function __construct()
  {
    parent::__construct();
	$this->load->helper(array('form', 'url'));
    $this->load->model('admin/Muser');
  }

  function index()
  {
    $this->load->library('form_validation');
	$this->form_validation->set_rules('uemail', 'Email', 'trim|required|valid_email');
	$this->form_validation->set_rules('upassword', 'Password','trim|required|callback_check_data_info');
	
    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('admin/login/login_view');
    }
    else
    {
	 redirect(base_url().'admin/home', 'refresh');
    }
  }
  
  function check_data_info()
  {
    $uemail = $this->input->post('uemail');
    $upassword = $this->input->post('upassword');
    $result = $this->Muser->login($uemail, $upassword);
    if($result)
    {
      foreach($result as $row){
		$email = explode("@",$row->uemail);
        $data['id'] = $row->id;
	    $data['ufname'] =$email[0];
		$data['role_id']=$row->role_id;
		$this->session->set_userdata('logged_in',$data);
      }
	  return true;
    }
    else
    {
      $this->form_validation->set_message('check_data_info', 'Tên đăng nhập hoặc mật khẩu không tồn tại.');
      return false;
    }
  }
}
?>