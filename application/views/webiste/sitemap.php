<?php $ci = &get_instance();?>
<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>GreenBay Phú Quốc - Resort & Spa</title>
<meta name="description" content="Resort & Spa">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="robots" content="all,follow">
<link href="<?=base_url()?>templates/website/css/font.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/bootstrap/css/animate.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/js/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/bootstrap/css/datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>templates/website/css/custom-menu.css">
<link rel="stylesheet" href="<?=base_url()?>templates/website/css/custom-slider.css">
<link rel="stylesheet" href="<?=base_url()?>templates/website/css/custom.css">
<link href="<?=base_url()?>templates/website/bootstrap/css/bootstrap.vertical-tabs.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>templates/website/css/geometry.css">
<link rel="shortcut icon" href="<?=base_url()?>favicon.ico" type="image/x-icon">
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K3KJ6J3');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3KJ6J3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="page_full">
	<?php include ("menu.php");?>
    <div class="container-full fix-no-banner clearfix">
    <div class="spedoffer_page_leaf_top">
    		<div class="leaf_top_percen_specialoffer"><img src="<?=base_url()?>templates/website/images/left_abouts.png" alt="" class="img-responsive"/></div>
			<div class="spedoffer_page_leaf_blue">
				<div class="sitemap_content_bound text-center item-affect">
			    	<div class="_title" style="padding-bottom: 40px;text-align: left">
						<div class="_item_title">
							<div class="clearfix"><div class="_title_special" style="text-transform: none;font-size: 30pt"><?php echo $this->lang->line('text_sitemap');?></div></div>
							<div class="clearfix _item_underline_title"></div>
						</div>
					</div>
				    <div class="site_map_parent clearfix"><a href="<?=base_url().$language?>">HOME</a></div>
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
                    <div class="site_map_parent clearfix"><a href="<?=base_url().$language?>/reservation">RESERVATION</a></div>
                    <div class="site_map_parent clearfix"><a href="<?=base_url().$language?>/reservation">CONTACT US</a></div>
				</div>
  				<div class="clearfix" style="min-height: 40px"><!--End content--></div>
   			</div>    	
    </div>
    <?php include ("footer_page.php");?>
    </div>
    <?php include ("form-right.php");?>  
</div>
<!-- Javascript files
<script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>-->
<script src="<?=base_url()?>templates/website/js/jquery-1.11.0.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.easing.min.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/moment-with-locales.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>templates/website/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.transit.min.js"></script>
<script src="<?=base_url()?>templates/website/js/scipt-page.js"></script>
<script src="<?=base_url()?>templates/website/js/viewport.js"></script>
<script src="<?=base_url()?>templates/website/js/fix-no-banner.js"></script>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>