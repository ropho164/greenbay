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
<link href="<?php echo base_url();?>templates/website/css/reservation.css" rel="stylesheet">
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
    			<div class="gallery_page_content_bound_noline mgbt0 item-affect clearfix">
    				 <form id="booking-form" class="booking-form" name="form1" method="post" action="">
						<div align="center" style="margin-bottom:20px"><img src="<?php echo base_url();?>templates/website/images/logo.png" alt="Green Bay - Resort & Spa"/></div>
						<div class="_title" style="padding-bottom: 20px">
							<div class="_item_title">
								<div class="clearfix"><div class="_title_special" style="text-transform: none"><?php echo $this->lang->line('frm_text_header');?></div></div>
								<div class="clearfix _item_underline_title"></div>
							</div>
						</div>
						<div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>
						<div id="form-message" class="message">
							<p style="color: red">
								<?php echo $msg_line;?>
							</p>
							<?php
							if( isset($infobook) && $infobook!=''){
								echo '<br/>';
								echo $infobook;
								echo '<br/>';
							}
							else{
								echo '<br/><br/><br/><br/>';
							}
							?>		
						</div>								
						<div class="row">
							<div class="col-xs-12">
								<img src="<?=base_url().'templates/website/logo_payment/logo_ngang_30.png'?>" class="img-responsive center-block">
							</div>
						</div>
					</form>
    			</div>
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
<script src="<?=base_url();?>templates/website/js/modernizr-2.6.2.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery-1.11.0.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.easing.min.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/moment-with-locales.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>templates/website/bootstrap/js/daterangepicker.js"></script>
<script src="<?=base_url()?>templates/website/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.transit.min.js"></script>
<script src="<?=base_url()?>templates/website/js/numtostring.js"></script>
<script src="<?=base_url()?>templates/website/js/scipt-page.js"></script>
<script src="<?=base_url()?>templates/website/js/viewport.js"></script>
<script src="<?=base_url()?>templates/website/js/fix-no-banner.js"></script>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>