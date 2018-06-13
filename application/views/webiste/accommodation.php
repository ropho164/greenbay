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
       	<?php if($results_rooms && sizeof($results_rooms)>0){
			$cnt = 0;
			foreach($results_rooms as $obj){
		    if($cnt==0){
		   ?>
			<!--Room 1-->
			<div class="row-std col-eq-height mg0 pd0 item-affect clearfix" style="z-index: 2">
				<div class="line_green_accom"></div>
				<div style="background-image: url(<?=base_url().'uploads/rooms/'.$obj['article_picture_2']?>)" class="col-xs-6 col-xs-push-6 bg_triangle_1 mg0 pd0">
				   <div class="img-res-sqr mg0 pd0">
						<!--<div class="triangle-up-left"></div>-->
						<img src="<?=base_url()?>templates/website/images/line_triangle_1.png" alt="" class="img-responsive"/>
				   </div>
				   <div class="img-res-wrap">
						<img src="<?=base_url().'uploads/rooms/'.$obj["article_picture_1"]?>" alt="" class="img-responsive"/>
				   </div>
				</div>
				<div class="col-xs-6 col-xs-pull-6 bg_accom_1 col-height mg0 pd0">
					<div class="item-container-fluid">
						<div class="item-row-fluid">
							<div class="content_about_detail">
								<div class="content_about_detail_desc_text">
									<div class="_title_special"><?=$obj["article_price_apply"]?></div>
									<div class="_title">
										<div class="_item_title">
											<div class="clearfix"><?=$obj["article_title"]?></div>
											<div class="clearfix _item_underline_title"></div>
										</div>
									</div>
									<div class="font_std pdt15">    
										<?=$obj["article_desc"]?>
									</div>
									<div class="bound_cicle_70">
										<div class="circle circle_orange">
											<div class="circle_text_70">
											<a href="<?php echo base_url().$language.'/'.$obj['category_lnk'].'/'.$obj['sub_lnk_'.$this->lang->line('key')];?>"><?php echo $this->lang->line('more');?></a></div>
										</div>
									</div>
								</div>
							</div>
					   </div>
					</div>
				</div>
			</div>
			<?php } else if($cnt==1){?>
			<!--Room 2-->
			<div class="row-std col-eq-height mg0 pd0 item-affect clearfix" style="z-index: 1">
				<div style="background-image: url(<?=base_url().'uploads/rooms/'.$obj['article_picture_2']?>)" class="col-xs-6 bg_triangle_2 mg0 pd0">
				   <div class="img-res-wrap">
						<img src="<?=base_url().'uploads/rooms/'.$obj["article_picture_1"]?>" alt="" class="img-responsive"/>
				   </div>
				   <div class="img-res-sqr pull-right mg0 pd0">
						<img src="<?=base_url()?>templates/website/images/line_triangle_2.png" alt="" class="img-responsive pull-right"/>
						<!--<div class="triangle-up-bottom"></div>-->
				   </div>
				</div>
				<div class="col-xs-6 bg_accom_2 col-height-right mg0 pd0">
					<div class="item-container-fluid">
						<div class="item-row-fluid">
							<div class="content_about_detail">
								<div class="content_about_detail_desc_text_left">
									<div class="_title_special"><?=$obj["article_price_apply"]?></div>
									<div class="_title">
										<div class="_item_title">
											<div class="clearfix"><?=$obj["article_title"]?></div>
											<div class="clearfix _item_underline_title"></div>
										</div>
									</div>
									<div class="font_std pdt15">
										<?=$obj["article_desc"]?>
									</div>
									<div class="bound_cicle_70">
										<div class="circle circle_orange">
											<div class="circle_text_70">
											<a href="<?php echo base_url().$language.'/'.$obj['category_lnk'].'/'.$obj['sub_lnk_'.$this->lang->line('key')];?>"><?php echo $this->lang->line('more');?></a>
											</div>
										</div>
									</div>
								</div>
							</div>
					   </div>
					</div>
				</div>
			</div>
			<?php } else if($cnt==2){?>
			<!--Room 3-->
			<div class="row-std col-eq-height mg0 pd0 item-affect clearfix" style="z-index: 2">
				<div class="line_white_accom"></div>
				  <div style="background-image: url(<?=base_url().'uploads/rooms/'.$obj['article_picture_2']?>)" class="col-xs-6 col-xs-push-6 bg_triangle_3 mg0 pd0">
				   <div class="img-res-sqr mg0 pd0">
						<img src="<?=base_url()?>templates/website/images/line_triangle_1.png" alt="" class="img-responsive"/>
				   </div>
				   <div class="img-res-wrap">
						<img src="<?=base_url().'uploads/rooms/'.$obj["article_picture_1"]?>" alt="" class="img-responsive"/>
				   </div>
				</div>
				<div class="col-xs-6 col-xs-pull-6 bg_accom_3 col-height mg0 pd0">
					<div class="item-container-fluid">
						<div class="item-row-fluid">
							<div class="content_about_detail">
								<div class="content_about_detail_desc_text">
									<div class="_title_special"><?=$obj["article_price_apply"]?></div>
									<div class="_title">
										<div class="_item_title">
											<div class="clearfix"><?=$obj["article_title"]?></div>
											<div class="clearfix _item_underline_title"></div>
										</div>
									</div>
									<div class="font_std pdt15">
										<?=$obj["article_desc"]?>
									</div>
									<div class="bound_cicle_70">
										<div class="circle circle_orange">
											<div class="circle_text_70">
											<a href="<?php echo base_url().$language.'/'.$obj['category_lnk'].'/'.$obj['sub_lnk_'.$this->lang->line('key')];?>"><?php echo $this->lang->line('more');?></a>
											</div>
										</div>
									</div>
								</div>
							</div>
					   </div>
					</div>
				</div>
			</div>
			<?php } else if($cnt==3){?>
			<!--rOM 4-->
			<div class="row-std col-eq-height mg0 pd0 item-affect clearfix"  style="z-index: 1">
				<div style="background-image: url(<?=base_url().'uploads/rooms/'.$obj['article_picture_2']?>)" class="col-xs-6 bg_triangle_4 mg0 pd0">
				   <div class="img-res-wrap">
						<img src="<?=base_url().'uploads/rooms/'.$obj["article_picture_1"]?>" alt="" class="img-responsive"/>
				   </div>
				   <div class="img-res-sqr pull-right mg0 pd0">
						<img src="<?=base_url()?>templates/website/images/line_triangle_2.png" alt="" class="img-responsive pull-right"/>
				   </div>
				</div>
				<div class="col-xs-6 bg_accom_4 col-height-right mg0 pd0">
					<div class="item-container-fluid">
						<div class="item-row-fluid">
							<div class="content_about_detail">
								<div class="content_about_detail_desc_text_left">
									<div class="_title_special"><?=$obj["article_price_apply"]?></div>
									<div class="_title">
										<div class="_item_title">
											<div class="clearfix"><?=$obj["article_title"]?></div>
											<div class="clearfix _item_underline_title"></div>
										</div>
									</div>
									<div class="font_std pdt15">    
										<?=$obj["article_desc"]?>
									</div>
									<div class="bound_cicle_70">
										<div class="circle circle_orange">
											<div class="circle_text_70">
											<a href="<?php echo base_url().$language.'/'.$obj['category_lnk'].'/'.$obj['sub_lnk_'.$this->lang->line('key')];?>"><?php echo $this->lang->line('more');?></a>
											</div>
										</div>
									</div>
								</div>
							</div>
					   </div>
					</div>
				</div>
			</div>
			<!--Room 5-->
			<?php } else if($cnt==4){?>
			<div class="row-std col-eq-height mg0 pd0 item-affect clearfix">
				<div style="background-image: url(<?=base_url().'uploads/rooms/'.$obj['article_picture_2']?>)" class="col-xs-7 col-xs-push-5 bg_triangle_5 mg0 pd0">
				   <div class="img-res-sqr mg0 pd0">
						<img src="<?=base_url()?>templates/website/images/line_triangle_1.png" alt="" class="img-responsive"/>
						<div class="col-xs-3 pull-right mg0 pd0" style="position:absolute;right:0px;bottom:0px"><img src="<?=base_url()?>templates/website/images/about_photo_1_up.png" alt="" class="img-responsive pull-right"/></div>
				   </div>
				   <div class="img-res-wrap">
						<img src="<?=base_url().'uploads/rooms/'.$obj["article_picture_1"]?>" alt="" class="img-responsive"/>
				   </div>
				</div>
				<div class="col-xs-5 col-xs-pull-7 bg_accom_5 col-height mg0 pd0">
					<div class="item-container-fluid">
						<div class="item-row-fluid">
							<div class="content_about_detail">
								<div class="content_about_detail_desc_text_col_5">
									<div class="_title_special"><?=$obj["article_price_apply"]?></div>
									<div class="_title">
										<div class="_item_title">
											<div class="clearfix"><?=$obj["article_title"]?></div>
											<div class="clearfix _item_underline_title"></div>
										</div>
									</div>
									<div class="font_std pdt15">    
										<?=$obj["article_desc"]?>
									</div>
									<div class="bound_cicle_70">
										<div class="circle circle_orange">
											<div class="circle_text_70">
											<a href="<?php echo base_url().$language.'/'.$obj['category_lnk'].'/'.$obj['sub_lnk_'.$this->lang->line('key')];?>"><?php echo $this->lang->line('more');?></a>
											</div>
										</div>
									</div>
								</div>
							</div>
					   </div>
					</div>
				</div>
			</div>
			<!--End-->
			<?php } $cnt++; } } ?>
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