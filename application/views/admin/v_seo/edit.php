<?php $this->load->view('admin/header');?>
<?php
//echo "<pre>";
//print_r($results_data_edit);
//echo "</pre>";
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
            <div id="iTitle">Cập - Title - Keyword - Description</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_seo/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Title Page<sup>*</sup></td>
                <td align="left">
                  <input name="seo_title" value="<?=$results_data_edit[0]['seo_title']?>" type="text" id="seo_title" style="width:550px;resize:none" placeholder="Title page" ></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('seo_title'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề  (SEO)<sup>*</sup></td>
                <td align="left"><input type="text" name="seo_title_page" id="seo_title_page" style="width:600px;resize:none" placeholder="Tiêu đề (SEO)" value="<?=$results_data_edit[0]['seo_title_page']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('seo_title_page'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>SEO Keywords<sup>*</sup></td>
                <td><label for="seo_key"></label>
                  <textarea name="seo_key" id="seo_key" style="width:600px;height:60px"><?=$results_data_edit[0]['seo_key']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('seo_key'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>SEO Description<sup>*</sup></td>
                <td><textarea name="seo_des" id="seo_des" style="width:600px;height:60px"><?=$results_data_edit[0]['seo_des']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('seo_des'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Trạng thái</td>
                <td><input name="b_active" type="checkbox" id="b_active" value="1"  <?php if($results_data_edit[0]['b_active']==1){?> checked="checked" <?php } ?>/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Trang hiển thị</td>
                <td><table width="100%" border="0">
                  <tr>
                    <td width="100" align="left" valign="middle"><strong><em>Trang chủ</em></strong></td>
                    <td width="200" align="left" valign="middle"><input name="is_trangchu" type="checkbox" id="is_trangchu" value="1" <?php if($results_data_edit[0]['is_trangchu']==1){?> checked="checked" <?php } ?>/></td>
                    <td width="100" align="left" valign="middle"><em><strong>Chuyên đề</strong></em></td>
                    <td align="left" valign="middle"><input name="is_chuyende" type="checkbox" id="is_chuyende" value="1" <?php if($results_data_edit[0]['is_chuyende']==1){?> checked="checked" <?php } ?>/></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>Thương hiệu</strong></em></td>
                    <td align="left" valign="middle"><input name="is_thuonghieu" type="checkbox" id="is_thuonghieu" value="1" <?php if($results_data_edit[0]['is_thuonghieu']==1){?> checked="checked" <?php } ?>/></td>
                    <td align="left" valign="middle"><em><strong>Tin tức</strong></em></td>
                    <td align="left" valign="middle"><input name="is_tintuc" type="checkbox" id="is_tintuc" value="1" <?php if($results_data_edit[0]['is_tintuc']==1){?> checked="checked" <?php } ?>/></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>Sản phẩm</strong></em></td>
                    <td align="left" valign="middle"><input name="is_sanpham" type="checkbox" id="is_sanpham" value="1" <?php if($results_data_edit[0]['is_sanpham']==1){?> checked="checked" <?php } ?>/></td>
                    <td align="left" valign="middle"><em><strong>Mua ở đâu</strong></em></td>
                    <td align="left" valign="middle"><input name="is_muaodau" type="checkbox" id="is_muaodau" value="1" <?php if($results_data_edit[0]['is_muaodau']==1){?> checked="checked" <?php } ?>/></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>Hỗ trợ</strong></em></td>
                    <td align="left" valign="middle"><input name="is_hotro" type="checkbox" id="is_hotro" value="1" <?php if($results_data_edit[0]['is_hotro']==1){?> checked="checked" <?php } ?>/></td>
                    <td align="left" valign="middle"><em><strong>Liên hệ</strong></em></td>
                    <td align="left" valign="middle"><input name="is_lienhe" type="checkbox" id="is_lienhe" value="1" <?php if($results_data_edit[0]['is_lienhe']==1){?> checked="checked" <?php } ?>/></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>Khác</strong></em></td>
                    <td align="left" valign="middle"><input name="is_khac" type="checkbox" id="is_khac" value="1" <?php if($results_data_edit[0]['is_khac']==1){?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                    </tr>
                </table></td>
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
						echo "Cập nhật dữ liệu thành công.";
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