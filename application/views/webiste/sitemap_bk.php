<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Amarin - Resort & Spa</title>
    <meta name="description" content="Resort & Spa">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link href="<?php echo base_url();?>templates/website/css/font.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/website/js/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/website/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/website/css/animations.css" rel="stylesheet">
    <link href="<?php echo base_url();?>templates/website/bootstrap/css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>templates/website/css/custom.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
	   <?php include_once("menu_home.php");?>
      <div class="banner_one clearfix">
      <?php include_once("inc_banner.php");?>
      </div>
      <div class="orther_room">
         <div class="section_fac_top" style="background-color:#eceff6;">
            <div id="row2" class="row mg0 pd0" style="padding:15px 35px 15px 35px">               
                <div class="site_map_parent"><a href="<?=base_url()?>" style="color:#b89b72;font-size:13pt"><?=$this->lang->line('menu_root_site')?></a></div>
                <div class="clearfix">		
					<?php
                    if($results_main_menu && sizeof($results_main_menu)>0){
                        foreach($results_main_menu as $objMenuMain){
                            $result_sub_menu = $ci_submenu->getSubMenu($objMenuMain['id']);
                            if($result_sub_menu && sizeof($result_sub_menu)>0){
                                echo '<div class="site_map_parent clearfix"><a href="'.base_url().$language.'/'.$objMenuMain['category_lnk'].'">'.$objMenuMain['category_name_'.$this->lang->line('key')].'</a></div>';
									foreach($result_sub_menu as $objMenuSub){
										echo '<div class="site_map_sub clearfix"><a href="'.base_url().$language.'/'.$objMenuMain['category_lnk'].'/'.$objMenuSub['sub_lnk'].'">&gt;&gt;&nbsp;'.$objMenuSub['sub_name_'.$this->lang->line('key')].'</a></div>';
									}
                            }
                            else{
                                echo '<div class="site_map_parent clearfix"><a href="'.base_url().$language.'/'.$objMenuMain['category_lnk'].'">'.$objMenuMain['category_name_'.$this->lang->line('key')].'</a></div>';	
                            }
                        }
                      } 
                    ?>
                </div>                
           </div>
        </div>
      </div>      
    <?php include_once("footer_page.php");?>
    <!-- Javascript files-->
    <script src="<?php echo base_url();?>templates/website/js/jquery-1.11.0.min.js"></script>
	<script src="<?php echo base_url();?>templates/website/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>templates/website/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>templates/website/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>templates/website/js/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url();?>templates/website/js/jquery.cookie.js"></script>
    <script src="<?php echo base_url();?>templates/website/js/front_as.js"></script>
    <script src="<?php echo base_url();?>templates/website/js/policy_animate.js"></script>
    <?php include_once("active_menu.php");?>
  </body>
</html>