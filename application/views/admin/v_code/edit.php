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
            <div id="iTitle">Cập nhật Banner Promotion</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_code/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200" nowrap="nowrap">Ngôn ngữ bài viết<sup>*</sup></td>
                <td align="left"><select name="article_langue" id="article_langue" style="width:360px;resize:none">
                  <option value="en" <?php if($results_data_edit[0]['article_langue']=='en'){?> selected="selected" <?php }?>>Tiếng Anh</option>
                  <option value="vn" <?php if($results_data_edit[0]['article_langue']=='vn'){?> selected="selected" <?php }?>>Tiếng Việt</option>
                </select>
                  <input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Tên mô tả<sup>*</sup></td>
                <td align="left">
                  <input name="banner_title" value="<?=$results_data_edit[0]['banner_title']?>" type="text" id="banner_title" style="width:550px;resize:none" placeholder="Tên mô tả banner" ></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('banner_title'); ?></span><input type="hidden" name="banner_type" id="banner_type" value="banner"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Mã Code/Banner<sup>*</sup></td>
                <td>
                  <div id="content_txt"><textarea name="banner_photo" rows="6" id="banner_photo" style="width:680px;resize:none"  placeholder="Paste nội dung Javascript vào đây"><?php echo html_entity_decode($results_data_edit[0]['banner_photo']); ?></textarea></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('banner_photo'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><div id="content_size" style="display:none;width:100%">
                    <div style="width:160px;float:left">
                        <span>Chiều rộng banner(px)</span><br/>
                        <input name="banner_w" value="<?php echo $results_data_edit[0]['banner_w']; ?>" type="text" id="banner_w" style="width:110px;resize:none"><br/>
                        <span class="errorValidate"><?php echo form_error('banner_w'); ?></span>
                    </div>
                    <div style="width:160px;float:left">
                        <span>Chiều cao banner(px)</span><br/>
                        <input name="banner_h" value="<?php echo $results_data_edit[0]['banner_h']; ?>" type="text" id="banner_h" readonly style="width:110px;resize:none"><br/>
                        <span class="errorValidate"><?php echo form_error('banner_h'); ?></span>
                    </div>
					<div style="width:160px;float:left">
                        <span>Vị trí chiều ngang</span><br/>
                        <select name="banner_pos_h" id="banner_pos_h" style="width:130px;resize:none">
                        	<option value="center" <?php if($results_data_edit[0]['banner_pos_h']=='center') echo 'selected="selected"';?>>center</option>
                 			<option value="left" <?php if($results_data_edit[0]['banner_pos_h']=='left') echo 'selected="selected"';?>>left</option>
                            <option value="right" <?php if($results_data_edit[0]['banner_pos_h']=='right') echo 'selected="selected"';?>>right</option>
                        </select><br/>
                        <span class="errorValidate"><?php echo form_error('banner_pos_h'); ?></span>
                    </div>
                    <div style="width:160px;float:left">
                        <span>Vị trí chiều dọc</span><br/>
                        <select name="banner_pos_v" id="banner_pos_v" style="width:130px;resize:none">
                        	<option value="<?=$results_data_edit[0]['banner_pos_v']?>"><?=$results_data_edit[0]['banner_pos_v']?></option>
                        </select><br/>
                        <span class="errorValidate"><?php echo form_error('banner_pos_v'); ?></span>
                    </div>
                </div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Trạng thái</td>
                <td><input name="b_active" type="checkbox" id="b_active" value="1"  <?php if($results_data_edit[0]['b_active']==1){?> checked="checked" <?php } ?>/></td>
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
<script type="text/javascript" src="<?php echo base_url();?>templates/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	var htmlContent = $("#banner_photo").val();
	if($("#banner_type").val()=='banner'){
		CKEDITOR.replace( 'banner_photo',{
			height: 200,
			toolbar:'Full'
		});
		$("#content_size").css({'display':'block'});
	}
	$("#banner_pos_h").change(function () {
		var actPos = $(this).val();
		if(actPos=='center'){
			$("#banner_pos_v").empty();
			$('#banner_pos_v').append($("<option></option>").attr("value","center").text("center"));
			//$("#banner_pos_v option[value='bottom']").remove();
		}
		if(actPos=='left' || actPos=='right'){
			$("#banner_pos_v").empty();
			$('#banner_pos_v').append($("<option></option>").attr("value","bottom").text("bottom"));
			//$("#banner_pos_v option[value='center']").remove();
		}
	});
	$("#banner_type").change(function () {
		$("#content_txt").empty();
		var act = $(this).val();
		if(act=='js'){
			$("#content_txt").append('<textarea name="banner_photo" rows="6" id="banner_photo" style="width:680px;resize:none"  placeholder="Paste nội dung Javascript vào đây"></textarea>');
			$("#banner_photo").val(htmlContent);
			$("#content_size").css({'display':'none'});
		}
		else if(act=='banner'){
			$("#content_txt").append('<textarea name="banner_photo" rows="6" id="banner_photo" style="width:680px;resize:none" placeholder="Paste nội dung Banner vào đây"></textarea>');
			CKEDITOR.replace( 'banner_photo',{
				height: 200,
				toolbar:'Full'
			});
			$("#banner_photo").val(htmlContent);
			$("#content_size").css({'display':'block'});
		}
	});
});
// If you want inserted images in a CKEditor to be responsive
// you can use the following code. It creates a htmlfilter for the
// image tag that replaces inline "width" and "style" definitions with
// their corresponding attributes and add's (in this example) the
// Bootstrap "img-responsive" class.
CKEDITOR.on('instanceReady', function (ev) {
    ev.editor.dataProcessor.htmlFilter.addRules( {
        elements : {
            img: function( el ) {
                // Add bootstrap "img-responsive" class to each inserted image
                el.addClass('img-responsive');
				el.addClass('center-block');
        
                // Remove inline "height" and "width" styles and
                // replace them with their attribute counterparts.
                // This ensures that the 'img-responsive' class works
                var style = el.attributes.style;
        
                if (style) {
                    // Get the width from the style.
                    var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                        width = match && match[1];
        
                    // Get the height from the style.
                    match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                    var height = match && match[1];
        
                    // Replace the width
                    if (width) {
                        el.attributes.style = el.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                        //el.attributes.width = width;
                    }
        
                    // Replace the height
                    if (height) {
                        el.attributes.style = el.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                        //el.attributes.height = height;
                    }
                }
        
                // Remove the style tag if it is empty
                if (!el.attributes.style)
                    delete el.attributes.style;
            }
        }
    });
});
</script>
<?php $this->load->view('admin/footer');?>