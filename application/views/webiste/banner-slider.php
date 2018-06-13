<div class="container-full fix-no-banner">
		<div id="carouselloading" class="carousel slide carousel-fade-loading" data-ride="carousel">
			
			<?php if(isset($results_banner) && sizeof($results_banner)>0){
				echo '<div class="carousel-inner" role="listbox">';
				$cnt_main = 0;
				$clAct = "";
				foreach($results_banner as $obj){
					$clAct = "";
					$cnt_main++;
					if($cnt_main==1) $clAct = "active";					
					echo '<div class="item '.$clAct.'">';
						echo '<a href="'.$obj['banner_lnk'].'"><img src="'.base_url().'uploads/banner/'.$obj['banner_photo'].'" class="img-responsive center-block"></a>';
					echo '</div>';

				}
				echo '</div>';
				echo '<ol class="carousel-indicators">';
					for($i=0;$i<sizeof($results_banner);$i++){
						if($i==0){
							echo '<li data-target="#carouselloading" data-slide-to="0" class="active"></li>';
						}else{
							echo '<li data-target="#carouselloading" data-slide-to="'.$i.'"></li>';
						}
					}
				echo '</ol>';
				echo '<a class="left carousel-control" href="#carouselloading" data-slide="prev">';
					//echo '<span class="glyphicon glyphicon-chevron-left"></span>';
					echo '<img src="'.base_url().'templates/website/images/prev_co.png">';
					//echo '<span class="sr-only">Previous</span>';
				echo '</a>';
				echo '<a class="right carousel-control" href="#carouselloading" data-slide="next">';
					//echo '<span class="glyphicon glyphicon-chevron-right"></span>';
					echo '<img src="'.base_url().'templates/website/images/next_co.png">';
					//echo '<span class="sr-only">Next</span>';
				echo '</a>';
			}?>
		</div>
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
</div>
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