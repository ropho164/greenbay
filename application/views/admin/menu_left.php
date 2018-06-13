<?php
$ci_submenu = &get_instance();
$main_menu = $ci_submenu->getMainMenuLeft();
?>
<div id="my_menu" class="sdmenu">    
    <div class="collapsed">
        <span>MENU</span>
        <a href="<?=base_url()?>admin/main_menu">Main</a>
        <a href="<?=base_url()?>admin/sub_menu">Sub</a>
    </div>
    <div class="collapsed">
        <span>HOME PAGE</span>
        <a href="<?=base_url()?>admin/abouts/fillter/en/15">Green Bay Intro</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/16">Dining Intro</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/17">Stay Intro</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/18">Green Valley Spa Intro</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/19">Special Offers Intro</a>
    </div>
    <div class="collapsed">
        <span>EXPLORE</span>
        <a href="<?=base_url()?>admin/abouts/fillter/en/1">Green Bay Resort</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/2">Phu Quoc ISLAND</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/3">Things To See</a>
    </div>
    <div class="collapsed">
        <span>STAY</span>
        <a href="<?=base_url()?>admin/rooms/fillter/en">Content</a>
    </div>
    <div class="collapsed">
        <span>DINING</span>
        <a href="<?=base_url()?>admin/abouts/fillter/en/4">Dream Bay Restaurant</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/5">Green Bay Restaurant</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/6">The Country Bar</a>
    </div>
    <div class="collapsed">
        <span>MEETING & WEDDING</span>
        <a href="<?=base_url()?>admin/abouts/fillter/en/7">Weddings</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/8">Weddings Package</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/9">Meetings</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/10">Meetings Package</a>
        <!--<a href="<?=base_url()?>admin/abouts/fillter/en/11">Sports & Recreation Outlet</a>-->
    </div>
    <div class="collapsed">
        <span>INTEREST</span>
        <a href="<?=base_url()?>admin/abouts/fillter/en/12">Sim Valley Spa</a>
        <a href="<?=base_url()?>admin/abouts/fillter/en/13">Spa Therapies</a>
        <!--edit content-->
        <a href="<?=base_url()?>admin/abouts/fillter/en/20">Nature Loving Activities</a>
    </div>
    <div class="collapsed">
        <span>SPECIAL OFFERS</span>
        <a href="<?=base_url()?>admin/abouts/fillter/en/14">Content</a>
    </div>
    <div class="collapsed">
        <span>GALLERY</span>
        <a href="<?=base_url()?>admin/photos">Photos</a>
        <a href="<?=base_url()?>admin/c_video">Videos</a>
    </div>
    <div class="collapsed">
        <span>E-brochure</span>
        <a href="<?=base_url()?>admin/abouts/fillter/en/21">Content</a>
    </div>
    <div class="collapsed">
        <span>CẢM NHẬN KH</span>
        <a href="<?=base_url()?>admin/abouts/fillter/en/22">Content</a>
    </div>
    <div class="collapsed">
        <span>CÁC ĐIỀU KHOẢN</span>
        <a href="<?=base_url()?>admin/c_condi/fillter/en">Content</a>
    </div>
    <div class="collapsed">
        <span>ORTHER</span>
        <a href="<?=base_url()?>admin/c_banner">Banner</a>
        <a href="<?=base_url()?>admin/c_booking">Booking</a>
        <a href="<?=base_url()?>admin/c_infocontact/fillter/en">Contact Green Bay</a>
        <a href="<?=base_url()?>admin/c_contact">Customer Contact</a>
        <a href="<?=base_url()?>admin/c_email_newsletter">Email Newsletter</a>
        <a href="<?=base_url()?>admin/c_fileup">Files</a>
        <a href="<?=base_url()?>admin/c_code">Banner Promotion</a>
        <a href="<?=base_url()?>admin/c_email_sending">Email config</a>
        <a href="<?=base_url()?>admin/translator">Translator</a>
        <?php
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			if($session_data['id']==1 && $session_data['role_id']==1){
				echo '<a href="'.base_url().'admin/c_routes">URL Friendly</a>';
			}
		}
		?>
    </div>
    <div class="collapsed">
        <span>ACCOUNT SYSTEM</span>
        <a href="<?=base_url()?>admin/account_system">User</a>
    </div>
    <div class="collapsed">
        <span>LOGOUT</span>		
        <a href="<?=base_url()?>admin/home/logout" target="_self">Logout</a>
    </div>
</div>
<script language="javascript">
$(document).ready(function(){
	myMenu = new SDMenu("my_menu");
	myMenu.speed = 5;
	myMenu.remember = true; 
	myMenu.oneSmOnly = false; 
	myMenu.markCurrent = true;  
	myMenu.init();
});
</script>