<?php $this->load->view('admin/header');?>
<table width="100%" border="0" cellpadding="0" cellspacing="1">  
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200" rowspan="2" align="center" valign="top" style="background:#333">
          <?php $this->load->view('admin/menu_left');?>          </td>
        <td align="center" valign="top" nowrap="nowrap"><div class="welcome"><?php $this->load->view('admin/login/check_login_view');?></div></td>
      </tr>
      <tr>
        <td valign="top">
          <div id="contentpage">            
            <div id="iTitle">Thêm email</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_email_sending/proaddata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Tên<sup>*</sup></td>
                <td align="left"><input type="text" name="smtp_name" id="smtp_name" style="width:350px;resize:none" placeholder="Tên tài khoản email" value="<?php echo set_value('smtp_name'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('smtp_name'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Email<sup>*</sup></td>
                <td align="left"><input type="text" name="smtp_user" id="smtp_user" style="width:350px;resize:none" placeholder="Nhập vào email" value="<?php echo set_value('smtp_user'); ?>"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('smtp_user'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Mật khẩu<sup>*</sup></td>
                <td align="left"><input type="text" name="smtp_pass" id="smtp_pass" style="width:350px;resize:none"  placeholder="Nhập mật khẩu" value="<?php echo set_value('smtp_pass'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('smtp_pass'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Host mail<sup>*</sup></td>
                <td align="left"><input type="text" name="smtp_host" id="smtp_host" style="width:350px;resize:none" placeholder="Ví dụ: mail.mediagurus.vn" value="<?php echo set_value('smtp_host'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('smtp_host'); ?></div></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Port send mail<sup>*</sup></td>
                <td align="left"><input name="smtp_port" type="text" id="smtp_port" placeholder="Mặc định là 25" style="width:350px;resize:none" value="25"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('smtp_port'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Active</td>
                <td><input name="is_send_news" type="checkbox" id="is_send_news" value="1" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Lưu dữ liệu" class="btn_save"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2">
				<div>
				<?php 
				if(isset($b_Check) && $b_Check == true){
					if($b_Check_Ins==1){
						echo "<span class='success'>Thêm dữ liệu thành công.</span>";
					}
					if($b_Check_Ins==-1){
						echo "<span class='errorValidate' style='font-size:12pt'>Email này đã có người sử dụng.</span>";
					}
				}
				?></div>
                </td>
                </tr>
            </table>
            </form>
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php $this->load->view('admin/footer');?>