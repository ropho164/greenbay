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
    	<div class="spedoffer_page_leaf_bottom">
    		<div class="leaf_top_percen_specialoffer"><img src="<?=base_url()?>templates/website/images/left_abouts.png" alt="" class="img-responsive"/></div>
    		<div class="spedoffer_page_leaf_blue">
    			<div class="line_green_special"></div>
				<?php if($results_special_intro && sizeof($results_special_intro)>0){
				foreach($results_special_intro as $obj){?>
				<div class="header_special_offer item-affect">
					<div class="_title_special"><?=$obj["article_title_1"]?></div>
					<div class="_title">
						<div class="_item_title">
							<div class="clearfix"><?=$obj["article_title"]?></div>
							<div class="clearfix _item_underline_title"></div>
						</div>
					</div>
					<div class="font_std pdt10">
						<?=$obj['article_desc']?>
					</div>
				</div>
   				<?php } } ?>
    			<div class="spedoffer_page_content_bound">
    				<?php if($results_special && sizeof($results_special)>0){
					$cntSpec=0;
					foreach($results_special as $obj){
						if($cntSpec>1){ $cntSpec=0; }
					if($cntSpec==0){
					?>
    				<div class="row-std col-eq-height mg0 pd0 item-affect">
						<div class="col-xs-8 col-xs-push-4 bg_triangle_specialoffer mg0 pd0" style="position: relative">
						   <img src="<?=base_url().'uploads/'.$obj['article_picture_1']?>" class="img-responsive"/>
						   <!--
						   <div style="position: absolute;z-index: 2;left: 0px;top: 0px;bottom: 0px">
						   	<img src="<?=base_url().'templates/website/images/mask_promotion_photo.png'?>" class="img-responsive"/>						   	
						   </div>
						   -->
						</div>
						<div class="col-xs-4 col-xs-pull-8 col-height mg0 pd0">
							<div class="item-container-fluid">
								<div class="item-row-fluid">
									<div class="content_about_detail text-center">
										<div class="_title_smaller">
											<div class="_item_title_smaller">
												<?php
												 echo $obj["article_title_1"];
												 if($obj["article_title"]!="" && $obj["article_title"]!=NULL){
													 echo '<br/>'.$obj["article_title"];
												 }
												?>
												<div class="clearfix _item_underline_title_smaller"></div>
											</div>
										</div>
										<div class="font_std pdt15">    
											<?=html_entity_decode($obj["article_desc"])?>
										</div>
										<div class="pdt20 clearfix">
											<div data-toggle="collapse" data-target="#target<?=$obj['id']?>" class="bg_radient_green" style="margin-right: 5px;cursor: pointer;margin-bottom: 5px">
												<span class="font_bold_std txtt_trans_up" style="color: #FFF">
													<?php echo $this->lang->line('btn_detail_promotion');?>
												</span>
											</div>
											<a href="<?=base_url().$this->lang->line('key')?>/reservation">
												<div class="bg_radient_green" style="margin-left: 5px;margin-bottom: 5px">
													 <span class="font_bold_std txtt_trans_up"  style="color:rgba(255,255,255,1.00)">
														<?php echo $this->lang->line('btn_booking_promotion');?>
													 </span>
												</div>
											</a>											
										</div>										 
									</div>
							   </div>
							</div>
						</div>
					</div>
  					<div id="target<?=$obj['id']?>" class="collapse">
  						<div class="panel-body font_std clearfix">
							<div class="content-details-special font_std">
								<?=html_entity_decode($obj['article_content'])?>
							</div>
						</div>
				    </div>
				    <?php } else if($cntSpec==1){?>
				    <!--end 1-->
   					<div class="row-std col-eq-height mg0 pd0 item-affect clearfix">
						<div class="col-xs-8 bg_triangle_specialoffer mg0 pd0">
					  	   <img src="<?=base_url().'uploads/'.$obj['article_picture_1']?>" class="img-responsive"/>
						   <!--<div style="position: absolute;z-index: 2;left: 0px;top: 0px;bottom: 0px">
						   	<img src="<?=base_url().'templates/website/images/mask_promotion_photo_right.png'?>" class="img-responsive"/></div>
						   	-->
						</div>
						<div class="col-xs-4 col-height-right mg0 pd0">
							<div class="item-container-fluid">
								<div class="item-row-fluid">
									<div class="content_about_detail text-center">
										<div class="_title_smaller">
											<div class="_item_title_smaller">
												<div class="clearfix">
												<?php
												 echo $obj["article_title_1"];
												 if($obj["article_title"]!="" && $obj["article_title"]!=NULL){
													 echo '<br/>'.$obj["article_title"];
												 }
												?>
												</div>
												<div class="clearfix _item_underline_title_smaller"></div>
											</div>
										</div>
										<div class="font_std pdt15">    
											<?=html_entity_decode($obj["article_desc"])?>
										</div>
										<div class="pdt20 clearfix">
											 <div data-toggle="collapse" data-target="#target<?=$obj['id']?>" style="margin-right: 5px;cursor: pointer;margin-bottom: 5px" class="bg_radient_green">
												 <span class="font_bold_std txtt_trans_up" style="color: #FFF">
													<?php echo $this->lang->line('btn_detail_promotion');?>
												</span>
											 </div>
											<a href="<?=base_url().$this->lang->line('key')?>/reservation">
												<div class="bg_radient_green" style="margin-left: 5px;margin-bottom: 5px">
													 <span class="font_bold_std txtt_trans_up"  style="color:rgba(255,255,255,1.00)">
														<?php echo $this->lang->line('btn_booking_promotion');?>
													 </span>
												</div>
											</a>
										</div>
									</div>
							   </div>
							</div>
						</div>
					</div> 					
  					<div id="target<?=$obj['id']?>" class="collapse">
						<div class="panel-body font_std">
							<div class="content-details-special font_std">
								<?=html_entity_decode($obj['article_content'])?>
							</div>
						</div>
				    </div>
   					<?php } $cntSpec++; } }else{
						echo '<div class="row text-center" style="padding-top: 50px;padding-bottom:50px;"><h3>'.$this->lang->line('alert_no_promotion').'</h3></div>';
					}?>
    				<!--more-->
				</div>
   				<div class="clearfix" style="min-height: 40px"><!--End content--></div>
    		</div>
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
<!--<script src="<?=base_url()?>templates/website/js/jssor.slider-22.2.11.min.js" type="text/javascript"></script>-->
<script src="<?=base_url()?>templates/website/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.transit.min.js"></script>
<script src="<?=base_url()?>templates/website/js/scipt-page.js"></script>
<script src="<?=base_url()?>templates/website/js/viewport.js"></script>
<script src="<?=base_url()?>templates/website/js/fix-no-banner.js"></script>
<!--<script src="<?=base_url()?>templates/website/js/banner_slide.js"></script>
<script type="text/javascript">
	jssor_1_slider_init();
</script>
-->
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>