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
            <div id="iTitle">Thêm bài viết</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/abouts/proaddata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><input type="hidden" name="article_intro_type" id="article_intro_type" value="<?=$types?>" /><input type="hidden" name="article_parent" id="article_parent" value="0" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Ngôn ngữ bài viết<sup>*</sup></td>
                <td align="left">
                	<select name="article_langue" id="article_langue" style="width:360px;resize:none">
                        <option value="en" <?php if($langue=='en'){?> selected="selected" <?php }?>>Tiếng Anh</option>
                        <option value="vn" <?php if($langue=='vn'){?> selected="selected" <?php }?>>Tiếng Việt</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề  (1)<sup>*</sup></td>
                <td align="left"><input type="text" name="article_title_1" id="article_title_1" style="width:680px;resize:none" placeholder="Tiêu đề (1)" value="<?php echo set_value('article_title_1'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('article_title_1'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề  (2)<sup>*</sup></td>
                <td align="left"><input type="text" value="<?php echo set_value('article_title'); ?>" name="article_title" id="article_title" style="width:680px;resize:none" placeholder="Tiêu đề (2)"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left">
					<div class="errorValidate"><?php echo form_error('article_title'); ?></div>
					<div id="result_upload"></div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">Giới thiệu<sup>*</sup></td>
                <td align="left">
                <textarea name="article_desc" rows="8" id="article_desc" style="width:680px;resize:none" placeholder="Mô tả"><?php echo set_value('article_desc'); ?></textarea>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_desc'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Nội dung<sup>*</sup></td>
                <td align="left">
					<textarea name="article_content" rows="8" id="article_content" style="width:680px;resize:none" placeholder="Nội dung"><?php echo set_value('article_content'); ?></textarea>
            		<?php echo display_ckeditor($ckeditor); ?>
             	</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_content'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Hình 1<sup>*</sup><br />
                  (Size: 1600px x 706px)
                  </td>
                <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><?php echo form_upload('userfile1','','id="userfile1"'); ?></td>
                    <td valign="top"><input name="alert_article_picture_1" type="text" id="alert_article_picture_1" readonly style="display:none" />
                      <span class="errorValidate"><?php echo form_error('article_picture_1'); ?></span>
                      <input type="hidden" name="article_picture_1" id="article_picture_1" value="<?php echo set_value('article_picture_1'); ?>" />
                      </td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div id="completeUpload"></div><br/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Hình 2<sup>*</sup><br />
                  (Size: 550px x 700px) </td>
                <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><?php echo form_upload('userfile2','','id="userfile2"'); ?></td>
                    <td valign="top"><input name="alert_article_picture_2" type="text" id="alert_article_picture_2" readonly style="display:none" />
                      <span class="errorValidate"><?php echo form_error('article_picture_1'); ?></span>
                      <input type="hidden" name="article_picture_2" id="article_picture_2" value="<?php echo set_value('article_picture_2'); ?>" /></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div id="completeUpload2"></div>
                  <br/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top">Ảnh minh họa<br />
                  (Size: 180px x 180px) </td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><?php echo form_upload('userfile3','','id="userfile3"'); ?></td>
                    <td valign="middle"><input name="alert_product_photo_slide" type="text" id="alert_product_photo_slide" readonly style="display:none" />
                      (Tối đa 3 ảnh)&nbsp;&nbsp;<span id="slide_err" class="errorValidate"></span></td>
                  </tr>
                  <tr>
                    <td colspan="2"><div id="listPhoto" style="clear:both;text-align:left;position:relative">
                    <?php
                    if(count($list_photo) > 0){
							for($i=0;$i<count($list_photo);$i++)
							{
								echo '<div class="photo_action_current_'.$i.'" style="position:relative;float:left;margin-right:5px">';
								echo '<input class="photo_action_current_'.$i.'" name="slidephoto[]" id="slidephoto[]" type="hidden" value="'.$list_photo[$i].'" />';
								echo '<a href="'.base_url().'uploads/'.$list_photo[$i].'" target="_blank"><img src="'.base_url().'uploads/'.$list_photo[$i].'" style="width:100px;height:100px"/></a><br/><input id="slidephotoorder[]" name="slidephotoorder[]"  type="text" style="width:85px;text-align:center" value="'.($i+1).'" />';
								echo '<div class="photo_action_current_'.$i.'" style="position:absolute;top:0;right:0;width:20px;height:auto"><a class="delact_current" href="javascript:void(0)"><img src="'.base_url().'templates/admin/images/b_del_icon.png" width="20" height="20" border="0"/></a></div>';
								echo '</div>';
							}
						}
					?>
                    </div></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><div id="link_product_photo_slide"></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Thứ tự<sup>*</sup></td>
                <td align="left"><input name="article_order" type="text" id="article_order" style="width:50px;resize:none" value="<?=$count+1?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('article_order'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Ngày cập nhật&nbsp;</td>
                <td align="left"><input type="text" id="article_post_date" name="article_post_date" readonly></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Trạng thái</td>
                <td align="left"><input type="checkbox" name="article_status" id="article_status" value="1"  <?php echo set_checkbox('article_status', '1'); ?> ></td>
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
		$("#article_post_date").datepicker({dateFormat: 'yy-mm-dd'}).datepicker('setDate', new Date());
		if($("#article_picture_1").val()!=''){
			$("#completeUpload").empty();
			$("#completeUpload").append('<a href="<?php echo base_url().'uploads/'?>'+$("#article_picture_1").val()+'" target="_blank"><img src="<?php echo base_url().'uploads/'?>'+$("#article_picture_1").val()+'" width="100"/></a>')
			$("#completeUpload").show("fast");
		}
        $('#userfile1').uploadify({
            'debug':false,
            'auto':true,
			'queueSizeLimit' : 5,
			'uploadLimit' : 5,
            'swf':'<?php echo base_url(); ?>uploadify/uploadify.swf',
            'uploader':'<?php echo base_url(); ?>admin/uploadify/do_upload_abouts_1600x706',
            'cancelImg':'<?php echo base_url(); ?>uploadify/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.jpeg',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.jpeg)',
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
		$('#userfile2').uploadify({
            'debug':false,
            'auto':true,
			'queueSizeLimit' : 5,
			'uploadLimit' : 5,
            'swf':'<?php echo base_url(); ?>uploadify/uploadify.swf',
            'uploader':'<?php echo base_url(); ?>admin/uploadify/do_upload_abouts_550x700',
            'cancelImg':'<?php echo base_url(); ?>uploadify/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.bmp;*.png;*.jpeg',
            'fileTypeDesc':'Image Files (.jpg,.bmp,.png,.jpeg)',
            'fileSizeLimit':'10MB',
            'fileObjName':'userfile',
            'buttonText':'Select Photo(s)',
            'multi':false,
            'removeCompleted':true,
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                $("#completeUpload2").empty();
				$("#completeUpload2").hide("fast");
				$("#alert_article_picture_2").val("Upload error");
				$("#alert_article_picture_2").show("fast");
            },
			'onUploadSuccess' : function(file, data, response) {
				data = JSON.parse(data)
				$("#completeUpload2").empty();
				$("#completeUpload2").append('<a href="<?php echo base_url().'uploads/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/'?>'+data.file_name+'" width="100"/></a>')
				$("#completeUpload2").show("fast");
				$("#article_picture_2").val(data.file_name);
				$("#alert_article_picture_2").val("Upload success");
				$("#alert_article_picture_2").show("fast");
			}
        });	
		$('#userfile3').uploadify({
            'debug':false,
            'auto':true,
			'queueSizeLimit' : 3,
			'uploadLimit' : 3,
            'swf':'<?php echo base_url(); ?>uploadify/uploadify.swf',
            'uploader':'<?php echo base_url(); ?>admin/uploadify/do_upload_home_small',
            'cancelImg':'<?php echo base_url(); ?>uploadify/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.png;',
            'fileTypeDesc':'Image Files (.jpg,.png)',
            'fileSizeLimit':'1MB',
            'fileObjName':'userfile',
            'buttonText':'Chọn ảnh',
            'multi':true,
            'removeCompleted':true,
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                $("#alert_product_photo_slide").val("Upload error");
				$("#alert_product_photo_slide").show("fast");
            },
			'onUploadSuccess' : function(file, data, response) {
				data = JSON.parse(data)
				numPhoto++;
				var htmlText = "";
				$("#alert_product_photo_slide").val("Upload success");
				$("#alert_product_photo_slide").show("fast");
				$("#link_product_photo_slide").show("fast");
				htmlText+='<div class="photo_action_current_'+numPhoto+'" style="position:relative;float:left;margin-right:5px">';
				htmlText+='<a href="<?php echo base_url().'uploads/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/'?>'+data.file_name+'" style="width:100px;height:100px"/></a><br/><input id="slidephotoorder[]" name="slidephotoorder[]"  type="text" style="width:100px;text-align:center" value="'+numPhoto+'" />';
				htmlText+='<div class="photo_action_current_'+numPhoto+'" data="'+numPhoto+'" style="position:absolute;top:0;right:0;width:20px;height:auto"><a class="delact_current" href="javascript:void(0)"><img src="<?=base_url()?>templates/admin/images/b_del_icon.png" width="20" height="20" border="0"/></a></div>';
				htmlText+='</div>';
				$("#link_product_photo_slide").append(htmlText)
				$("#listPhoto").append('<input class="photo_action_current_'+numPhoto+'" name="slidephoto[]" id="slidephoto[]" type="hidden" value="'+data.file_name+'" />');
			}
        });	
		
		$( ".delact_current" ).live( "click", function() {
			var classname = $( this ).parents().attr('class');
			var answer = confirm("Bạn có chắc xóa dữ liệu đã này không?")
			if (answer){
				$( "."+classname ).remove();
			}
			else{
				return false;
			}
		});
    }); 
</script>
<?php $this->load->view('admin/footer');?>