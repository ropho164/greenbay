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
            <div id="iTitle">Thông tin đặt phòng</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_booking/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="middle"><strong>Thông tin đặt phòng</strong></td>
                <td align="left"><table width="100%" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><strong>Mã GD:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['trans_number']?>
                    </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Đã thanh&nbsp;toán</strong></td>
                    <td><strong><?=smarty_vnd($results_data_edit[0]['booking_prepayment'])?></strong></td>
                  </tr>
                  <tr>
                    <td width="150"><strong>Tên:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['fname']?>
                    </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Email:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['email']?>
                      </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Điện thoại:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['phone']?>
                    </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Ngày đến:</strong></td>
                    <td><strong style="color:rgba(255,1,5,1.00)">
                      <?=$results_data_edit[0]['date_from']?>
                      </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Ngày đi:</strong></td>
                    <td><strong style="color:rgba(255,1,5,1.00)">
                      <?=$results_data_edit[0]['date_to']?>
                      </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Loại phòng:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['room_name']?>
                      </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Số lượng</strong></td>
                    <td><strong><?=$results_data_edit[0]['room_number']?></strong></td>
                  </tr>
                  <tr>
                    <td><strong>Yêu cầu phòng:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['room_requirements']?>
                      </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Người lớn:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['adults']?>
                      </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Trẻ em:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['children']?>
                      </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Yêu cầu khác:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['special_requirements']?>
                      </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Ngày đặt phòng:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['date_booking']?>
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
                <td>Ghi chú</td>
                <td><textarea name="notes" rows="5" id="notes" style="width:700px;resize:none" placeholder="Ghi chú của quản lý"><?=$results_data_edit[0]['notes']?></textarea></td>
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
                  <input type="checkbox" name="booking_status" id="booking_status" value="1"  <?php if($results_data_edit[0]['booking_status']==1){?> checked="checked" <?php } ?>>
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