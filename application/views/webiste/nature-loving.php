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
    <div class="container-full fix-no-banner clearfix" style="background-color: rgba(255,255,255,1.00)">
    <div id="<?=$sub_menu_link?>" class="about_parent_home clearfix">
    <?php if($results_spa && sizeof($results_spa)>0){
	   $cnt = 0;
	   foreach($results_spa as $obj){
		if($cnt>1){
			$cnt = 0;
		}
		if($cnt==0){?>
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
										<?php if($obj['article_files_1']!='' && $obj['article_files_1']!=null){?>
										<p class="text-center pdt10" style="line-height: 22px">
											<a href="<?=$obj['article_files_1']?>" class="a_pdf_download" target="_blank">
													<?=$obj['article_title_files_1']?>
											</a>
										</p>
                             			<?php }?>
                              		</div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
        </div>
    <?php } else if($cnt==1){ ?>
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
									<?php if($obj['article_files_1']!='' && $obj['article_files_1']!=null){?>
									<p class="text-center pdt10" style="line-height: 22px">
										<a href="<?=$obj['article_files_1']?>" class="a_pdf_download" target="_blank"><?=$obj['article_title_files_1']?></a>
									</p>
									<?php }?>
								</div>
							</div>
						</div>
				   </div>
				</div>
			</div>
        </div>
		<?}
		 $cnt++;
		}
	} ?>
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