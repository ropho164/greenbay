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
                <td align="left"><input type="hidden" name="article_intro_type" id="article_intro_type" value="<?=$types?>"/><input type="hidden" name="article_parent" id="article_parent" value="0" /></td>
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
                <td align="left" valign="top">Ảnh minh họa<br />
                  (Size: 180px x 180px) </td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><button id="userfile3" class="btn btn-sm" type="button">Select Photo(s)</button></td>
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
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
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
		$('#userfile3').uploadFile({
			uploadStr:"Chọn hình (s)",
			url:"<?php echo base_url(); ?>admin/uploadify/do_upload_home_small",
			fileName:"userfile",
			autoSubmit:true,
			returnType: "json",
			showPreview:false,
			multiple:true,
			dragDrop:false,
			showDelete: false,
			acceptFileTypes:'.png,.jpg,.jpeg,.gif',
			onSuccess:function(files,data,xhr,pd){
				if(data.file_name!='' && data.file_name!=null){
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
				else{
					$("#alert_product_photo_slide").val("Upload error");
					$("#alert_product_photo_slide").show("fast");
				}
				pd.statusbar.empty();
				pd.statusbar.hide();
			},
			onError: function(files,status,errMsg,pd){
				$("#alert_product_photo_slide").val("Upload error");
				$("#alert_product_photo_slide").show("fast");
				pd.statusbar.empty();
				pd.statusbar.hide();
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