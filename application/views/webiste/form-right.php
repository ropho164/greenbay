<div class="panle_form">
	<div style="float: left;width: 20px;">
	  <!-- Nav tabs -->
	  <ul class="tabs-left vertical-text">
		<li><a class="bg_radient_green_tab active" href="#reser-form" data-toggle="tab"><?php echo $this->lang->line('text_reservation_tab');?></a></li>
		<li><a class="bg_radient_green_tab" href="#contact-form" data-toggle="tab"><?php echo $this->lang->line('text_contact_tab');?></a></li>
	  </ul>
	</div>
	<div style="float: left;width: 340px;padding: 10px 30px 10px 40px;">
	  <!-- Tab panes -->
	  <div class="tab-content">
		 <div class="tab-pane active" id="reser-form">
		  <form method="post" action="<?=base_url().$this->lang->line('key')?>/accommodation/list">
			  <div class="form-group clearfix" style="padding-top: 15px;padding-left: 5px;padding-right: 5px">
				<label class="lable_font" for="datetimepickerStartRight"><?php echo $this->lang->line('frm_res_from');?></label>
				 <input type="text" class="form-control input-sm icon_calendar input-no-radius" name="txtFrom" id="datetimepickerStartRight" placeholder="yyyy/mm/dd"/>
			  </div>
			  <div class="form-group clearfix" style="padding-top: 15px;padding-left: 5px;padding-right: 5px">
				<label class="lable_font" for="datetimepickerEndRight"><?php echo $this->lang->line('frm_res_to');?></label>
				 <input type='text' class="form-control input-sm input-no-radius icon_calendar" name="txtTo" id="datetimepickerEndRight" placeholder="yyyy/mm/dd"/>
			  </div>
			  <div class="form-group clearfix" style="padding-top: 15px">
				<div class="col-xs-4 mg0 pd0" style="padding-left: 5px;padding-right: 5px">
					<label class="lable_font" for="ADULT"><?php echo $this->lang->line('frm_res_peple');?></label>
					<select id="ADULTRIGHT" name="ADULT" class="form-control input-sm input-no-radius">
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					  <option value="6">6</option>
					  <option value="7">7</option>
					  <option value="9">8</option>
					  <option value="9">9</option>
					  <option value="10">10</option>
					</select>	
				</div>
				<div class="col-xs-4 mg0 pd0" style="padding-left: 5px;padding-right: 5px">
					<label class="lable_font" for="CHILD"><?php echo $this->lang->line('frm_res_child');?></label>
					<select name="CHILD" class="form-control input-sm input-no-radius">
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					  <option value="6">6</option>
					  <option value="7">7</option>
					  <option value="9">8</option>
					  <option value="9">9</option>
					  <option value="10">10</option>
					</select>
				</div>
				<div class="col-xs-4 mg0 pd0" style="padding-left: 5px;padding-right: 5px">
					<label class="lable_font" for="ROOMS"><?php echo $this->lang->line('frm_res_rooms');?></label>
					<select name="TROOMS" class="form-control input-sm input-no-radius">
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
					  <option value="4">4</option>
					  <option value="5">5</option>
					  <option value="6">6</option>
					  <option value="7">7</option>
					  <option value="9">8</option>
					  <option value="9">9</option>
					  <option value="10">10</option>
					</select>
				</div>
			  </div>
			  <div class="form-group">
				  <div class="col-xs-12 text-center clearfix" style="padding-top: 15px">
					<button type="submit" class="btn btn-default btn-sm bg_btn_checking input-no-radius"><?php echo $this->lang->line('frm_res_btn_send');?></button>
				  </div>
			  </div>
			</form>
		 </div>
		<div class="tab-pane" id="contact-form">
		  <form id="form-contact-right">
			  <div class="form-group">
				<label class="lable_font" for="fullname"><?php echo $this->lang->line('frm_contact_fullname');?></label>
				 <input type="text" class="form-control input-sm input-no-radius" name="cus_name_contact" placeholder="<?php echo $this->lang->line('frm_contact_fullname_holder');?>"/>
			  </div>
			  <div class="form-group">
				<label class="lable_font" for="cemail"><?php echo $this->lang->line('frm_contact_email');?></label>
				 <input type="text" class="form-control input-sm input-no-radius" name="cus_email_contact" placeholder="<?php echo $this->lang->line('frm_contact_email_holder');?>"/>
			  </div>
			  <div class="form-group">
				<label class="lable_font" for="cmessage"><?php echo $this->lang->line('frm_contact_message');?></label>
				 <textarea class="form-control input-no-radius" rows="3" name="cus_cont_contact" placeholder="<?php echo $this->lang->line('frm_contact_message_holder');?>"  style="resize: none"></textarea>
			  </div>
			  <div class="form-group text-center">
				  <button id="send-contact-right" type="button" class="btn btn-default btn-sm bg_btn_sending"><?php echo $this->lang->line('frm_contact_btn_send');?></button>
			  </div>
			</form>
			<div class="font_bold_std alert_success_contact_right"></div>
		  </div>
	  </div>
	</div>
</div>