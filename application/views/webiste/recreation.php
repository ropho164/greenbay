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
    <div id="weddings-conferences" class="container-full fix-no-banner clearfix" style="background-color: rgba(255,255,255,1.00)">
       <?php if($results_event && sizeof($results_event)>0){
		foreach($results_event as $obj){?>
		<!--restaurent-->
		<div class="about_parent_home clearfix">
			<div class="row-std col-eq-height mg0 pd0 item-affect clearfix">
				<div class="line_green_rerecreation"></div>
				<div class="col-xs-6 mg0 pd0">
					<div class="img-res-sqr">
						<div class="item-container-fluid">
							<div class="item-row-fluid text-center">
								<div style="padding:50px 100px 60px 120px">
									<img src="<?=base_url().'uploads/'.$obj['article_picture_2']?>" alt="" class="sec-img-no-border"/>
								</div>
							</div>
						</div>
					</div>
					<div class="img-res-wrap">
						<img src="<?=base_url().'uploads/'.$obj['article_picture_1']?>" alt="" class="img-responsive"/>
					</div>
				</div>
				<div class="col-xs-6 bg_dining_restaurent_greenbay col-height-right mg0 pd0">
					<div class="item-container-fluid">
						<div class="item-row-fluid">
							<div class="content_about_detail">
								<div class="content_about_detail_desc_text font_std pull-left">
									<div class="_title pdb15">
										<div class="_item_title">
											<div class="_title_special"><?=$obj["article_title"]?></div>
											<div class="clearfix _item_underline_title"></div>
										</div>
									</div>
									<div class="font_std">
										<p class="font_std">
											<?=html_entity_decode($obj['article_content'])?>
										</p>
										<p class="text-center pdt10" style="line-height: 22px">
											<a href="<?=$obj['article_files_1']?>" class="a_pdf_download" target="_blank"><?=$obj['article_title_files_1']?></a>
										</p>
									</div>
								</div>
							</div>
					   </div>
					</div>
				</div>
			</div>
			<div class="restaurant_desc_dining pdt20 pdb25 item-affect clearfix">
				<div class="_item_recreation_bound">
					<div class="col-xs-5 col-xs-push-7 mg0 event_pading_photo">
						<div id="jssor_second" style="position: relative; top: 0px; left: 0px; width: 380px;height: 300px;">
							<!-- Slides Container -->
							<div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.5);">
								<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
								<div style="position:absolute;display:block;background:url('<?=base_url()?>templates/website/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
							</div>
							<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 380px; height: 250px;overflow: hidden;">
								<?php	
								$result_event_services = $ci->listDataSubActive($obj['article_langue'],10,$obj['article_intro_type']);
								if($result_event_services && sizeof($result_event_services)>0){								
									$cntevent = 0;
									foreach($result_event_services as $objEvent){?>
									<div>
										<img data-u="image"  src="<?=base_url().'uploads/'.$objEvent['article_picture_1']?>" alt=""/>
										<div class="caption" data-u="caption" id="event-slide-<?=$cntevent?>">
											<div class="clearfix">
												<div class="_title_green pdb15">
													<div class="_item_green_title">
														<div class="clearfix"><?=$objEvent["article_title"]?></div>
														<div class="clearfix _item_underline_green_title"></div>
													</div>
													<p class="font_std">
														<?=html_entity_decode($objEvent['article_content'])?>
													</p>
													<a href="<?=base_url().$this->lang->line('key')?>/reservation">
													 <div class="bg_radient_green pdt15">
														 <span class="font_bold_std txtt_trans_up" style="color:rgba(255,255,255,1.00)">
															<?php echo $this->lang->line('btn_reserve');?>
														 </span>
													</div>
													</a>
												</div>
											</div>
										</div>
									</div>
								<?php $cntevent++; } }?>
							</div> 
							<!--#region Arrow Navigator Skin Begin -->
							<!-- Arrow Left -->
							<span u="arrowleft" class="jssora333l">
							</span>
							<!-- Arrow Right -->
							<span u="arrowright" class="jssora333r">
							</span>
						</div>
					</div>
					<div id="second-intro" class="col-xs-7 col-xs-pull-5 mg0 pd0" style="line-height: 15pt">
					</div>
				</div>        	
			</div>
		</div>
	   <?php } } ?>
       <?php if($results_wedding && sizeof($results_wedding)>0){
	   foreach($results_wedding as $obj){?>
       	<div class="about_parent_home clearfix">
        	<div class="row-std col-eq-height mg0 pd0 item-affect clearfix">
				<div class="col-xs-6 col-xs-push-6 mg0 pd0">
					<div class="img-res-sqr">
						<div class="item-container-fluid">
							<div class="item-row-fluid text-center">
								<div style="padding:50px 120px 60px 100px">
									<img src="<?=base_url().'uploads/'.$obj['article_picture_2']?>" alt="" class="sec-img-no-border"/>
								</div>
							</div>
						</div>
					</div>
					<div class="img-res-wrap">
						<img src="<?=base_url().'uploads/'.$obj['article_picture_1']?>" alt="" class="img-responsive"/>
						<div class="col-xs-4 mg0 pd0" style="position:absolute;left:0px;top:0px"><img src="<?=base_url()?>templates/website/images/about_photo_1.png" alt="" class="img-responsive"/></div>
					</div>
               </div>
               <div class="col-xs-6 col-xs-pull-6 bg_aboutus col-height mg0 pd0">
                    <div class="item-container-fluid">
                        <div class="item-row-fluid">
                            <div class="content_about_detail">
                                <div class="content_about_detail_desc_text font_std">
                                    <div class="_title pdb15">
                                        <div class="_item_title">
                                            <div class="_title_special"><?=$obj['article_title']?></div>
                                            <div class="clearfix _item_underline_title"></div>
                                        </div>
                                    </div>
									<div class="font_std">
										<?=html_entity_decode($obj['article_content']);?>
										<p class="text-center pdt10" style="line-height: 22px">
											<a href="<?=$obj['article_files_1']?>" class="a_pdf_download" target="_blank">
													<?=$obj['article_title_files_1']?>
											</a>
										</p>
                              		</div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
        </div>
        <div class="restaurant_desc_dining pdt20 pdb20 item-affect clearfix">
         	<div class="leaf_top_one"><img src="<?=base_url()?>templates/website/images/left_abouts.png" alt="" class="img-responsive"/></div>
        	<div class="_item_recreation_bound">
				<div class="col-xs-5 wedding_pading_photo">
					<div id="jssor_first" style="position: relative; top: 0px; left: 0px; width: 380px;height: 300px;">
						<!-- Slides Container -->
						<div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.5);">
							<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
							<div style="position:absolute;display:block;background:url('<?=base_url()?>templates/website/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
						</div>
						<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 380px; height: 250px;overflow: hidden;">
							<?php	
		   					$result_wedding_services = $ci->listDataSubActive($obj['article_langue'],8,$obj['article_intro_type']);
							if($result_wedding_services && sizeof($result_wedding_services)>0){								
								$cntservices = 0;
								foreach($result_wedding_services as $objWed){?>
								<div>
									<img data-u="image"  src="<?=base_url().'uploads/'.$objWed['article_picture_1']?>" alt=""/>
									<div class="caption" data-u="caption" id="wed-slide-<?=$cntservices?>">
										<div class="clearfix">
											<div class="_title_green pdb15">
												<div class="_item_green_title">
													<div class="clearfix"><?=$objWed["article_title"]?></div>
													<div class="clearfix _item_underline_green_title"></div>
												</div>
												<p class="font_std">
													<?=html_entity_decode($objWed['article_content'])?>
												</p>
												<a href="<?=base_url().$this->lang->line('key')?>/reservation">
													<div class="bg_radient_green pdt15">
														 <span class="font_bold_std txtt_trans_up" style="color:rgba(255,255,255,1.00)">
															<?php echo $this->lang->line('btn_reserve');?>
														 </span>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							<?php $cntservices++; } }?>
						</div> 
						<!--#region Arrow Navigator Skin Begin -->
						<!-- Arrow Left -->
						<span u="arrowleft" class="jssora333l">
						</span>
						<!-- Arrow Right -->
						<span u="arrowright" class="jssora333r">
						</span>
					</div>
				</div>
				<div id="first-intro" class="col-xs-7 wedding_pading_text">					
				</div>
        	</div>        	
        </div>
    </div>
    <?php } } ?>
	
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
<script src="<?=base_url()?>templates/website/js/jssor.slider-22.2.11.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>templates/website/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.transit.min.js"></script>
<script src="<?=base_url()?>templates/website/js/scipt-page.js"></script>
<script src="<?=base_url()?>templates/website/js/viewport.js"></script>
<script src="<?=base_url()?>templates/website/js/fix-no-banner.js"></script>
<script src="<?=base_url()?>templates/website/js/banner_slide.js"></script>
<script src="<?=base_url()?>templates/website/js/recreation_slider.js"></script>
<script type="text/javascript">
	//jssor_1_slider_init();
	jssor_first_slider_init();
	jssor_second_slider_init();
</script>
<?php include_once("scroll-to-content.php");?>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>