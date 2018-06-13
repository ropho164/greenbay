<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uploadify extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('admin/M_uploads');
		$this->load->model('admin/M_resize');
    }
	public function do_upload_feelling()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads/feelling',200,200);
    }
	public function do_upload_banner()
    {
	    echo $this->M_uploads->upload_data_no_resize('uploads/banner');
    }
	public function do_upload_home_intro()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads/intro',1600,706);
    }
	public function do_upload_abouts_1600x706()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads',1600,706);
    }
	public function do_upload_abouts_900x500()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads',900,500);
    }
	public function do_upload_abouts_800x356()
    {
	    echo $this->M_uploads->upload_data_no_resize('uploads');
    }
	public function do_upload_abouts_550x700()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads',550,700);
    }
	public function do_upload_abouts_680x486()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads',680,486);
    }
	public function do_upload_abouts_650x350()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads',650,350);
    }
	public function do_upload_abouts_800x430()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads',800,430);
    }
	public function do_upload_abouts_533x400()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads',533,400);
    }
	public function do_upload_abouts_480x316()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads',480,316);
    }
	public function do_upload_home_small()
    {
	    echo $this->M_uploads->upload_data_resize_product_slide('uploads');
    }
	public function do_upload_home_intro_tropical_retreat()
    {
	    echo $this->M_uploads->upload_data_resize_product_slide('uploads/intro/tropical_retreat');
    }
	public function do_upload_banner_small()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads/banner',1600,600);
    }
	public function do_upload_rooms()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads/rooms',1600,706);
    }
	public function do_upload_rooms_details()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads/rooms',960,847);
    }
	public function do_upload_rooms_slide()
    {
	    echo $this->M_uploads->upload_data_no_resize('uploads/rooms/slide_details');
    }
	
	public function do_upload_photos()
    {
	    echo $this->M_uploads->upload_data_resize_photos_slide('uploads/photos');
    }
	
	public function do_upload_file_video()
    {
	    echo $this->M_uploads->upload_data_files('uploads/video');
    }
	public function do_upload_poster_video()
    {
	    echo $this->M_uploads->upload_photo_resize_moo('uploads/video',600,338);
    }
}
