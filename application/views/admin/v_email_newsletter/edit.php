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
            <div id="iTitle">Cập nhật email</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_email_newsletter/proeditata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Email<sup>*</sup></td>
                <td align="left"><input type="text" name="cus_email" id="cus_email" style="width:350px;resize:none" placeholder="Nhập vào email" value="<?php echo $results_data_edit[0]['cus_email']; ?>"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('cus_email'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Đã gửi email</td>
                <td>
                  <input type="checkbox" name="cus_send" id="cus_send" value="1"  <?php if($results_data_edit[0]['cus_send']==1){?> checked="checked" <?php } ?>>
                  </td>
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
					else{
						echo "<span class='errorValidate' style='font-size:12pt'>Có lỗi xảy ra trong quá trình cập nhật dữ liệu.</span>";
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