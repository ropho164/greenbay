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
        <?php if($results_rooms_details && sizeof($results_rooms_details)>0){
		foreach($results_rooms_details as $obj){?>
        <div class="row mgbt0 bg_top_details_room mg0 pd0 item-affect clearfix">
            <div class="col-xs-12 mg0 pd0">
                <div class="content_about_detail">
                    <div class="content_accom_detail">
                        <div class="_title_special"><?=$obj["article_price_apply"]?></div>
                        <div class="_title">
                            <div class="_item_title">
                                <div class="clearfix"><?=$obj["article_title"]?></div>
                                <div class="clearfix _item_underline_title"></div>
                            </div>
                        </div>
                    </div>
					<div class="content_accom_detail_fix">
						 <?php if($results_photo_slide && sizeof($results_photo_slide)>0){?>
						  <div class="row-eq-height pdt15">
							<div class="col-xs-6">
								<?php if($results_photo_slide && sizeof($results_photo_slide)>0){
									echo '<img src="'.base_url().'uploads/rooms/slide_details/testing.jpg" class="img-responsive center-block" />';
								} else {
									echo '<img src="'.base_url().'uploads/rooms/'.$obj['article_picture_1'].'" class="img-responsive" />';
							 }?>
							</div>
							<div class="col-xs-6" style="line-height:1.5em;background-color:rgba(255,255,255,1.00)">
							<div class="row" style="padding:20px;">
								<div class="font_std pdt10">    
									<?=$obj["article_desc"]?>
								</div>
								<div class="font_std pdt10">
									<?=html_entity_decode($obj["article_content_orther"])?>
								</div>
								<div class="font_std pdt10" style="color:#0f9e4a;text-transform:uppercase;font-size:12pt"><?php echo $this->lang->line('text_amenities');?></div>
								<div class="font_std pdt10">
									<?=html_entity_decode($obj["article_content"])?>
								</div>
								<div class="row mg0 pd0 clearfix">
								 <div class="div_left pdt10 clearfix">
									 <div class="mg0 pd0 text-left" style="width:auto">
										 <div class="font_bold_std txtt_trans_up" style="color:#00904c">
											<?php echo $this->lang->line('text_starting');?>
										 </div>
										 <div class="font_bold_std txtt_trans_up pdt10" style="font-size:18pt">
											<?php echo 'US $ '.$obj['article_price'];?>
										 </div>
										 <div class="font_std txtt_trans_up pdt10" style="font-size:11pt">
											<?=smarty_vnd($obj['article_price_vn'])?>
										 </div>
									 </div>
								 </div>
								 <form method="post" action="<?=base_url().$this->lang->line('key')?>/reservation">
									<input name="ROOMSTYPE" type="hidden" value="<?=$obj['categories_sub_id']?>">
									<div class="div_right pdt25 clearfix">
										 <button type="submit" class="btn bg_radient_green input-no-radius">
											<span class="font_bold_std txtt_trans_up">
												<?php echo $this->lang->line('btn_booking');?>
											</span>
										 </button>
									 </div>
								 </form>
							   </div>
							  </div> 
							</div>
						  </div>
						  <?php } ?>
						</div>
                </div>
            </div>
        </div>
        <div class="row mgbt0 bg_accom_other_room mg0 pd0 item-affect clearfix">
            <div class="col-xs-12 bg_accom_other_room_end mg0 pd0 pdt25">
             <?php
                   if($results_rooms_orther && sizeof($results_rooms_orther)>0){
						$prlnk='';
						if($main_menu_link!='' && $main_menu_link!=NULL){
							$prlnk = $main_menu_link.'/';
						}
					?>   
                   <div class="content_accom_detail mg0 pd0">
                    <div class="_title">
                        <div class="_item_title">
                            <div class="clearfix">
								<?php echo $this->lang->line('text_rooms_orther');?>
                      		 </div>
                        </div>
                    </div>
                </div>
                <div class="content_accom_detail mg0 pd0 clearfix">
                    <div class="col-xs-12 mg0 pd0 pdt25">
                            <div class="carousel slide" id="myCarousel">
                              <div class="carousel-inner">
                                <?php
					   			$cntOrther = 0;	
					   			foreach($results_rooms_orther as $objOrther){?>
                                 <div class="item <?php if($cntOrther==0) echo 'active';?>">
                                  <div class="col-xs-6 mg0 pd0" style="padding:10px">
                                    <a href="<?php echo base_url().$language.'/'.$objOrther['category_lnk'].'/'.$objOrther['sub_lnk'];?>" class="portfolio-box galleryItem"><img src="<?php echo base_url().'uploads/rooms/'.$objOrther['article_picture_2'];?>" class="img-responsive">
                                        <div class="portfolio-box-caption">
                                            <div class="portfolio-box-caption-content">
                                                <div class="project-name">
                                                    <div class="font_bold_std" style="width:100px;margin: 0 auto;padding-bottom:5px;padding-top:0px;text-align:center;">
														<?=$objOrther['article_price_apply'].' '.$objOrther['article_title']?>
                                               		</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>                                
                                    </div>
                                </div>
                                <?php $cntOrther++; } ?>
                              </div>
                              <div class="nav-left-bound">
                                   <a href="#myCarousel" data-slide="prev"><span class="nav-carousel-left"></span></a>
                              </div>
                              <div class="nav-right-bound">
                                  <a href="#myCarousel" data-slide="next"><span class="nav-carousel-right"></span></a>
                              </div>
                            </div>
                     </div>
                </div>
                <div class="clearfix" style="min-height: 25px"></div>
                <?php } ?>
            </div>
        </div>
        <?php } } ?>
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
<script src="<?=base_url()?>templates/website/js/jssor.slider-22.2.11.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>templates/website/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.transit.min.js"></script>
<!--<script src="<?=base_url()?>templates/website/js/jquery.bcswipe.js"></script>-->
<script src="<?=base_url()?>templates/website/js/scipt-page.js"></script>
<script src="<?=base_url()?>templates/website/js/viewport.js"></script>
<script src="<?=base_url()?>templates/website/js/fix-no-banner.js"></script>
<!--<script src="<?=base_url()?>templates/website/js/banner_slide.js"></script>-->
<?php if($results_photo_slide && sizeof($results_photo_slide)>0){
	echo '<script src="'.base_url().'templates/website/js/thumb_slider.js"></script>';
	echo '<script type="text/javascript">jssor_thumb_slider_init();</script>';
}?>

<!--<script type="text/javascript">jssor_1_slider_init();</script>-->
<script language="javascript">
$('#myCarousel').carousel({
  interval: false,
  wrap: false
}) 
$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
});
//$('.carousel .item').bcSwipe({ threshold: 50 });
</script>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>