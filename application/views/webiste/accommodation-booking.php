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
       <div class="about_parent_home clearfix">
       		<div class="box_booking">
       		<?php if($results_rooms && sizeof($results_rooms)>0){
			foreach($results_rooms as $obj){ ?>
			<form method="post" action="<?=base_url().$this->lang->line('key')?>/reservation">
				<input name="datetimepickerStart" type="hidden" value="<?=$datestart?>">
				<input name="datetimepickerEnd" type="hidden" value="<?=$dateend?>">
				<input name="ADULT" type="hidden" value="<?=$numAdult?>">
				<input name="CHILD" type="hidden" value="<?=$numChild?>">
				<input name="ROOMS" type="hidden" value="<?=$numRooms?>">
				<input name="ROOMSTYPE" type="hidden" value="<?=$obj['categories_sub_id']?>">
				<div class="row pdt25 pdb10 clearfix">
					<div class="_title">
						<div class="_item_title">
							<?=$obj["article_price_apply"].' '.$obj["article_title"]?>
						</div>
					</div>
				</div>
				<div class="row row-eq-height mg0 pd0 item-affect clearfix">
						<div style="background-image: url(<?=base_url().'uploads/rooms/'.$obj['article_picture_2']?>)" class="col-xs-6 mg0 pd0 bg_rooms_fix">
						</div>
						<div class="col-xs-6 mg0 pd0">
							<div class="box_booking_desc">
							<div class="row mg0 mgt0 pd0">
							<div class="line_green_yellow_list bg_radient_green_block clearfix">&nbsp;</div>
							<div style="line-height:1.8em;background-color:rgba(255,255,255,1.00);padding:20px;">
							 <div class="font_std clearfix">
								<?=html_entity_decode($obj["article_content_orther"])?>
							 </div>
							 <div class="row mg0 pd0 clearfix">
								 <div class="div_left clearfix">
									 <div class="mg0 pd0 text-left" style="width:auto">
									 <span class="font_bold_std txtt_trans_up" style="color:#00904c">
										<?php echo $this->lang->line('text_starting');?>
									 </span>
									 <br/>
									 <span class="font_bold_std txtt_trans_up" style="font-size:18pt">
										<?php if($language=='vn'){
											echo smarty_number($obj['article_price'])." USD";
										 }else{
											echo "USD ".smarty_number($obj['article_price']);
										 }?>
									 </span>
									 <br/>
									 <span class="font_std txtt_trans_up" style="font-size:10pt">
										<?php if($language=='vn'){
											echo smarty_vnd($obj['article_price_vn']);
										 }else{
											echo "VND ".smarty_number($obj['article_price_vn']);
										 }?>
									 </span>
									 </div>
								 </div>
								 <div class="div_right clearfix">
									 <button type="submit" class="btn bg_radient_green input-no-radius">
										<span class="font_bold_std txtt_trans_up">
											<?php echo $this->lang->line('btn_booking');?>
										</span>
									 </button>
								 </div>
								 </div>
							</div>
						</div>
						<div class="row mg0 pd0"> 
							<div class="font_std pdb15" style="color:#0f9e4a;text-transform:uppercase;font-size:15pt"><?php echo $this->lang->line('text_amenities');?></div>
							<div class="font_std" style="line-height:1.7em">
								<?=html_entity_decode($obj["article_content"])?>
							</div>
						</div>
						</div>
					</div>
				</div>
				</form>
				<hr/>
			<?php }}?>
			</div>
		</div>
	<!--end content-->	
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
<script src="<?=base_url()?>templates/website/js/banner_slide.js"></script>
<!--<script type="text/javascript">jssor_1_slider_init();</script>-->
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>