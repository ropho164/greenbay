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
            <div id="iTitle">Cập nhật bài viết</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/abouts/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /><input type="hidden" name="article_intro_type" id="article_intro_type" value="<?=$results_data_edit[0]['article_intro_type']?>" /><input type="hidden" name="article_parent" id="article_parent" value="<?=$results_data_edit[0]['article_parent']?>" /></td>
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
                <td align="left"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề  (1)<sup>*</sup></td>
                <td align="left"><input type="text" name="article_title_1" id="article_title_1" style="width:680px;resize:none" placeholder="Tiêu đề (1)" value="<?=$results_data_edit[0]['article_title_1']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('article_title_1'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề (2)<sup>*</sup></td>
                <td align="left"><input type="text" name="article_title" id="article_title" style="width:680px;resize:none" placeholder="Tiêu đề (2)" value="<?=$results_data_edit[0]['article_title']?>"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left">
                  <div class="errorValidate"><?php echo form_error('article_title'); ?></div>  
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">Giới thiệu<sup>*</sup></td>
                <td align="left">
                  <textarea name="article_desc" rows="8" id="article_desc" style="width:680px;resize:none" placeholder="Enter description"><?=$results_data_edit[0]['article_desc']?></textarea>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_desc'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_desc'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề mô tả<sup>*</sup></td>
                <td align="left"><input type="text" value="<?=$results_data_edit[0]['article_title_content_1']?>" name="article_title_content_1" id="article_title_content_1" style="width:680px;resize:none" placeholder="Tiêu đề mô tả"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left">
					<div class="errorValidate"><?php echo form_error('article_title_content_1'); ?></div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Nội dung mô tả<sup>*</sup></td>
                <td align="left">
                	<textarea name="article_content_1" rows="5" id="article_content_1" style="width:680px;resize:none" placeholder="Nội dung mô tả"><?=$results_data_edit[0]['article_content_1']?></textarea>
                </td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left">
					<div class="errorValidate"><?php echo form_error('article_content_1'); ?></div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Hình 1<sup>*</sup><br />
                  (Size: 1600px x 706px)
                  </td>
                <td align="left">
                  <div class="row" style="z-index: 0">
                    <div class="col-xs-6">
                      <div class="input-group">
                        <input name="article_picture_1" id="article_picture_1" type="text" class="form-control input-sm" placeholder="Vui lòng chọn ảnh" readonly value="<?=$results_data_edit[0]['article_picture_1']?>">
                        <span class="input-group-btn">
                          <button id="elfinder_button" data-width="1600" data-height="706" class="btn btn-sm" type="button">Files...</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">
                <div class="errorValidate"><?php echo form_error('article_picture_1'); ?></div>					
             	</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div id = "selectedImages"></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Thứ tự<sup>*</sup></td>
                <td align="left"><input name="article_order" type="text" id="article_order" style="width:50px;resize:none;text-align: center" value="<?=$results_data_edit[0]['article_order']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('article_order'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Ngày cập nhật&nbsp;</td>
                <td align="left"><input type="text" id="article_post_date" name="article_post_date" readonly value="<?=$results_data_edit[0]['article_post_date']?>"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Trạng thái</td>
                <td align="left"><input type="checkbox" name="article_status" id="article_status" value="1" <?php if($results_data_edit[0]['article_status']==1){?> checked="checked" <?php } ?>></td>
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
                <td>&nbsp;</td>
                <td>&nbsp;</td>
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
		$("#article_post_date").datepicker({dateFormat: 'yy-mm-dd'});
		$('#elfinder_button').live('click', function() {
			var sizeW = $(this).attr("data-width");
			var sizeH = $(this).attr("data-height");
		  $('<div id="editor" />').dialogelfinder({
			url : '<?=base_url()?>get_image/files',
			width: '70%',
			height: '500px',
			resizable: false,
			multiple: true,
			uiOptions: {
				toolbar : [
					// toolbar configuration
					['home'],
					['reload'],
					['upload'],
					['download'],
					['view'],
					['search']
				]
			},
			contextmenu : {
				files  : [
					'getfile', '|','open', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
					'rm', '|', 'edit', 'rename', '|', 'info'
				]
			},
			getFileCallback: function(file) {
				$('#selectedImages').empty();	
				var fileUrlSite = (file.path).replace(/\\/g, "\/")
				if(sizeW == file.width && sizeH == file.height){
					$("#article_picture_1").val(fileUrlSite);
			  		var imgPath = "<img src = '<?=base_url()?>"+fileUrlSite+"' style='width:100px'/>";
			  		$('#selectedImages').append(imgPath);
				}
				else{
					$("#article_picture_1").val("");
					var dms ="<span class='errorValidate'>Ảnh chọn có kích thước: <strong>("+file.width+"px x "+file.height+"px)</strong> không đúng qui định</span>";
					$('#selectedImages').append(dms);
					
				}
				console.log(file);
			  $('#editor').remove();
			}
		  });
		});
		if($("#article_picture_1").val()!=""){
			var imgPath = "<img src = '<?=base_url()?>"+$("#article_picture_1").val()+"' style='width:100px'/>";
			$('#selectedImages').append(imgPath);
		}
    }); 
</script>
<?php $this->load->view('admin/footer');?>