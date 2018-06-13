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
            <div id="iTitle">Thêm tài khoản quản lý</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/account_system/proaddata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Email<sup>*</sup></td>
                <td align="left"><input type="text" name="uemail" id="uemail" style="width:350px;resize:none" placeholder="Nhập vào email"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('uemail'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Mật khẩu<sup>*</sup></td>
                <td align="left"><input type="password" name="upassword" id="upassword" style="width:350px;resize:none"  placeholder="Nhập mật khẩu"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('upassword'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Xác nhận mật khẩu<sup>*</sup></td>
                <td align="left"><input type="password" name="re_upassword" id="re_upassword" style="width:350px;resize:none" placeholder="Xác nhận mật khẩu"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('re_upassword'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Họ &amp; Tên<sup>*</sup></td>
                <td align="left"><input type="text" name="ufname" id="ufname" style="width:350px;resize:none" placeholder="Nhập họ tên đầy đủ"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('ufname'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Số điện thoại<sup>*</sup></td>
                <td align="left"><input type="text" name="uphone" id="uphone" style="width:350px;resize:none" placeholder="Nhập vào số điện thoại liên hệ"/></td>
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
                  	<option value="<?=$obj['id']?>"><?=$obj['role_name']?></option>
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
                <td align="left"><input type="checkbox" name="uactive" id="uactive" value="1"></td>
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