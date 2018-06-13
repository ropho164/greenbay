<div class="container-full">
	<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1360px;height:680px;overflow:hidden;visibility:hidden;">
		<!-- Loading Screen -->
		<div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
			<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
			<div style="position:absolute;display:block;background:url('<?=base_url()?>templates/website/images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
		</div>
		<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1360px;height:680px;overflow:hidden;">
			<?php
			if($results_banner && sizeof($results_banner)>0){
				foreach($results_banner as $obj){?>						
						<div>
							<img data-u="image" src="<?php echo base_url().'uploads/banner/'.$obj['banner_photo'];?>" />
						</div>
					<?php 
				}	
			}
			?>
		</div>
		<!-- Arrow Navigator -->
		<span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
		<span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
		<!-- Bullet Navigator -->
		<div data-u="navigator" class="jssorb21 jssorb21_position_bome">
			<div data-u="prototype"></div>
		</div>
	</div>
	<script language="javascript">
	jssor_1_slider_init = function() {
		var _SlideshowTransitions = [<?=$results_banner[0]['b_affect']?>];
		var jssor_1_options = {
		  $AutoPlay: true,
		  $Idle: 2000,
		  $ArrowNavigatorOptions: {
			$Class: $JssorArrowNavigator$
		  },
		  $BulletNavigatorOptions: {
			$Class: $JssorBulletNavigator$
		  },
		  $SlideshowOptions: {
			$Class: $JssorSlideshowRunner$,
			$Transitions: _SlideshowTransitions,
			$TransitionsOrder: 1,
			$ShowLink: false
		 }
		};

		var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

		/*responsive code begin*/
		function ScaleSlider() {
			var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
			if (refSize) {
				refSize = Math.min(refSize, 1920);
				jssor_1_slider.$ScaleWidth(refSize);
			}
			else {
				window.setTimeout(ScaleSlider, 30);
			}
		}
		ScaleSlider();
		$(window).bind("load", ScaleSlider);
		$(window).bind("resize", ScaleSlider);
		$(window).bind("orientationchange", ScaleSlider);
		/*responsive code end*/
	};
	</script>
	<!--
	<div class="quick_menu_contain">
		<div class="col-xs-6 mg0 pd0">
			<div class="quick_menu_resv res_active" data-active="1"><?php echo $this->lang->line('text_reservation_tab');?></div>
		</div>
		<div class="col-xs-6 mg0 pd0">
			<div class="quick_menu_contact" data-active="0"><?php echo $this->lang->line('text_contact_tab');?></div>
		 </div>
	</div>
	-->
	<div class="bound_weather">
		<form method="post" action="<?=base_url().$this->lang->line('key')?>/accommodation/list">
		<div class="col-xs-12 mg0 pd0 demo" style="padding-right: 5px;padding-left: 5px">
			<div id="reservation" class="clearfix">
				<div class="col-xs-6 mg0 pd0">
					<input type="text" class="form-control input-sm icon_calendar input-no-radius" name="txtFrom" id="txtFrom" readonly placeholder="Check in"/>
				</div>
				<div class="col-xs-6 mg0 pd0">
					<input type="text" class="form-control input-sm icon_calendar input-no-radius" name="txtTo" id="txtTo" readonly placeholder="Check out"/>
				</div>
			</div>
		</div>
		<div class="col-xs-12 mg0 pd0 demo" style="padding-right: 5px;padding-left: 5px">
				<div id="accordion">
					<div class="panel panel-default" style="margin-bottom: 10px !important">
						  <div class="panel-heading clearfix" role="tab"  style="border-radius: 0;position: relative;">
							<h3 class="panel-title font_bold_std show_tab_title">1 Rooms, 1 Adult, 0 Child</h3>
							<div class="pull-right showtab" data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="background-color: #0f9f4a"><i class="glyphicon glyphicon-plus" style="color: #FFF;font-size: 8pt"></i></div>
						  </div>
					</div>
					<div id="collapse1" class="panel-collapse collapse clearfix">
						<div class="font_std_md showtab_count clearfix">
							<div class="col-xs-6 pd0 demo pull-left"><h6>Rooms</h6></div>
							<div class="col-xs-6 pull-right pd0 demo"><input class="spin_click" type="text" value="1" name="TROOMS" readonly></div>
						</div>
						<div class="font_std_md showtab_count clearfix">							
							<div class="col-xs-6 pd0 demo pull-left"><h6>Adult</h6></div>
							<div class="col-xs-6 pull-right pd0 demo"><input class="spin_click" type="text" value="1" name="ADULT" readonly></div>
						</div>
						<div class="font_std_md showtab_count clearfix">							
							<div class="col-xs-6 pd0 demo pull-left"><h6>Child</h6></div>
							<div class="col-xs-6 pull-right pd0 demo"><input class="spin_click"   type="text" value="0" name="CHILD" readonly></div>
						</div>
				  </div>
				</div>
		</div>		
		<div class="col-xs-12 mg0 pd0 demo" style="padding-right: 5px;padding-left: 5px">
			<button type="submit" class="btn bg_radient_green input-no-radius">
				<span class="font_bold_std txtt_trans_up">
					<?php echo $this->lang->line('frm_res_btn_send');?>
			    </span>
			</button>
		</div>
		</form>
		 <div class="remove_wearther"><img src="<?=base_url()?>templates/website/images/btn_close_weather.png"></div>
	</div>
</div>