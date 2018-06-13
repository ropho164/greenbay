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
            <div id="iTitle">Thông tin chi tiết liên hệ</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_contact/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="middle"><strong>Thông tin người liên hệ</strong></td>
                <td align="left"><table width="100%" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><strong>Tên:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['cus_name']?>
                    </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Email:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['cus_email']?>
                      </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Điện thoại:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['cus_phone']?>
                    </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Ngày gửi:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['cus_date']?>
                      </strong></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Nội dung</td>
                <td align="left"><textarea name="cus_cont" rows="5" id="cus_cont" style="width:700px;resize:none" placeholder="nội dung liên hệ"><?=$results_data_edit[0]['cus_cont']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('cus_cont'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Ghi chú</td>
                <td><textarea name="cus_note" rows="5" id="cus_note" style="width:700px;resize:none" placeholder="Ghi chú của quản lý"><?=$results_data_edit[0]['cus_note']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Xử lý xong</td>
                <td>
                  <input type="checkbox" name="cus_status" id="cus_status" value="1"  <?php if($results_data_edit[0]['cus_status']==1){?> checked="checked" <?php } ?>>
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
				<div><span class="success">
                <?php if(isset($b_Check) && $b_Check == true){
					echo $b_Check;
					if($b_Check_Ins==1){
						echo "Thêm dữ liệu thành công.";
					}
				}?></span></div>
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