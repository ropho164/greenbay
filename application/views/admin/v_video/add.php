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
            <div id="iTitle">Thêm video</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_video/proaddata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Tên video<sup>*</sup></td>
                <td align="left">
                  <input name="title_video" value="<?php echo set_value('title_video'); ?>" type="text" id="title_video" style="width:680px;resize:none" placeholder="Tên video" ></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('title_video'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                  Mô tả<sup>*</sup></td>
                <td>
                <textarea name="poster_video" rows="8" id="poster_video" style="width:680px;" placeholder="Mô tả cho video"><?php echo set_value('poster_video'); ?></textarea>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('poster_video'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Link Youtube<sup>*</sup></td>
                <td align="left">
                <textarea name="file_video" rows="8" id="file_video" style="width:680px;" placeholder="https://www.youtube.com/watch?v=..."><?php echo set_value('file_video'); ?></textarea>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('file_video'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Thứ tự</td>
                <td><input name="order_video" type="text" id="order_video" style="width:50px;resize:none" value="<?=$count+1?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('order_video'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Trạng thái</td>
                <td><input name="active_video" type="checkbox" id="active_video" value="1" <?php echo set_checkbox('active_video', '1'); ?>/><input type="hidden" id="is_home" value="0" name="is_home"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Ngày</td>
                <td><input type="text" id="date_video" name="date_video" readonly></td>
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
<script type="text/javascript">
    $(document).ready(function () {
		$("#date_video").datepicker({dateFormat: 'yy-mm-dd'}).datepicker('setDate', new Date());
       	bkLib.onDomLoaded(function() {
			var edt = new nicEditor({
				buttonList :['bold','italic','underline','left','center','right','justify','ol','ul','forecolor','bgcolor'],
				maxHeight : 300,
				iconsPath : '<?php echo base_url();?>templates/js/nicEditorIcons.gif'});
			edt.panelInstance('poster_video');
		});
    });
</script>
<?php $this->load->view('admin/footer');?>