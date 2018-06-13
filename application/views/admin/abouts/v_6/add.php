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
                <td>Tiêu đề file<sup>*</sup></td>
                <td align="left"><input type="text" name="article_title_files_1" id="article_title_files_1" style="width:680px;resize:none" placeholder="Exp: SEE OUR FULL MENU..." value="<?php echo set_value('article_title_files_1'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_title_files_1'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Link file<sup>*</sup></td>
                <td align="left"><input type="text" name="article_files_1" id="article_files_1" style="width:680px;resize:none" placeholder="Exp: http://greenbayphuquocresort.com/uploads/file1.pdf" value="<?php echo set_value('article_files_1'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_files_1'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề chi tiết<sup>*</sup></td>
                <td align="left"><input type="text" name="article_title_content_1" id="article_title_content_1" style="width:680px;resize:none" placeholder="Exp: OPENING HOUR..." value="<?php echo set_value('article_title_content_1'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_title_content_1'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Chi tiết nội dung<sup>*</sup></td>
                <td align="left"><textarea name="article_content_1" rows="8" id="article_content_1" style="width:680px;" placeholder="Exp: Lunch: 11:30 – 17:00..."><?php echo set_value('article_content_1'); ?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_content_1'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_content_3'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Hình<sup>*</sup><br />
                  (Size: 900px x 500px)
                  </td>
                <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><button id="userfile1" class="btn btn-sm" type="button">Select Photo(s)</button></td>
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
		$('#userfile1').uploadFile({
			uploadStr:"Chọn hình",
			url:"<?php echo base_url(); ?>admin/uploadify/do_upload_abouts_900x500",
			fileName:"userfile",
			autoSubmit:true,
			returnType: "json",
			showPreview:false,
			multiple:false,
			dragDrop:false,
			showDelete: false,
			acceptFileTypes:'.png,.jpg,.jpeg,.gif',
			onSuccess:function(files,data,xhr,pd){
				if(data.file_name!='' && data.file_name!=null){
					$("#completeUpload").empty();
					$("#completeUpload").append('<a href="<?php echo base_url().'uploads/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/'?>'+data.file_name+'" width="100"/></a>')
					$("#completeUpload").show("fast");
					$("#article_picture_1").val(data.file_name);
					$("#alert_article_picture_1").val("Upload success");
					$("#alert_article_picture_1").show("fast");
				}
				else{
					$("#completeUpload").empty();
					$("#completeUpload").hide("fast");
					$("#alert_article_picture_1").val("Upload error");
					$("#alert_article_picture_1").show("fast");
				}
				pd.statusbar.empty();
				pd.statusbar.hide();
			},
			onError: function(files,status,errMsg,pd){
				$("#completeUpload").empty();
				$("#completeUpload").hide("fast");
				$("#alert_article_picture_1").val("Upload error");
				$("#alert_article_picture_1").show("fast");
				pd.statusbar.empty();
				pd.statusbar.hide();
			}
		});
    }); 
	bkLib.onDomLoaded(function() {
		var edt = new nicEditor({
			buttonList :['bold','italic','underline','left','center','right','justify','ol','ul','forecolor','bgcolor'],
			maxHeight : 300,
			iconsPath : '<?php echo base_url();?>templates/js/nicEditorIcons.gif'});
		edt.panelInstance('article_content_1');
		//edt.panelInstance('article_content_2');
		//edt.panelInstance('article_content_3');
	});
</script>
<?php $this->load->view('admin/footer');?>