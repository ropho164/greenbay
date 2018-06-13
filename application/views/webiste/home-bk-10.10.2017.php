<?php $ci = &get_instance();?>
<!DOCTYPE html>
<html class="no-js"><head>
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
<link rel="stylesheet" href="<?=base_url()?>templates/website/slick/slick.css">
<link href="<?=base_url()?>templates/website/js/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/bootstrap/css/datepicker.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/datepicker/daterangepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>templates/website/touchspin/jquery.bootstrap-touchspin.css" />
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
    <?php include ("banner-slider.php");?>
	<div class="container-full clearfix" style="border-bottom: 3px solid #1a8755"></div>
    <div class="container-full clearfix">
        <?php if($results_greenbay && sizeof($results_greenbay)>0){
		foreach($results_greenbay as $obj){?>
           <div class="about_parent_home item-affect clearfix">
            <div style="background-image: url(<?=base_url().$obj['article_picture_1']?>)" class="col-xs-12 bg_about mg0 pd0 clearfix">
                <div class="col-xs-6 mg0 pd0">
                    <img src="<?=base_url()?>templates/website/images/bg_top_white.png" alt="" class="img-responsive"/>
                    <div class="col-xs-6 mg0 pd0" style="height:100%">
                        <div class="item-container-fluid">
                            <div class="item-row-fluid-bottom">
                                <div class="circle_md"><div><?=$obj["article_title_content_1"]?></div></div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="container_about clearfix">
                <div class="col-xs-3 mg0 pd0" style="height:100%">
                    <div class="item-container-fluid">
                        <div class="item-row-fluid">
                           <div class="_title_special"><?=$obj["article_title_1"]?></div>
                            <div class="_title">
                                <div class="_item_title">
                                    <div class="clearfix"><?=$obj["article_title"]?></div>
                                    <div class="clearfix _item_underline_title"></div>
                                </div>
                            </div>
                            <div class="content_about desc-full font_std">
                            	<?=word_limiter($obj["article_desc"],30)?>
                            </div>
                            <div class="content_about desc-1024 font_std">
                            	<?=word_limiter($obj["article_desc"],20)?>
                            </div>
                            <a href="<?=base_url().$this->lang->line('key')?>/explore">
                            <div class="bound_cicle_70_abs">
                                <div class="circle circle_orange">
                                    <div class="circle_text_70"><?php echo $this->lang->line('more');?></div>
                                </div>
                            </div>
							</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line_white"></div>
        </div>
        <?php } } ?>
        <!--end greenbay-->
        <?php if($results_dining && sizeof($results_dining)>0){
		foreach($results_dining as $obj){?>
        <div class="dinning_parent_home item-affect clearfix" style="z-index: 5">
            <div style="background-image: url(<?=base_url().$obj['article_picture_1']?>)" class="col-xs-12 bg_dinning mg0 pd0 clearfix">
                <div class="col-xs-6 mg0 pd0"><img src="<?=base_url()?>templates/website/images/bg_top_green.png" alt="" class="img-responsive"/></div>
                <div class="col-xs-6 mg0 pd0 pull-right"><img src="<?=base_url()?>templates/website/images/bg_top_right_white.png" alt="" class="img-responsive pull-right"/></div>
            </div>
            <div class="container_dinning mg0 pd0">
				<div class="col-xs-3 mg0 pd0 pull-right" style="height:100%">
					<div class="item-container-fluid">
						<div class="item-row-fluid-bottom dining_pdl">
						   <div class="_title_special"><?=$obj["article_title_1"]?></div>
							<div class="_title">
								<div class="_item_title">
									<div class="clearfix"><?=$obj["article_title"]?></div>
									<div class="clearfix _item_underline_title"></div>
								</div>
							</div>
							<div class="content_dining desc-full font_std">
								<?=word_limiter($obj["article_desc"],20)?>
							</div>
							<div class="content_dining desc-1024 font_std">
								<?=word_limiter($obj["article_desc"],20)?>
							</div>
							<a href="<?=base_url().$this->lang->line('key')?>/dining">
							<div class="bound_cicle_70">
								<div class="circle circle_orange">
									<div class="circle_text_70"><?php echo $this->lang->line('more');?></div>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="line_green"></div>
        </div>
        <?php } }?>
        <!--end dining-->
        <?php if($results_accom && sizeof($results_accom)>0){
		foreach($results_accom as $obj){?>
        <div style="z-index: 4" class="accomodation_parent_home item-affect clearfix">
           <a href="<?=base_url().$this->lang->line('key')?>/accommodation" class="a_coolor_nomal">
            <div style="background-image: url(<?=base_url().$obj['article_picture_1']?>)" class="col-xs-12 bg_accomodation mg0 pd0 clearfix">
                <div class="col-xs-6 mg0 pd0" style="z-index:5"><img src="<?=base_url()?>templates/website/images/bg_top_leaf.png" alt="" class="img-responsive"/></div>        
                <div class="col-xs-6 mg0 pd0 pull-right" style="z-index:5">
                    <img src="<?=base_url()?>templates/website/images/bg_top_right_leaf.png" alt="" class="img-responsive pull-right"/>
                    <div class="container_accom_right">
                        <div class="col-xs-7 mg0 pd0 pull-right" style="height:100%">
                            <div class="item-container-fluid">
                                <div class="item-row-fluid-bottom text-center">
                                    <div class="desc_accom">
                                    	<p class="title_desc"><?=$obj["article_title_content_1"]?></p>
                                    	<p class="desc-full font_std">
											<?=word_limiter($obj["article_content_1"],20)?>	
                                      	</p>
                                      	<p class="desc-1024 font_std">
											<?=word_limiter($obj["article_content_1"],15)?>	
                                      	</p>
                                       <div class="bound_cicle_70">
                                            <div class="circle circle_orange">
                                                <div class="circle_text_70_<?=$this->lang->line('key')?>">
                                                <?php echo $this->lang->line('discover');?>
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
			</a>
            <div class="col-xs-12 container_accom_top mg0 pd0 clearfix">
                <div class="col-xs-10 text-center mg0 pd0" style="padding-top:20px;padding-bottom:20px;">
                    <div class="_title_special"><?=$obj["article_title_1"]?></div>
                    <div class="_title">
                        <div class="_item_title">
                            <div class="clearfix"><?=$obj["article_title"]?></div>
                            <div class="clearfix _item_underline_title"></div>
                        </div>
                    </div>
                    <div class="content_accom" style="max-width: 50%">
                       <?=word_limiter($obj["article_desc"],30)?>
                    </div>
                    <div class="content_accom">
                        <div class="btn_normal_view">
                            <?php echo $this->lang->line('discover').' >>';?>
                        </div>
                        <a href="<?=base_url().$this->lang->line('key')?>/accommodation">
                        <div class="btn_responsive_view">
                            <div class="bound_cicle_70_responsive">
                                <div class="circle circle_orange">
                                    <div class="circle_text_70"><?php echo $this->lang->line('discover');?></div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="line_green_1"></div>
        </div>
        <?php } }?>
        <!--end accom-->
        <?php if($results_tropical && sizeof($results_tropical)>0){
		foreach($results_tropical as $obj){?>
        <div style="z-index: 3" class="spa_parent_home item-affect clearfix">        
                <div class="col-xs-6 mg0 pd0" style="z-index:1">
                    <img src="<?=base_url()?>templates/website/images/bg_spa_left.png" alt="" class="img-responsive"/>
                </div>
                <div class="col-xs-6 mg0 pd0" style="z-index:1"><img src="<?=base_url()?>templates/website/images/bg_spa_right.png" alt="" class="img-responsive"/></div>
                <div class="col-xs-12 mask-bg mg0 pd0">
                    <img src="<?=base_url().$obj['article_picture_1']?>" class="img-responsive"/>
                </div>
            <div class="container_spa clearfix">
                <div class="col-xs-7" style="height:100%">
                    <div class="item-container-fluid">
                        <div class="item-row-fluid-bottom text-center">
                            <div class="_title_special"><?=$obj["article_title_1"]?></div>
                            <div class="_title">
                                <div class="_item_title">
                                    <div class="clearfix"><?=$obj["article_title"]?></div>
                                    <div class="clearfix _item_underline_title"></div>
                                </div>
                            </div>
                            <div class="content_spa desc-full font_std">
                                <?=word_limiter($obj["article_desc"],55)?>
                            </div>
                            <div class="content_spa desc-1024 font_std">
                                <?=word_limiter($obj["article_desc"],25)?>
                            </div>
                            <div class="content_spa_photo clearfix">
                                <?php if($results_tropical_thumd && sizeof($results_tropical_thumd)>0){
									foreach($results_tropical_thumd as $thumd){?>
                                   <div class="col-xs-4">
                                    	<img src="<?=base_url().$thumd['pro_photo']?>" alt="" class="img-responsive img-circle" style="border:3px solid #e1e1e1"/>
                                	</div>
                                <?php }} ?>	
                            </div>
                            <div class="content_spa clearfix">
                                <a href="<?=base_url().$this->lang->line('key')?>/interests/green-valley-spa">
                                   <div class="bound_cicle_70_right">
                                    <div class="circle circle_orange">
                                        <div class="circle_text_70"><?php echo $this->lang->line('more');?></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                     </div>
                 </div>
             </div>
             <div class="line_white_1"></div>
        </div>
        <?php } } ?>
        <!--end spa-->
        <div class="special_offer_parent_home pdt20 pdbt20 item-affect clearfix">
			<div id="carousel_feel" class="clearfix">
				<?php
				if(isset($results_feel) && sizeof($results_feel)>0){
					$cnt_feel = 0;
					foreach ($results_feel as $obj){
						$cnt_feel++;
						echo '<div class="_feel_item">';
							echo '<img src="'.base_url().$obj['article_picture_1'].'" id="item-'.$cnt_feel.'" class="img-responsive center-block img-circle" />';
							echo '<div class="row parent_feel_talk">';
								echo '<h5 class="color_brand font_bold_std text-center pdlr">'.$obj['article_title'].'</h5>';
								echo '<div class="feel_talk_nesed">';
									echo '<p>'.html_entity_decode($obj['article_desc']).'</p>';
									echo '<p class="text-right"><a class="color_brand_link small" href="'.$obj['article_title_1'].'" target="_blank"><em>Xem thêm</em></a></p>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
				}?>
			</div>
    		<div class="row carousel-arrows text-center pdbt15">    			
			</div>
	    </div>
        <!--
        <?php if($results_feel && sizeof($results_feel)>0){
		foreach($results_feel as $obj){?>
        <div style="z-index: 2" class="special_offer_parent_home item-affect clearfix">
            <div class="special_offer_content text-center">
                <div class="_title">
                    <div class="_item_title">
                        <div class="clearfix"><?=$obj["article_title_1"].' '.$obj["article_title"]?></div>
                    </div>
                </div>
                <div class="special_offer_desc font_std">
					<?=$obj['article_desc']?>
                </div>
                <div class="col-xs-12 mg0 pd0">
                    <?php if($results_special_item && sizeof($results_special_item)>0){
						$cntItem = sizeof($results_special_item);
						$strCenter = '';
						if($cntItem<3){
							$strCenter = 'col-center';
						}
						foreach($results_special_item as $item){?>
                       <div class="col-xs-4 mg0 pd0 <?=$strCenter?>">
                        <a href="<?=base_url().$this->lang->line('key')?>/special-offers" class="portfolio-box">
                            <img src="<?=base_url().'uploads/'.$item['article_picture_2']?>" alt="" class="img-responsive"/>
                            <div class="new_title_box">
								<div class="new_title_box_content text-center">
									<?=$item["article_title_1"]?>
								</div>
                       		</div>
                        </a>
                    </div>
                    <?php } }?>
                </div>
                <div class="col-xs-12" style="padding-bottom:40px"></div>
            </div>
        </div>
        <?php } }?>
        -->
        <?php include ("footer_page.php");?>
    </div>
    <?php include ("form-right.php");?>  
</div>
<script src="<?=base_url();?>templates/website/js/respond.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery-1.11.0.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.easing.min.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>templates/website/slick/slick.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>templates/website/touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/moment-with-locales.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?=base_url()?>templates/website/datepicker/moment.js"></script>
<script type="text/javascript" src="<?=base_url()?>templates/website/datepicker/daterangepicker.js"></script>
<script src="<?=base_url()?>templates/website/js/jssor.slider-22.2.11.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>templates/website/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.transit.min.js"></script>
<script src="<?=base_url()?>templates/website/js/scipt-page.js"></script>
<script src="<?=base_url()?>templates/website/js/fix-no-banner.js"></script>
<script src="<?=base_url()?>templates/website/js/viewport.js"></script>
<script type="text/javascript">
$(document).ready(function() {
		$('#carouselloading').carousel({
		  interval: 5000,
		  pause: false
		});
        $('#reservation').daterangepicker({
		    locale: {
			  format: 'YYYY/MM/DD'
			},
		    "autoApply": true,
		    "opens": "left"
	   },
		function(start, end, label) {
		   $("#txtFrom").val(start.format('YYYY/MM/DD'));
		   $("#txtTo").val(end.format('YYYY/MM/DD'));
		   //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
		});
		$(".showtab").click(function(){
			if($(this).find('i').hasClass('glyphicon-minus')) {
				$(this).find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
			}
			else{
				$(this).find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
			}
		});
		$("input[name='TROOMS']").TouchSpin({
			 min: 1,
             max: 50,
			 postfix_extraclass: "btn btn-incre",
			 boostat: 5,
		});
		$("input[name='ADULT']").TouchSpin({
			 min: 1,
             max: 50
		});
		$("input[name='CHILD']").TouchSpin({
			 min: 0,
             max: 10
		});
		$(".spin_click").change(function(){
			$(".show_tab_title").empty();
			$(".show_tab_title").append($("input[name='TROOMS']").val()+" Rooms, "+ $("input[name='ADULT']").val()+" Adult, "+$("input[name='CHILD']").val()+" Child");
		});
		$(".panle_form").addClass("open_pan");
		$('#carousel_feel').slick({
				infinite: false,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				accessibility:false,
				centerMode: true,
				autoplay: false,
				centerPadding: '10px',
				variableWidth: true,
				appendArrows: '.carousel-arrows',
				prevArrow: '<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>',
        		nextArrow: '<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>',
			});
      });
</script>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
<?php include_once("inc-code-external.php");?>
</body>
</html>