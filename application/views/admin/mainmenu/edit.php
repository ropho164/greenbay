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
            <div id="iTitle">Cập nhật danh mục chính</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/main_menu/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Danh mục tiếng Anh<sup>*</sup></td>
                <td align="left">
                  <input name="category_name_en" type="text" id="category_name_en" value="<?=$results_data_edit[0]['category_name_en']?>" style="width:350px;resize:none" placeholder="Nhập vào Tên Danh Mục Tiếng Anh" ></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('category_name_en'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Danh mục tiếng Việt<sup>*</sup></td>
                <td align="left">
                  <input name="category_name_vn" type="text" id="category_name_vn" value="<?=$results_data_edit[0]['category_name_vn']?>" style="width:350px;resize:none" placeholder="Nhập vào Tên Danh Mục Tiếng Việt" ></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('category_name_vn'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Thứ tự<sup>*</sup></td>
                <td><input name="category_order" type="text" id="category_order" placeholder="Thứ tự menu" style="width:50px;resize:none" value="<?=$results_data_edit[0]['category_order']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('category_order'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề  (SEO - EN)<sup>*</sup></td>
                <td align="left"><input type="text" name="seo_title_en" id="seo_title_en" style="width:600px;resize:none" placeholder="Tiêu đề (SEO - EN)" value="<?=$results_data_edit[0]['seo_title_en']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('seo_title_en'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề  (SEO - VN)<sup>*</sup></td>
                <td align="left"><input type="text" name="seo_title_vn" id="seo_title_vn" style="width:600px;resize:none" placeholder="Tiêu đề (SEO - VN)" value="<?=$results_data_edit[0]['seo_title_vn']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('seo_title_vn'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Keywords (SEO - EN)<sup>*</sup></td>
                <td>
                  <textarea name="seo_key_en" id="seo_key_en" style="width:600px;height:60px" placeholder="Keywords EN"><?=$results_data_edit[0]['seo_key_en']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('seo_key_en'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Keywords (SEO - VN)<sup>*</sup></td>
                <td>
                  <textarea name="seo_key_vn" id="seo_key_vn" style="width:600px;height:60px" placeholder="Keywords VN"><?=$results_data_edit[0]['seo_key_vn']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('seo_key_vn'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Description (SEO - EN)<sup>*</sup></td>
                <td><textarea name="seo_des_en" id="seo_des_en" style="width:600px;height:60px"  placeholder="Description EN"><?=$results_data_edit[0]['seo_des_en']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('seo_des_en'); ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Description (SEO - VN)<sup>*</sup></td>
                <td><textarea name="seo_des_vn" id="seo_des_vn" style="width:600px;height:60px"  placeholder="Description VN"><?=$results_data_edit[0]['seo_des_vn']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('seo_des_vn'); ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Trạng thái</td>
                <td align="left"><input type="checkbox" name="status" id="status" value="1" <?php if($results_data_edit[0]['status']==1){?> checked="checked" <?php } ?>></td>
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
					if($b_Check_Ins==1){
						echo "Insert data succes.";
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