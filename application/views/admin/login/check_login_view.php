<?php
if($this->session->userdata('logged_in')){
	$session_data = $this->session->userdata('logged_in');
	echo "Xin chào: " . $session_data['ufname'];
}
else
{
  redirect(base_url().'admin/login', 'refresh');
}
?>