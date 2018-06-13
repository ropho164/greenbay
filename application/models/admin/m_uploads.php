<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_uploads extends CI_Model{
	
    private $upload_config;	
	private $dataReturn;
	protected $_gallery_url;
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
		$this->load->library('image_moo');
		$this->_gallery_path = realpath(APPPATH. "../uploads/rooms/");
		$this->_gallery_path_slide = realpath(APPPATH. "../uploads/rooms/slide_details/");		
		$this->_gallery_path_photos = realpath(APPPATH. "../uploads/photos/");
	}
	public function upload_data($pathFolder){		
        $image_upload_folder = FCPATH . $pathFolder;
        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }

        $this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 10240,
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'quality' 		=> '100%',
			'overwrite'		=>FALSE
        );
        $this->upload->initialize($this->upload_config);
        if (!$this->upload->do_upload()) {
            $dataReturn = $this->upload->display_errors();
        } else {
            $dataReturn = $this->upload->data();
        }
		return json_encode($dataReturn);
	}
	// Upload & Resize in action
    function upload_data_resize($pathFolder)
    {
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
       	$this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 10240,
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'quality' 		=> '100%',
			'overwrite'		=>FALSE
        );
        $this->upload->initialize($this->upload_config);
        if(!$this->upload->do_upload()){
            $dataReturn = $this->upload->display_errors();
        }
		else{
            $dataReturn = $this->upload->data();			
			$config = array(
					"source_image" => $dataReturn['full_path'],
					"new_image" => $this->_gallery_path . "/thumbs",
					"maintain_ration" => true,
					"width" => 100,
					"quality" => '100%',
					"height" => 100);
			$this->load->library("image_lib",$config);
			$this->image_lib->resize();
        }
		return json_encode($dataReturn);
	}
	function upload_data_resize_news($pathFolder)
    {
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
       	$this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp',
            'max_size'      => 10240,
			'quality' 		=> '100%',
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'overwrite'		=>FALSE
        );
        $this->upload->initialize($this->upload_config);
        if(!$this->upload->do_upload()){
            $dataReturn = $this->upload->display_errors();
        }
		else{
            $dataReturn = $this->upload->data();			
			$config = array(
					"source_image" => $dataReturn['full_path'],
					"new_image" =>  $dataReturn['full_path'],
					"maintain_ration" => false,
					"quality" 		=> '100%',
					"width" => 390,
					"height" => 355,
					"master_dim" => 'width');
			$this->load->library("image_lib",$config);
			$this->image_lib->resize();
        }
		return json_encode($dataReturn);
	}
	public function upload_data_files($pathFolder)
    {
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
		assert(file_exists($image_upload_folder) === TRUE);
		$config['upload_path'] = $image_upload_folder;
		$config['allowed_types'] = 'avi|mpeg|wmv|mp4|zip|rar|pdf|ppt|pptx';
		$config['max_size']      = '0';    
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('userfile') === FALSE){
			// Some error occured
			$dataReturn = ($this->upload->display_errors('', ''));
			//var_dump($_FILES);
		}
		else{
			// Upload successful
			$dataReturn = $this->upload->data();
		}
	 return json_encode($dataReturn);
    }
	public function upload_data_files_downloads($pathFolder)
    {
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
		assert(file_exists($image_upload_folder) === TRUE);
		$config['upload_path'] = $image_upload_folder;
		$config['allowed_types'] = 'doc|docx|zip|rar|pdf|ppt|pptx|xls|xlsx|png|jpeg|gif|bmp';
		$config['max_size']      = '0';    
		$config['encrypt_name'] = false;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('userfile') === FALSE){
			// Some error occured
			$dataReturn = ($this->upload->display_errors('', ''));
			//var_dump($dataReturn);
			//var_dump($_FILES);
		}
		else{
			// Upload successful
			$dataReturn = $this->upload->data();
			//var_dump($dataReturn);
		}
	 return json_encode($dataReturn);
    }
	function upload_data_resize_product_home($pathFolder,$w,$h,$to)
    {
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
       	$this->upload_config = array(
			"image_library" => "gd2",
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 10240,
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'quality' 		=> '100%',
			'overwrite'		=>FALSE
        );
        $this->upload->initialize($this->upload_config);
        if(!$this->upload->do_upload()){
            $dataReturn = $this->upload->display_errors();
        }
		else{
            $dataReturn = $this->upload->data();			
			$config = array(
					"image_library" => "gd2",
					//"create_thumb"  => TRUE ,
					"source_image" => $dataReturn['full_path'],
					"new_image" => $dataReturn['full_path'],
					"maintain_ration" => false,
					"width" => $w,
					"height" => $h,
					"master_dim" =>$to,
					'quality' 		=> '100%',
					"x_axis" => 0,
					"y_axis" => 0
					);
			$this->load->library("image_lib",$config);
			$this->image_lib->resize();
        }
		return json_encode($dataReturn);
	}
	function upload_data_resize_product_slide($pathFolder)
    {
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
       	$this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 10240,
			'quality' 		=> '100%',
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'overwrite'		=>FALSE
        );
        $this->upload->initialize($this->upload_config);
        if(!$this->upload->do_upload()){
            $dataReturn = $this->upload->display_errors();
        }
		else{
            $dataReturn = $this->upload->data();			
			$config = array(
					"source_image" => $dataReturn['full_path'],
					"new_image" =>  $this->_gallery_path_slide . "/thumb",
					"maintain_ration" => false,
					"width" => 500,
					'quality' 		=> '100%',
					"height" => 358);
			$this->load->library("image_lib",$config);
			$this->image_lib->resize();
        }
		return json_encode($dataReturn);
	}
	function upload_data_resize_photos_slide($pathFolder)
    {
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
       	$this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 10240,
			'quality' 		=> '100%',
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'overwrite'		=>FALSE
        );
        $this->upload->initialize($this->upload_config);
        if(!$this->upload->do_upload()){
            $dataReturn = $this->upload->display_errors();
        }
		else{
            $dataReturn = $this->upload->data();			
			$config = array(
					"source_image" => $dataReturn['full_path'],
					"new_image" =>  $this->_gallery_path_photos."/thumb",
					"maintain_ration" => false,
					"width" => 487,
					'quality' 		=> '100%',
					"height" => 366);
			$this->load->library("image_lib",$config);
			$this->image_lib->resize();
        }
		return json_encode($dataReturn);
	}
	function upload_data_resize_categories_product($pathFolder)
    {
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
       	$this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 10240,
			'quality' 		=> '100%',
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'overwrite'		=>FALSE
        );
        $this->upload->initialize($this->upload_config);
        if(!$this->upload->do_upload()){
            $dataReturn = $this->upload->display_errors();
        }
		else{
            $dataReturn = $this->upload->data();			
			$config = array(
					"source_image" => $dataReturn['full_path'],
					"new_image" =>  $dataReturn['full_path'],
					"maintain_ration" => false,
					"width" => 640,
					"quality" 	=> '100%',
					"height" => 371
					);
			$this->load->library("image_lib",$config);
			$this->image_lib->resize();
        }
		return json_encode($dataReturn);
	}
	function upload_data_resize_agency($pathFolder)
    {
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
       	$this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp',
            'max_size'      => 10240,
			'quality' 		=> '100%',
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'overwrite'		=>FALSE
        );
        $this->upload->initialize($this->upload_config);
        if(!$this->upload->do_upload()){
            $dataReturn = $this->upload->display_errors();
        }
		else{
            $dataReturn = $this->upload->data();			
			$config = array(
					"source_image" => $dataReturn['full_path'],
					"new_image" =>  $dataReturn['full_path'],
					"maintain_ration" => false,
					"width" => 390,
					"height" => 355,
					"quality" 		=> '100%',
					"master_dim" => 'width');
			$this->load->library("image_lib",$config);
			$this->image_lib->resize();
        }
		return json_encode($dataReturn);
	}
	function upload_photo_resize_moo($pathFolder,$w,$h){
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
       	$this->upload_config = array(
			"image_library" => "gd2",
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 10240,
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'quality' 		=> '100%',
			'overwrite'		=>FALSE
        );
        $this->upload->initialize($this->upload_config);
        if(!$this->upload->do_upload()){
            $dataReturn = $this->upload->display_errors();
        }
		else{
           $dataReturn = $this->upload->data();
		   $this->image_moo->load($dataReturn['full_path']);
		   $this->image_moo->set_background_colour("#ffffff");
		   $this->image_moo->resize($w,$h,TRUE);
		   $this->image_moo->save_pa("","",TRUE);
		   $dataReturn['file_name'] = $dataReturn['file_name'];
        }
		return json_encode($dataReturn);
	}
	function upload_photo_resize_moo_fix($pathFolder,$w,$h){
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
       	$this->upload_config = array(
			"image_library" => "gd2",
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 10240,
			'maintain_ratio' => TRUE,
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'quality' 		=> '100%',
			'width'     	=> $w,
			'overwrite'		=>FALSE,
			'master_dim'	=>'width',
        );
        $this->upload->initialize($this->upload_config);
        if(!$this->upload->do_upload()){
            $dataReturn = $this->upload->display_errors();
        }
		else{
			$dataReturn = $this->upload->data();
			$data_fix = getimagesize($dataReturn['full_path']);
			$width = $data_fix[0];
			$height = $data_fix[1];
			if($height > $width){
				$ratioSize = $height / $width;
				$newHeight = $w * $ratioSize;
				$this->image_moo->load($dataReturn['full_path']);
				$this->image_moo->set_background_colour("#ffffff");
				$this->image_moo->resize($w,$newHeight,TRUE);
			}
			else{
				$this->image_moo->load($dataReturn['full_path']);
				$this->image_moo->set_background_colour("#ffffff");
				$this->image_moo->resize($w,$h,TRUE);
			}			
			$this->image_moo->save_pa("","",TRUE);
			$dataReturn['file_name'] = $dataReturn['file_name'];
        }
		return json_encode($dataReturn);
	}
	function upload_data_no_resize($pathFolder)
    {
		$image_upload_folder = FCPATH . $pathFolder;
		if (!file_exists($image_upload_folder)) {
			mkdir($image_upload_folder, DIR_WRITE_MODE, true);
		}
       	$this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 10240,
			'quality' 		=> '100%',
            'remove_space'  => TRUE,
            'encrypt_name'  => FALSE,
			'overwrite'		=>FALSE
        );
        $this->upload->initialize($this->upload_config);
        if(!$this->upload->do_upload()){
            $dataReturn = $this->upload->display_errors();
        }
		else{
            $dataReturn = $this->upload->data();
        }
		return json_encode($dataReturn);
	}
}
?>