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
    <?php if($results_greenbay && sizeof($results_greenbay)>0){
	foreach($results_greenbay as $obj){?>
    <div id="green-bay-resort" style="z-index: 3" class="about_parent_home item-affect clearfix">
        <div class="row-std col-eq-height mg0 pd0 clearfix">
                <div class="col-xs-6 col-xs-push-6 mg0 pd0">
                    <div class="img-res-sqr">
                        <div class="item-container-fluid">
                            <div class="item-row-fluid text-center">
                                <div style="padding:100px">
                                    <img src="<?=base_url().'uploads/'.$obj['article_picture_2']?>" alt="" class="sec-img"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="img-res-wrap">
                        <img src="<?=base_url().'uploads/'.$obj['article_picture_1']?>" alt="" class="img-responsive"/>
                    </div>
                </div>
                <div class="col-xs-6 col-xs-pull-6 bg_aboutus col-height mg0 pd0">
                    <div class="item-container-fluid">
                        <div class="item-row-fluid">
                            <div class="content_about_detail">
                                <div class="content_about_detail_desc_text font_std">
                                    <div class="_title_special"><?=$obj["article_title_1"]?></div>
                                    <div class="_title">
                                        <div class="_item_title">
                                            <div class="clearfix"><?=$obj["article_title"]?></div>
                                            <div class="clearfix _item_underline_title"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content_about_detail_text font_std">
                                    <?php echo html_entity_decode($obj['article_content']);?>
                                </div>
                                <div class="content_about_detail_text">
                                    <div class="block_style">
                                        <div style="float:left">
                                            <img src="<?=base_url()?>uploads/intro/abouts_circle.jpg" alt="" class="img-responsive img-circle" style="border:3px solid #e1e1e1"/>
                                        </div>
                                        <div style="float:left;margin-left:-35px">
                                            <div class="circle_md_180">
                                                <div class="item-container-fluid">
                                                    <div class="item-row-fluid text-center">
                                                        <div class="text_middle_circle">
                                                           <?php echo str_replace(" ","<br/>",$obj['article_title_content_1']);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="more_circle">
                                           <div class="bound_cicle_70">
                                                <div class="circle circle_orange">
                                                    <div class="circle_text_70"><?php echo $this->lang->line('more');?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
        </div>
        <div class="leaf_bottom_one"><img src="<?=base_url()?>templates/website/images/left_abouts.png" alt="" class="img-responsive"/></div>
    </div>
    <?php }}?>
    <!--end greenbay-->
    <?php if($results_island && sizeof($results_island)>0){
		foreach($results_island as $obj){?>
    <div id="phu-quoc-island" class="about_parent_home item-affect clearfix"  style="background-color:rgba(255,255,255,1.00);z-index: 2">
        <div class="line_green_abouts"></div>
        <div class="line_green_abouts_center"></div>        
        <div class="row-std col-eq-height">
            <div class="col-xs-6 bg_island mg0 pd0">
                <div class="img-res-sqr">
                    <img src="<?=base_url().'uploads/'.$obj['article_picture_2']?>" alt="" style="width:100%;margin:0 auto;"/>
                </div>
                <div class="img-res-wrap">
                    <img src="<?=base_url().'uploads/'.$obj['article_picture_1']?>" alt="" class="img-responsive"/>
                </div>
                <div class="col-xs-2 mg0 pd0" style="position:absolute;top:0px;left:-10px"><img src="<?=base_url()?>templates/website/images/bg_abouts_green.png" alt="" class="img-responsive"/></div>
            </div>
            <div class="col-xs-6 mg0 pd0 col-height-right" style="z-index:2">
                <div class="item-container-fluid">
                    <div class="item-row-fluid">
                        <div class="content_about_detail">
                            <div class="_title_special"><?=$obj["article_title_1"]?></div>
                            <div class="_title">
                                <div class="_item_title">
                                    <div class="clearfix"><?=$obj["article_title"]?></div>
                                    <div class="clearfix _item_underline_title"></div>
                                </div>
                            </div>
                            <div class="content_about_detail_text font_std">    
                                <div class="col-xs-11 mg0 pd0">
                                <p class="font_std"><?=$obj["article_desc"]?></p>
                                <p class="font_std"><?php echo html_entity_decode($obj['article_content']);?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } }?>
    <!--end island-->
    <?php if($results_thingsee && sizeof($results_thingsee)>0){?>
    <div class="about_parent_home bg_things_to_see item-affect clearfix" style="background-color:#f5f5f5;">
        <div class="row" style="padding-top:30px;">
            <div class="col-xs-6 mg0 pd0">
                <div class="_title">
                    <div class="_item_title">
                        <div class="clearfix"><?=$results_thingsee[0]["article_title_1"]?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-std col-eq-height mg0 pd0 clearfix">
            <div class="col-xs-6 col-xs-push-6 bg_things_to_see_photo mg0 pd0">
              <!--getPhotoThumb-->
              <div id="" class="col-xs-12"> 
              <?php 
					$cntPhoto = 0;
					foreach($results_thingsee as $obj){					
					$result_thumb = $ci->getPhotoThumb($obj['id']);
					if($result_thumb && sizeof($result_thumb)>0){?>
					<div id="photo-thumd-<?=$obj['id']?>" class="photo-thingsee <?php if($cntPhoto==0) echo 'p-active';?>"> 
						   <?php foreach($result_thumb as $thumb){?>
						   <div class="col-xs-4">
								<div style="max-width:180px;margin:0 auto">
									<img src="<?=base_url().'uploads/'.$thumb['pro_photo']?>" alt="" class="img-responsive img-circle"/>
								</div>
							</div>
						<?php } ?>
					</div>
                <?php } $cntPhoto++;}?>
				</div>
                <!--end thumb-->
                <div class="col-xs-12">
                    <div style="margin:0 auto;padding-top:20px;padding-bottom:20px;width:180px;">
                        <div class="circle_md_180_middle">
                            <div class="item-container-fluid">
                                <div class="item-row-fluid text-center">
                                    <div id="desc_things_to_see" data-id="<?=$results_thingsee[0]["id"]?>" class="text_middle_circle">
                                       <?=$results_thingsee[0]["article_title"]?>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-xs-pull-6 mg0 pd0">
                <div class="col-xs-12">
                    <div id="accordion">
				    <?php
						$cnt = 0;
						foreach($results_thingsee as $obj){?>
                        <div class="panel panel-default">
                              <div class="panel-heading clearfix" role="tab"  style="border-radius: 0;position: relative;">
                                <h3 class="panel-title font_bold_std"><?=$obj["article_title"]?></h3>
                                <div class="pull-right clickable" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$obj["id"]?>" data-id="<?=$obj["id"]?>" data-title="<?=$obj["article_title"]?>" style="background-color: #0f9f4a"><i class="glyphicon <?php if($cnt==0){ echo 'glyphicon-minus'; } else {echo 'glyphicon-plus';};?>" style="color: #FFF;font-size: 8pt"></i></div>
                              </div>
                              <div id="collapse<?=$obj["id"]?>" class="panel-collapse collapse <?php if($cnt==0) echo 'in';?> clearfix">
                                <div class="panel-body font_std" style="background-color:#dee3e3">
                                	<?php echo html_entity_decode($obj['article_content']);?>
                                </div>
                              </div>
                        </div>
                        <?php $cnt++; } ?>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!--end things-->
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
<script type="text/javascript">jssor_1_slider_init();</script>-->
<script language="javascript">
	$(document).on('click', '.panel-heading div.clickable', function(e){
		var $this = $(this);
		var currentID = $this.attr('data-id');
		var $obj = $("#accordion").find('i')
		if($this.find('i').hasClass('glyphicon-plus')) {
			if($obj.hasClass('glyphicon-minus')) {
				$obj.removeClass('glyphicon-minus').addClass('glyphicon-plus');
			}
			$this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
		} else if($this.find('i').hasClass('glyphicon-minus')) {
			if($obj.hasClass('glyphicon-minus')) {
				$obj.removeClass('glyphicon-minus').addClass('glyphicon-plus');
			}
			$this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');		
		}
		var titleID = $("#desc_things_to_see").attr('data-id');
		if(currentID != titleID){
			$("#desc_things_to_see").attr('data-id',currentID);
			$("#desc_things_to_see").empty();
			$("#desc_things_to_see").text($this.attr('data-title'));
			$(".photo-thingsee").removeClass("p-active")
			$("#photo-thumd-"+currentID).addClass("p-active");
		}
	});
</script>
<?php include_once("scroll-to-content.php");?>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>