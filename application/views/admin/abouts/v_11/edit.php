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
                <td valign="top" nowrap="nowrap">Tiêu đề nội dung<sup>*</sup></td>
                <td align="left"><input type="text" value="<?=$results_data_edit[0]['article_desc']?>" name="article_desc" id="article_desc" style="width:680px;resize:none" placeholder="Tiêu đề nội dung"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_desc'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Nội dung<sup>*</sup></td>
                <td align="left"><textarea name="article_content" rows="8" id="article_content" style="width:680px;resize:none" placeholder="Nội dung"><?=$results_data_edit[0]['article_content']?></textarea>
                  <?php echo display_ckeditor($ckeditor); ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_content'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Hình<sup>*</sup></td>
                <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><?php echo form_upload('userfile1','','id="userfile1"'); ?></td>
                    <td valign="top"><input name="alert_article_picture_1" type="text" id="alert_article_picture_1" readonly style="display:none" />
                      <input type="hidden" name="article_picture_1" id="article_picture_1" value="<?=$results_data_edit[0]['article_picture_1']?>" />
                      (Size: 800px x 356px)</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div id="completeUpload"><a href="<?php echo base_url().'uploads/'.$results_data_edit[0]['article_picture_1']?>" target="_blank"><img src="<?php echo base_url().'uploads/'.$results_data_edit[0]['article_picture_1']?>" height="100"/></a></div><br/><span class="errorValidate"><?php echo form_error('article_picture_1'); ?></span></td>
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
		var numPhoto = 0;
		$("#article_post_date").datepicker({dateFormat: 'yy-mm-dd'});
		$('#userfile1').uploadify({
            'debug':false,
            'auto':true,
			'queueSizeLimit' : 5,
			'uploadLimit' : 5,
            'swf':'<?php echo base_url(); ?>uploadify/uploadify.swf',
            'uploader':'<?php echo base_url(); ?>admin/uploadify/do_upload_abouts_800x356',
            'cancelImg':'<?php echo base_url(); ?>uploadify/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.tif',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.tif)',
            'fileSizeLimit':'10MB',
            'fileObjName':'userfile',
            'buttonText':'Select Photo(s)',
            'multi':false,
            'removeCompleted':true,
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                $("#completeUpload").empty();
				$("#completeUpload").hide("fast");
				$("#alert_article_picture_1").val("Upload error");
				$("#alert_article_picture_1").show("fast");
            },
			'onUploadSuccess' : function(file, data, response) {
				data = JSON.parse(data)
				$("#completeUpload").empty();
				$("#completeUpload").append('<a href="<?php echo base_url().'uploads/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/'?>'+data.file_name+'" width="100"/></a>')
				$("#completeUpload").show("fast");
				$("#article_picture_1").val(data.file_name);
				$("#alert_article_picture_1").val("Upload success");
				$("#alert_article_picture_1").show("fast");
			}
        });
    }); 
</script>
<?php $this->load->view('admin/footer');?>