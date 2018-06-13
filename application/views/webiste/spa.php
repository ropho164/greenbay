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
    <div id="<?=$sub_menu_link?>" class="about_parent_home clearfix">
        <!--Room 1-->
        <?php if($results_spa && sizeof($results_spa)>0){?>
        <div class="row mgbt0 bg_top_details_room mg0 pd0 item-affect clearfix" style="z-index: 3">
            <div class="col-xs-12 mg0 pd0">
                <div class="content_about_detail">
                    <div class="content_spa_detail pdt15 pdb15">
                        <div class="_title_special"><?=$results_spa[0]["article_title_1"]?></div>
                        <div class="_title">
                            <div class="_item_title">
                                <div class="clearfix"><?=$results_spa[0]["article_title"]?></div>
                                <div class="clearfix _item_underline_title"></div>
                            </div>
                        </div>
                        <div class="font_std pdt15">    
                            <?=html_entity_decode($results_spa[0]["article_content"])?>
                        </div>
                    </div>
					<div class="content_spa_detail text-center pdb15">
						<a href="<?=$results_spa[0]["article_files_1"]?>" class="a_pdf_download" target="_blank"><?=$results_spa[0]["article_title_files_1"]?></a>						
					</div>
                    <div class="content_spa_detail text-center" style="position: relative">
                       <div id="spaCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                       		  <!-- Wrapper for slides -->
							  <div class="carousel-inner">
							  <?php 
									$result_thumb = $ci->getPhotoThumb($results_spa[0]['id']);
									if($result_thumb && sizeof($result_thumb)>0){
								  	$cnt = 0;
								  	?>
										   <?php foreach($result_thumb as $thumb){
											$cnt++;
											$clActive = '';
											if($cnt==1){
												$clActive = 'active';
											}
								  			?>
											<div class="item <?=$clActive?>">
											  <img src="<?=base_url().'uploads/'.$thumb['pro_photo']?>" class="img-responsive center-block">
											</div>
										<?php } ?>
								<?php }?>								
							  </div>
							  <!-- Left and right controls -->
							  <a class="left carousel-control" href="#spaCarousel" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#spaCarousel" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							  </a>
						</div>
						<!-- Jssor Slider End -->
                    </div>
                </div>  
                <div class="leaf_bottom_one"><img src="<?=base_url()?>templates/website/images/left_abouts.png" alt="" class="img-responsive"></div>           
            </div>
        </div>
        <?php } if($results_spa_therapies && sizeof($results_spa_therapies)>0){?>
        <div class="row special_offer_parent_home mgbt0 mg0 pd0 item-affect clearfix" style="z-index: 2">
        	<div class="line_green_spa"></div>
        	<div class="col-xs-12 bg_accom_other_room_end mg0 pd0 pdt25 pdb25 clearfix">
           		<div class="content_spa_detail">
					<div class="_title">
						<div class="_item_title">
							<div class="clearfix"><?=$results_spa_therapies[0]["article_title_1"]?></div>
						</div>
					</div>
				</div>
            	<div class="content_spa_detail">
              		<div id="accordion">
				    <?php
						$cnt = 0;
						foreach($results_spa_therapies as $obj){?>
                        <div class="panel panel-default" style="background-color: #FFFFFF;border-color: #FFFFFF">
                              <div class="panel-heading clearfix" role="tab" style="background-color: #FFFFFF;border-color: #FFFFFF;position: relative;border-radius: 0">
                                <h3 class="panel-title font_bold_std"><?=$obj["article_title"]?></h3>
                                <div class="pull-right clickable" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$obj["id"]?>" data-id="<?=$obj["id"]?>" data-title="<?=$obj["article_title"]?>" style="background-color: #0f9f4a"><i class="more-less-services glyphicon <?php if($cnt==0){ echo 'glyphicon-minus'; } else {echo 'glyphicon-plus';};?>"  style="color: #FFF;font-size: 8pt"></i></div>
                              </div>
                              <div id="collapse<?=$obj["id"]?>" class="panel-collapse collapse <?php if($cnt==0) echo 'in';?> clearfix">
                                <div class="panel-body font_std" style="background-color:#FFFFFF">
                                	<?php echo html_entity_decode($obj['article_content']);?>
                                </div>
                              </div>
                        </div>
                        <?php $cnt++; } ?>
                   </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php include ("footer_page.php");?>
    </div>
    <?php include ("form-right.php");?>  
</div>
<!-- Javascript files
<script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>-->
<script src="<?=base_url()?>templates/website/js/jquery-1.11.0.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.mobile.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.easing.min.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/moment-with-locales.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>templates/website/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.transit.min.js"></script>
<script src="<?=base_url()?>templates/website/js/scipt-page.js"></script>
<script src="<?=base_url()?>templates/website/js/viewport.js"></script>
<script src="<?=base_url()?>templates/website/js/fix-no-banner.js"></script>
<script type="text/javascript">
$(document).ready(function() {  
	$(".carousel-inner").swiperight(function() {  
		  $(this).parent().carousel('prev');  
	});  
    $(".carousel-inner").swipeleft(function() {  
	  $(this).parent().carousel('next');  
    });  
}); 
function toggleIcon(e) {
	$(e.target).prev('.panel-heading').find("i").toggleClass('glyphicon-plus glyphicon-minus');
}
$('#accordion').on('hidden.bs.collapse', toggleIcon);
$('#accordion').on('shown.bs.collapse', toggleIcon); 
</script>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>