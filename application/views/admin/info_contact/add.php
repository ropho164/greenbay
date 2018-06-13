<?php $this->load->view('admin/header');?>
<?php 
$langue = ($this->uri->segment($this->config->item('idgroup'))) ? $this->uri->segment($this->config->item('idgroup')) : 'vn';
?>
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
            <div id="iTitle">Thông tin liên hệ website</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_infocontact/proaddata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Ngôn ngữ<sup>*</sup></td>
                <td align="left"><select name="article_langue" id="article_langue" style="width:360px;resize:none">
                  	<option value="en" <?php if($langue=='en'){?> selected="selected" <?php } ?>>Tiếng Anh</option>
                    <option value="vn" <?php if($langue=='vn'){?> selected="selected" <?php } ?>>Tiếng Việt</option>
                </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Green Bay<sup>*</sup></td>
                <td align="left"><input name="info_title" type="text" id="info_title" placeholder="Tiêu đề về Amarin Resort" style="width:690px;resize:none" value="<?php echo set_value('info_title'); ?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('info_title'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Nội dung<sup>*</sup></td>
                <td align="left"><textarea name="info_content" rows="5" id="info_content" style="width:700px;resize:none" placeholder="Thông tin về Amarin Resort"><?php echo html_entity_decode(set_value('info_content')); ?></textarea><?php echo display_ckeditor($ckeditor); ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('info_content'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Văn phòng đại diện<sup>*</sup></td>
                <td align="left"><input name="info_title_office" type="text" id="info_title_office" placeholder="Tiêu đề cho văn phòng đại diện" style="width:690px;resize:none" value="<?php echo set_value('info_title_office'); ?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('info_title_office'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Nội dung VPĐD<sup>*</sup></td>
                <td align="left"><textarea name="info_content_office" rows="5" id="info_content_office" style="width:700px;resize:none" placeholder="Thông tin văn phòng đại diện"><?php echo html_entity_decode(set_value('info_content_office')); ?></textarea>
                  <?php echo display_ckeditor($ckeditor1); ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('info_content_office'); ?></span></td>
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