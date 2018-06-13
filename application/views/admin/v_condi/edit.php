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
            <div id="iTitle">Điều khoản - Cập nhật bài viết</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_condi/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Ngôn ngữ bài viết<sup>*</sup></td>
                <td align="left">
                  <select name="article_langue" id="article_langue" style="width:360px;resize:none">
                    <option value="en" <?php if($results_data_edit[0]['article_langue']=='en'){?> selected="selected" <?php }?>>Tiếng Anh</option>
                    <option value="vn" <?php if($results_data_edit[0]['article_langue']=='vn'){?> selected="selected" <?php }?>>Tiếng Việt</option>
                    </select>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Thuộc danh mục<sup>*</sup></td>
                <td align="left">
                  <select name="group_id" id="group_id" style="width:360px;resize:none">
                    <option value="1" <?php if($results_data_edit[0]['group_id']==1){?> selected="selected" <?php }?>>HOTEL POLICIES</option>
                    <option value="2" <?php if($results_data_edit[0]['group_id']==2){?> selected="selected" <?php }?>>PAYMENT AND CANCELLATION</option>
                    </select>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề  (SEO)<sup>*</sup></td>
                <td align="left"><input type="text" name="seo_title" id="seo_title" style="width:680px;resize:none" placeholder="Tiêu đề (SEO)" value="<?=$results_data_edit[0]['seo_title']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('seo_title'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Từ khóa (SEO)<sup>*</sup></td>
                <td align="left"><input type="text" name="trade_key" id="trade_key" style="width:680px;resize:none" value="<?=$results_data_edit[0]['trade_key']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('trade_key'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top">Mô tả (SEO)<sup>*</sup></td>
                <td align="left"><textarea name="trade_desc" rows="3" id="trade_desc" style="width:680px;resize:none"><?=$results_data_edit[0]['trade_desc']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('trade_desc'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề<sup>*</sup></td>
                <td align="left"><input type="text" name="trade_title" id="trade_title" style="width:680px;resize:none" value="<?=$results_data_edit[0]['trade_title']?>"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('trade_title'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Nội dung<sup>*</sup></td>
                <td align="left">
                    <div id="checkTextContent">
                        <textarea name="trade_content" id="trade_content" style="width:360px;resize:none"  placeholder="Nội dung"><?=$results_data_edit[0]['trade_content']?></textarea>
                        <?php echo display_ckeditor($ckeditor); ?>
                    </div>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('trade_content'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Ngày cập nhật<sup>*</sup></td>
                <td align="left"><input type="text" id="trade_date" name="trade_date" readonly value="<?=$results_data_edit[0]['trade_date']?>"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Trạng thái</td>
                <td align="left">
                <input type="checkbox" name="trade_active" id="trade_active" value="1" <?php if($results_data_edit[0]['trade_active']==1){?> checked="checked" <?php } ?>></td>
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
				<div id="result_upload">
				<?php 
				if(isset($b_Check) && $b_Check == true){
					if($b_Check_Ins==1){
						echo "<span class='success'>Thêm dữ liệu thành công.</span>";
					}
					if($b_Check_Ins==-1){
						echo "<span class='errorValidate' style='font-size:12pt'>Có lỗi xảy ra trong quá trình thêm dữ liệu.</span>";
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
<script type="text/javascript">
    $(document).ready(function () {
        $("#trade_date").datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>
<?php $this->load->view('admin/footer');?>