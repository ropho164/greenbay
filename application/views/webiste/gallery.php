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
    <div class="spedoffer_page_leaf_top" style="background-color: #FFFFFF">
    	<div class="gallery_page_leaf_bottom">
    	<div class="gallery_page_leaf_bottom_right">
    		<div class="leaf_top_percen_specialoffer"><img src="<?=base_url()?>templates/website/images/left_abouts.png" alt="" class="img-responsive"/></div>
    		<div class="spedoffer_page_leaf_blue">
    			<div class="line_green_special"></div>
				<div class="header_special_offer item-affect clearfix">
					<div class="_title_special"><?php echo $this->lang->line('text_gallery');?></div>
				</div>
   				<div class="gallery_page_content_bound item-affect clearfix">
					<div style="width: 230px;margin: 0 auto">
						<div class="col-xs-6">
							<div class="_gallery_title">
								<div class="_gallery_item_title">
									<div class="clearfix"><?php echo $this->lang->line('text_photos');?></div>
									<div class="_gallery_item_underline_title _gallery_acctive clearfix"></div>
								</div>
							</div>
						</div>
						<div class="col-xs-6">
							<a href="<?=base_url().$this->lang->line('key')?>/gallery/videos" class="a_coolor">
								<div class="_gallery_title">
									<div class="_gallery_item_title">
										<div class="clearfix"><?php echo $this->lang->line('text_video');?></div>
										<div class="_gallery_item_underline_title clearfix"></div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
    			<div class="gallery_page_content_bound_noline clearfix">
    				<div class="row-eq-height mg_photo">						
						<?php if($results_photo && sizeof($results_photo)>0){
							$cnt = 0;
							foreach($results_photo as $obj){?>
								<div class="col-md-3 pd_item_photo mg_item_photo item-affect">
									<a href="<?=base_url().'uploads/photos/'.$obj['article_picture_1']?>" data-group="1" class="portfolio-box galleryItem">
										<img src="<?=base_url().'uploads/photos/thumb/'.$obj['article_picture_1']?>" class="img-responsive"/>
										<div class="portfolio-box-caption">
											<div class="portfolio-box-caption-content">
												<div class="project-name">
													<div class="bound_cicle_70">
														<div class="circle circle_transpa">
															<div class="circle_text_70"><?php echo $this->lang->line('btn_zoom');?></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
						<?php 
						$cnt++;
							if($cnt==4){
								$cnt = 0;
								echo '</div>';
								echo '<div class="row-eq-height mg_photo">';
							}							
						 }}?>
   						<!--more-->
    				</div>   				
    			</div>
    			<div class="pdt15 text-center item-affect clearfix">
					<div class="bound_cicle_70">
						<div class="circle circle_orange">
							<div class="circle_text_70">More</div>
						</div>
					</div>
  				</div>
   				<div class="clearfix" style="min-height: 40px"><!--End content--></div>
    		</div>
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
<!--
<script src="<?=base_url()?>templates/website/js/banner_slide.js"></script>
<script type="text/javascript">jssor_1_slider_init();</script>
-->
<script language="javascript">
$(function () {	
	var groups = {};
	$('.galleryItem').each(function() {
	  var id = parseInt($(this).attr('data-group'), 10);
	  
	  if(!groups[id]) {
		groups[id] = [];
	  } 
	  
	  groups[id].push( this );
	});
	$.each(groups, function() {	  
	  $(this).magnificPopup({
		  type: 'image',
		  closeOnContentClick: true,
		  closeBtnInside: false,
		  gallery: { enabled:true }
	  });	  
	});
})
</script>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>