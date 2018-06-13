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
    			<div class="gallery_page_content_bound_noline item-affect clearfix">
    				 <form id="booking-form" class="booking-form" name="form1" method="post" action="">
						<div align="center" style="margin-bottom:20px"><img src="<?php echo base_url();?>templates/website/images/logo.png" alt="Green Bay - Resort & Spa"/></div>
						<div class="_title" style="padding-bottom: 20px">
							<div class="_item_title">
								<div class="clearfix"><div class="_title_special" style="text-transform: none"><?php echo $this->lang->line('frm_text_header');?></div></div>
								<div class="clearfix _item_underline_title"></div>
							</div>
						</div>
						<div id="form-content">
							<div class="group">
								<label for="date-from"><?php echo $this->lang->line('frm_lbl_from');?></label>
								<div>
									<input id="date-from" name="date-from" class="form-control input-no-radius icon_calendar" type="text" value="<?=$datestart?>">
								</div>
							</div>
							<div class="group">
								<label for="date-to"><?php echo $this->lang->line('frm_lbl_to');?></label>
								<div>
									<input id="date-to" name="date-to" class="form-control input-no-radius icon_calendar" type="text" value="<?=$dateend?>">
								</div>
							</div>
							<div class="group">
								<label for="room-type"><?php echo $this->lang->line('frm_lbl_room_type');?></label>
								<div>
									<select id="room-type" name="room-type" class="form-control input-no-radius">
										<?php if($results_rooms && sizeof($results_rooms)>0){
												foreach($results_rooms as $obj){
													if($typeRooms==$obj['id']){
														echo '<option value="'.$obj['article_price_apply'].' '.$obj['article_title'].'" selected >'.$obj['article_price_apply'].' '.$obj['article_title'].'</option>';	
													}
													else{
														echo '<option value="'.$obj['article_price_apply'].' '.$obj['article_title'].'" >'.$obj['article_price_apply'].' '.$obj['article_title'].'</option>';	
													}
												}
											}
										?>
									</select>
								</div>
							</div>
							<div class="group">
								<label for="numrooms"><?php echo $this->lang->line('frm_lbl_room_number');?></label>
								<div>
								<select id="numrooms" name="numrooms" class="form-control input-no-radius">
										<option value="1" <?php if($numRooms==1){echo "selected";}?> >1</option>
										<option value="2" <?php if($numRooms==2){echo "selected";}?> >2</option>
										<option value="3" <?php if($numRooms==3){echo "selected";}?> >3</option>
										<option value="4" <?php if($numRooms==4){echo "selected";}?> >4</option>
										<option value="5" <?php if($numRooms==5){echo "selected";}?> >5</option>
										<option value="6" <?php if($numRooms==6){echo "selected";}?> >6</option>
										<option value="7" <?php if($numRooms==7){echo "selected";}?> >7</option>
										<option value="8" <?php if($numRooms==8){echo "selected";}?> >8</option>
										<option value="9" <?php if($numRooms==9){echo "selected";}?> >9</option>
										<option value="10" <?php if($numRooms==10){echo "selected";}?> >10</option>
										<option value="11" <?php if($numRooms==11){echo "selected";}?> >11</option>
										<option value="12" <?php if($numRooms==12){echo "selected";}?> >12</option>
										<option value="13" <?php if($numRooms==13){echo "selected";}?> >13</option>
										<option value="14" <?php if($numRooms==14){echo "selected";}?> >14</option>
										<option value="15" <?php if($numRooms==15){echo "selected";}?> >15</option>
										<option value="16" <?php if($numRooms==16){echo "selected";}?> >16</option>
										<option value="17" <?php if($numRooms==17){echo "selected";}?> >17</option>
										<option value="18" <?php if($numRooms==18){echo "selected";}?> >18</option>
										<option value="19" <?php if($numRooms==19){echo "selected";}?> >19</option>
										<option value="20" <?php if($numRooms==20){echo "selected";}?> >20</option>
									</select>
								</div>
							</div>
							<div class="group">
								<label for="room-requirements"><?php echo $this->lang->line('frm_lbl_room_require');?></label>
								<div>
									<select id="room-requirements" name="room-requirements" class="form-control input-no-radius">
										<option value="<?php echo $this->lang->line('frm_lbl_room_require_item_1');?>"><?php echo $this->lang->line('frm_lbl_room_require_item_1');?></option>
										<option value="<?php echo $this->lang->line('frm_lbl_room_require_item_2');?>"><?php echo $this->lang->line('frm_lbl_room_require_item_2');?></option>
										<option value="<?php echo $this->lang->line('frm_lbl_room_require_item_3');?>"><?php echo $this->lang->line('frm_lbl_room_require_item_3');?></option>
									</select>
								</div>
							</div>

							<div class="group">
								<label for="adults"><?php echo $this->lang->line('frm_lbl_room_adults');?></label>
								<div>
									<select id="adults" name="adults" class="form-control input-no-radius">
										<option value="1" <?php if($numAdult==1){echo "selected";}?> >1</option>
										<option value="2" <?php if($numAdult==2){echo "selected";}?> >2</option>
										<option value="3" <?php if($numAdult==3){echo "selected";}?> >3</option>
										<option value="4" <?php if($numAdult==4){echo "selected";}?> >4</option>
										<option value="5" <?php if($numAdult==5){echo "selected";}?> >5</option>
										<option value="6" <?php if($numAdult==6){echo "selected";}?> >6</option>
										<option value="7" <?php if($numAdult==7){echo "selected";}?> >7</option>
										<option value="8" <?php if($numAdult==8){echo "selected";}?> >8</option>
										<option value="9" <?php if($numAdult==9){echo "selected";}?> >9</option>
										<option value="10" <?php if($numAdult==10){echo "selected";}?> >10</option>
										<option value="11" <?php if($numAdult==11){echo "selected";}?> >11</option>
										<option value="12" <?php if($numAdult==12){echo "selected";}?> >12</option>
										<option value="13" <?php if($numAdult==13){echo "selected";}?> >13</option>
										<option value="14" <?php if($numAdult==14){echo "selected";}?> >14</option>
										<option value="15" <?php if($numAdult==15){echo "selected";}?> >15</option>
										<option value="16" <?php if($numAdult==16){echo "selected";}?> >16</option>
										<option value="17" <?php if($numAdult==17){echo "selected";}?> >17</option>
										<option value="18" <?php if($numAdult==18){echo "selected";}?> >18</option>
										<option value="19" <?php if($numAdult==19){echo "selected";}?> >19</option>
										<option value="20" <?php if($numAdult==20){echo "selected";}?> >20</option>
									</select>
								</div>
							</div>
							<div class="group">
								<label for="children"><?php echo $this->lang->line('frm_lbl_room_children');?></label>
								<div>
									<select id="children" name="children" class="form-control input-no-radius">
										<option value="0" <?php if($numChild==0){echo "selected";}?> >0</option>
										<option value="1" <?php if($numChild==1){echo "selected";}?> >1</option>
										<option value="2" <?php if($numChild==2){echo "selected";}?> >2</option>
										<option value="3" <?php if($numChild==3){echo "selected";}?> >3</option>
										<option value="4" <?php if($numChild==4){echo "selected";}?> >4</option>
										<option value="5" <?php if($numChild==5){echo "selected";}?> >5</option>
										<option value="6" <?php if($numChild==6){echo "selected";}?> >6</option>
										<option value="7" <?php if($numChild==7){echo "selected";}?> >7</option>
										<option value="8" <?php if($numChild==8){echo "selected";}?> >8</option>
										<option value="9" <?php if($numChild==9){echo "selected";}?> >9</option>
										<option value="10" <?php if($numChild==10){echo "selected";}?> >10</option>
										<option value="11" <?php if($numChild==11){echo "selected";}?> >11</option>
										<option value="12" <?php if($numChild==12){echo "selected";}?> >12</option>
										<option value="13" <?php if($numChild==13){echo "selected";}?> >13</option>
										<option value="14" <?php if($numChild==14){echo "selected";}?> >14</option>
										<option value="15" <?php if($numChild==15){echo "selected";}?> >15</option>
										<option value="16" <?php if($numChild==16){echo "selected";}?> >16</option>
										<option value="17" <?php if($numChild==17){echo "selected";}?> >17</option>
										<option value="18" <?php if($numChild==18){echo "selected";}?> >18</option>
										<option value="19" <?php if($numChild==19){echo "selected";}?> >19</option>
										<option value="20" <?php if($numChild==20){echo "selected";}?> >20</option>
									</select>
								</div>
							</div>
							<div class="group">
								<label for="name"><?php echo $this->lang->line('frm_lbl_room_name');?></label>
								<div><input id="name" name="name" class="form-control input-no-radius" type="text" placeholder="<?php echo $this->lang->line('frm_lbl_room_name');?>"></div>
							</div>
							<div class="group">
								<label for="email"><?php echo $this->lang->line('frm_lbl_room_email');?></label>
								<div><input id="email" name="email" class="form-control input-no-radius" type="email" placeholder="<?php echo $this->lang->line('frm_lbl_room_email');?>"></div>
							</div>
							<div class="group">
								<label for="phone"><?php echo $this->lang->line('frm_lbl_room_phone');?></label>
								<div><input id="phone" name="phone" class="form-control input-no-radius" type="text" placeholder="<?php echo $this->lang->line('frm_lbl_room_phone');?>"></div>
							</div>
							<div class="group">
								<label for="special-requirements"><?php echo $this->lang->line('frm_lbl_room_spec_require');?></label>
								<div><textarea id="special-requirements" name="special-requirements" class="form-control input-no-radius" cols="" rows="5" placeholder="<?php echo $this->lang->line('frm_lbl_room_spec_require');?>"></textarea></div>
							</div>
							<div class="group submit">
								<label class="empty"></label>
								<div><button id="register" name="register" class="btn button_booking "><div class="button_booking_bg"></div><div class="button_booking_text text-center"><?php echo $this->lang->line('btn_submit');?></div></button></div>
							</div>
						</div>
						<div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>
						<div id="form-message" class="message hide">
							<?php echo $this->lang->line('frm_thanks_booking');?>
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
<script src="<?php echo base_url();?>templates/website/js/plugins.js"></script>
<script src="<?=base_url()?>templates/website/js/scipt-page.js"></script>
<script src="<?=base_url()?>templates/website/js/viewport.js"></script>
<script src="<?=base_url()?>templates/website/js/fix-no-banner.js"></script>
<script language="javascript">
    	$(function(){
			var form = $('#booking-form'),
			loading = $('#form-loading')
			content = $('#form-content'),
			message = $('#form-message');
		
			$(form).submit(function(){
				$(loading).css({
					paddingTop: Math.round($(form).height()/2) + 'px'
				}).removeClass('hide');
		
				$.ajax({
					type: 'POST',
					url: '<?=base_url().$language.'/'?>reservation/booking',
					data: $(form).serialize(),
					dataType: 'json',
					success: function(data){
						$(loading).fadeOut('fast', function(){
							$(this).addClass('hide').fadeIn();
						});
						if (data.code == 'failed'){
							$('.error-message', form).remove();
							data.fields = data.fields.reverse();
							for (var i in data.fields){
								$('[name=' + data.fields[i].name + ']', form).trigger('focus').trigger('click').parent('div').each(function(){
									$(this).append($('<div>').addClass('error-message').html(data.fields[i].message));
								});
							}
						}else if (data.code == 'success'){
							$(content).fadeOut('fast', function(){
								$(this).addClass('hide');
								$(message).removeClass('hide');
							});
						}
					},
				});
				return false;
			});
			
			$('#date-from, #date-to', form).dateTimePicker({
				paging: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
				picker: ['date'],
				format: 'Y/m/d',
				filter: function(date){
					// Select date in the future
					var d = new Date();
					if (date.getTime() < d.getTime()){
						return false;
					}else{
						return true;
					}
				},
				filter_show: function(date){
					var d = new Date();
					return date.getYear() > d.getYear() || (date.getYear() == d.getYear() && date.getMonth() >= d.getMonth());
				}
			}).dateTimePickerRange();
			
			$('select', form).styleSelect({
				class_wrap: 'ul-dropdown-wrap',
			});
		
			var groups = $('.group', form).filter(function(){
				return !$(this).hasClass('submit');
			}).click(function(){
				$(groups).removeClass('active');
				$(this).addClass('active');
			});
			$('#name').trigger('click').trigger('focus');
		});
    </script>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>