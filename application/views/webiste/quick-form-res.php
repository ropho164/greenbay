<div class="container-full-quick-form">
    <div class="frm_toogle_res">
        <form method="post" class="form-inline" action="<?=base_url().$this->lang->line('key')?>/reservation">
          <div class="form-group">
            <label class="lable_font" for="datetimepickerStart"><?php echo $this->lang->line('frm_res_from');?></label>
             <input type="text" class="form-control input-sm icon_calendar input-no-radius" name="datetimepickerStart" id="datetimepickerStart" placeholder="yyyy/mm/dd"/>
          </div>
          <div class="form-group">
            <label class="lable_font" for="datetimepickerEnd"><?php echo $this->lang->line('frm_res_to');?></label>
             <input type='text' class="form-control input-sm icon_calendar input-no-radius" name="datetimepickerEnd" id="datetimepickerEnd" placeholder="yyyy/mm/dd"/>
          </div>
          <div class="form-group">
            <label class="lable_font" for="ADULT"><?php echo $this->lang->line('frm_res_peple');?></label>
            <select name="ADULT" class="form-control input-sm input-no-radius">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="1">3</option>
              <option value="2">4</option>
              <option value="1">5</option>
              <option value="2">6</option>
              <option value="1">7</option>
              <option value="2">8</option>
              <option value="1">9</option>
              <option value="2">10</option>
            </select>
          </div>
          <div class="form-group">
            <label class="lable_font" for="CHILD"><?php echo $this->lang->line('frm_res_child');?></label>
            <select name="CHILD" class="form-control input-sm input-no-radius">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="1">3</option>
              <option value="2">4</option>
              <option value="1">5</option>
              <option value="2">6</option>
              <option value="1">7</option>
              <option value="2">8</option>
              <option value="1">9</option>
              <option value="2">10</option>
            </select>
          </div>
          <div class="form-group">
	          <button type="submit" class="btn btn-default btn-sm bg_btn_checking input-no-radius"><?php echo $this->lang->line('frm_res_btn_send');?></button>
          </div>
        </form>
    </div>
    <div class="frm_toogle_contact">
    	<form id="form-contact-top" class="form-inline">
          <div class="form-group">
            <label class="lable_font" for="cus_name_contact"><?php echo $this->lang->line('frm_contact_fullname');?></label>
             <input type="text" class="form-control input-sm input-no-radius" name="cus_name_contact" placeholder="<?php echo $this->lang->line('frm_contact_fullname_holder');?>"/>
          </div>
          <div class="form-group">
            <label class="lable_font" for="cus_email_contact"><?php echo $this->lang->line('frm_contact_email');?></label>
             <input type="text" class="form-control input-sm input-no-radius" name="cus_email_contact" placeholder="<?php echo $this->lang->line('frm_contact_email_holder');?>"/>
          </div>
          <div class="form-group">
            <label class="lable_font" for="cus_cont_contact"><?php echo $this->lang->line('frm_contact_message');?></label>
             <textarea class="form-control input-no-radius" rows="1" name="cus_cont_contact" placeholder="<?php echo $this->lang->line('frm_contact_message_holder');?>"></textarea>
          </div>
          <div class="form-group">
	          <button id="send-contact-top" type="button" class="btn btn-default btn-sm bg_btn_sending"><?php echo $this->lang->line('frm_contact_btn_send');?></button>
          </div>
        </form>
         <div class="font_bold_std alert_success_contact"></div>
     </div>
</div>