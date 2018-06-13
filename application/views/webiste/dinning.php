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
<link href="<?=base_url()?>templates/website/js/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/css/animations.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/bootstrap/css/animate.min.css" rel="stylesheet">
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
    <div class="container-full fix-no-banner clearfix" style="background-color: rgba(255,255,255,1.00)">
    <?php
    if($results_greenbay && sizeof($results_greenbay)>0){
	   foreach($results_greenbay as $obj){?>
    <!--restaurent-->
    <div id="green-bay-restaurant" class="about_parent_home clearfix">
        <div class="line_green_dining"></div>
        <div class="row-std col-eq-height mg0 pd0 item-affect clearfix">
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
								<div class="_title_special"><?=$obj["article_title_1"]?></div>
								<div class="_title pdb15">
									<div class="_item_title">
										<div class="clearfix"><?=$obj["article_title"]?></div>
										<div class="clearfix _item_underline_title"></div>
									</div>
								</div>
								<div class="font_std">
									<?=html_entity_decode($obj["article_content"])?>
									<p class="text-center pdt10" style="line-height: 22px">
										<a href="<?=$obj["article_files_1"]?>" class="a_pdf_download" target="_blank">
												<?=$obj["article_title_files_1"]?>
										</a>
										<br/>
										<a href="<?=$obj["article_files_2"]?>" class="a_pdf_download" target="_blank">
												<?=$obj["article_title_files_2"]?>
										</a>
									</p>
								</div>
							</div>
						</div>
				   </div>
				</div>
			</div>
        </div>
        <div class="restaurant_desc_dining pdt20 item-affect clearfix">
        	<div class="_desc_dining_bound">
				<div class="col-xs-6 col-xs-push-6 mg0">
					<?php	$result_thumb_sunset = $ci->getPhotoThumb($obj['id']);
					if($result_thumb_sunset && sizeof($result_thumb_sunset)>0){
						foreach($result_thumb_sunset as $thumbSunset){?>
						<div class="col-xs-6"><img src="<?=base_url().'uploads/'.$thumbSunset['pro_photo']?>" alt="" class="img-responsive"/></div>
					<?php } }?>
				</div>
				<div class="col-xs-6 col-xs-pull-6 mg0">
					<div class="clearfix">
						<div class="col-xs-5">
						<?php if(isset($obj["article_title_content_1"]) && $obj["article_title_content_1"]!="" && $obj["article_title_content_1"]!=NULL){?>
							<div class="_title_green pdb15">
								<div class="_item_green_title">
									<div class="clearfix"><?=$obj["article_title_content_1"]?></div>
									<div class="clearfix _item_underline_green_title"></div>
								</div>
								<p class="font_std">
									<?=html_entity_decode($obj["article_content_1"])?>
								</p>
							</div>
							<?php } if(isset($obj["article_title_content_2"]) && $obj["article_title_content_2"]!="" && $obj["article_title_content_2"]!=NULL){?>
							<div class="_title_green pdb15">
								<div class="_item_green_title">
									<div class="clearfix"><?=$obj["article_title_content_2"]?></div>
									<div class="clearfix _item_underline_green_title"></div>
								</div>
								<p class="font_std">
									<?=html_entity_decode($obj["article_content_2"])?>
								</p>
							</div>
							<?php } ?>
						</div>
						<div class="col-xs-7 mg0 pd0">
							<div class="_title_green pdb15">
								<div class="_item_green_title">
									<div class="clearfix"><?=$obj["article_title_content_3"]?></div>
									<div class="clearfix _item_underline_green_title"></div>
								</div>
								<p class="font_std">
									<?=html_entity_decode($obj["article_content_3"])?>
								</p>
							</div>
						</div>
					</div>
					<div class="clearfix">
						<div class="col-xs-5">
							 <a href="<?=base_url().$this->lang->line('key')?>/reservation">
							 <div class="bg_radient_green pad">
								 <span class="font_bold_std txtt_trans_up" style="color:rgba(255,255,255,1.00)">
									<?php echo $this->lang->line('btn_booking');?>
								 </span>
							</div>
							</a>
						</div>
					</div>
				</div>
        	</div>        	
        </div>
    </div>
    <?php } }
      if($results_sunset && sizeof($results_sunset)>0){
	   foreach($results_sunset as $obj){?>
       <div id="dream-bay-restaurant" class="about_parent_home clearfix">
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
                                    <div class="_title_special"><?=$obj['article_title_1']?></div>
                                    <div class="_title pdb15">
                                        <div class="_item_title">
                                            <div class="clearfix"><?=$obj['article_title']?></div>
                                            <div class="clearfix _item_underline_title"></div>
                                        </div>
                                    </div>
									<div class="font_std">
										<?=html_entity_decode($obj['article_content']);?>
										<p class="text-center pdt10" style="line-height: 22px">
											<a href="<?=$obj['article_files_1']?>" class="a_pdf_download" target="_blank">
													<?=$obj['article_title_files_1']?>
											</a>
											<br/>
											<a href="<?=$obj['article_files_2']?>" class="a_pdf_download" target="_blank">
													<?=$obj['article_title_files_2']?>
											</a>
										</p>
                              		</div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
        </div>
        <div class="restaurant_desc_dining pdt20 item-affect clearfix">
         	<div class="leaf_top_one"><img src="<?=base_url()?>templates/website/images/left_abouts.png" alt="" class="img-responsive"/></div>
        	<div class="_desc_dining_bound">
				<div class="col-xs-6 mg0">
					<?php	$result_thumb_sunset = $ci->getPhotoThumb($obj['id']);
					if($result_thumb_sunset && sizeof($result_thumb_sunset)>0){
						foreach($result_thumb_sunset as $thumbSunset){?>
						<div class="col-xs-6"><img src="<?=base_url().'uploads/'.$thumbSunset['pro_photo']?>" alt="" class="img-responsive"/></div>
					<?php } }?>
				</div>
				<div class="col-xs-6 mg0">
					<div class="clearfix">
						<div class="col-xs-5">
						<?php if(isset($obj["article_title_content_1"]) && $obj["article_title_content_1"]!="" && $obj["article_title_content_1"]!=NULL){?>
							<div class="_title_green pdb15">
								<div class="_item_green_title">
									<div class="clearfix"><?=$obj["article_title_content_1"]?></div>
									<div class="clearfix _item_underline_green_title"></div>
								</div>
								<p class="font_std">
									<?=html_entity_decode($obj["article_content_1"])?>
								</p>
							</div>
							<?php } if(isset($obj["article_title_content_2"]) && $obj["article_title_content_2"]!="" && $obj["article_title_content_2"]!=NULL){?>
							<div class="_title_green pdb15">
								<div class="_item_green_title">
									<div class="clearfix"><?=$obj["article_title_content_2"]?></div>
									<div class="clearfix _item_underline_green_title"></div>
								</div>
								<p class="font_std">
									<?=html_entity_decode($obj["article_content_2"])?>
								</p>
							</div>
							<?php } ?>
						</div>
						<div class="col-xs-7 mg0 pd0">
							<div class="_title_green pdb15">
								<div class="_item_green_title">
									<div class="clearfix"><?=$obj["article_title_content_3"]?></div>
									<div class="clearfix _item_underline_green_title"></div>
								</div>
								<p class="font_std">
									<?=html_entity_decode($obj["article_content_3"])?>
								</p>
							</div>
						</div>
					</div>
					<div class="clearfix">
						<div class="col-xs-5">
							 <a href="<?=base_url().$this->lang->line('key')?>/reservation">
							 <div class="bg_radient_green pad">
								 <span class="font_bold_std txtt_trans_up" style="color:rgba(255,255,255,1.00)">
									<?php echo $this->lang->line('btn_booking');?>
								 </span>
							</div>
							</a>
						</div>
					</div>
				</div>
        	</div>        	
        </div>
    </div>
    <?php } } 
	if($results_pool && sizeof($results_pool)>0){
	 foreach($results_pool as $obj){?>
    <!--end-->
    <div id="pool-bar" class="about_parent_home bg_things_to_see_photo item-affect clearfix" style="background-color: rgba(255,255,255,1.00)">
		<div class="col-xs-12 bg_pool_bar mg0 pd0">
			<div class="content_accom_detail">
				<div class="_title_special"><?=$obj["article_title_1"]?></div>
				<div class="_title pdb15">
					<div class="_item_title">
						<div class="clearfix"><?=$obj["article_title"]?></div>
						<div class="clearfix _item_underline_title"></div>
					</div>
				</div>
				<div class="font_std clearfix">
					<?=html_entity_decode($obj["article_content"])?>				
				</div>
				<div class="font_std text-center pdt20 clearfix">
					<a href="<?=$obj["article_files_1"]?>" class="a_pdf_download" target="_blank"><?=$obj["article_title_files_1"]?></a>					
				</div>
				<div class="font_std pdt20 clearfix">
					<img src="<?=base_url().'uploads/'.$obj['article_picture_1']?>" style="width: 100%;height: auto;margin: 0 auto">				
				</div>
				<div class="font_std text-center pdt20 pdb20 clearfix">
					<div class="_title_green pdb15">
						<div class="_item_green_title">
							<div class="clearfix"><?=$obj["article_title_content_1"]?></div>
							<div class="clearfix _item_underline_green_title"></div>
						</div>
						<p class="font_std">
							<?=html_entity_decode($obj["article_content_1"])?>
						</p>
					</div>
				</div>
			</div>
		</div>
    </div>
    <?php } }?>
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
<!--<script type="text/javascript">jssor_1_slider_init();</script>-->
<?php include_once("scroll-to-content.php");?>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>