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
            <div id="iTitle">Cập nhật tài khoản quản lý</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/account_system/proeditata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Email<sup>*</sup></td>
                <td align="left"><input name="uemail" type="text" id="uemail" style="width:350px;resize:none" value="<?=$results_data_edit[0]['uemail']?>" readonly="readonly"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('uemail'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Mật khẩu<sup>*</sup></td>
                <td align="left"><input name="upassword" type="password" id="upassword" style="width:350px;resize:none"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('upassword'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Xác nhận mật khẩu<sup>*</sup></td>
                <td align="left"><input name="re_upassword" type="password" id="re_upassword" style="width:350px;resize:none"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('re_upassword'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Họ &amp; Tên<sup>*</sup></td>
                <td align="left"><input name="ufname" type="text" id="ufname" style="width:350px;resize:none" value="<?=$results_data_edit[0]['ufname']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('ufname'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Số điện thoại<sup>*</sup></td>
                <td align="left"><input name="uphone" type="text" id="uphone" style="width:350px;resize:none" value="<?=$results_data_edit[0]['uphone']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('uphone'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Vai trò</td>
                <td align="left">                
                <?php
                if($results_roles && sizeof($results_roles)>0){
				?>
                <select name="role_id" id="role_id" style="width:350px;resize:none">
                  <?php foreach($results_roles as $obj){ ?>
                  	<option value="<?=$obj['id']?>" <?php if($results_data_edit[0]['role_id']==$obj['id']){?> selected="selected" <?php }?>><?=$obj['role_name']?></option>
                  <?php } ?>
                </select>
                <?php } ?>
                
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Trạng thái</td>
                <td align="left"><input type="checkbox" name="uactive" id="uactive" value="1" <?php if($results_data_edit[0]['uactive']==1){?> checked="checked"<?php }?>></td>
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
						echo "<span class='success'>Cập nhật dữ liệu thành công.</span>";
					}
					if($b_Check_Ins<=0){
						echo "<span class='errorValidate' style='font-size:12pt'>Có lỗi xảy ra trong quá trình cập nhật dữ liệu.</span>";
					}
				}
				?></div>
                </td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2"><span style="font-style:italic;font-size:13pt;color:#F00">
                Nếu bạn muốn thay đổi mật khẩu hãy nhập vào mật khẩu mới ( để trống thì sử dụng lại mật khẩu cũ ).
                </span></td>
              </tr>
            </table>
            </form>
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php $this->load->view('admin/footer');?>