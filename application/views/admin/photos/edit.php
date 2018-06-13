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
			echo form_open('admin/photos/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề tiếng Anh<sup>*</sup></td>
                <td align="left"><input type="text" name="article_title_en" id="article_title_en" style="width:680px;resize:none" placeholder="Tiêu đề tiếng Anh" value="<?=$results_data_edit[0]['article_title_en']?>"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left">
                  <div class="errorValidate"><?php echo form_error('article_title_en'); ?></div>  
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề tiếng Việt<sup>*</sup></td>
                <td align="left"><input type="text" name="article_title_vn" id="article_title_vn" style="width:680px;resize:none" placeholder="Tiêu đề tiếng Việt" value="<?=$results_data_edit[0]['article_title_vn']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_title_vn'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề tiếng Trung<sup>*</sup></td>
                <td align="left"><input type="text" name="article_title_cn" id="article_title_cn" style="width:680px;resize:none" placeholder="Tiêu đề tiếng Trung Quốc" value="<?=$results_data_edit[0]['article_title_cn']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_title_cn'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Hình <sup>*</sup></td>
                <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><?php echo form_upload('userfile1','','id="userfile1"'); ?></td>
                    <td valign="top"><input name="alert_article_picture_1" type="text" id="alert_article_picture_1" readonly style="display:none" />
                      <input type="hidden" name="article_picture_1" id="article_picture_1" value="<?=$results_data_edit[0]['article_picture_1']?>" />
                      (Size: 1024px x 770px)</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div id="completeUpload"><a href="<?php echo base_url().'uploads/photos/'.$results_data_edit[0]['article_picture_1']?>" target="_blank"><img src="<?php echo base_url().'uploads/photos/'.$results_data_edit[0]['article_picture_1']?>" width="100"/></a></div><br/><span class="errorValidate"><?php echo form_error('article_picture_1'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Thứ tự<sup>*</sup></td>
                <td align="left"><input name="order_article" type="text" id="order_article" style="width:50px;resize:none" value="<?=$results_data_edit[0]['order_article']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('order_article'); ?></td>
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
        $('#userfile1').uploadify({
            'debug':false,
            'auto':true,
			'queueSizeLimit' : 5,
			'uploadLimit' : 5,
            'swf':'<?php echo base_url(); ?>uploadify/uploadify.swf',
            'uploader':'<?php echo base_url(); ?>admin/uploadify/do_upload_photos',
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
				$("#completeUpload").append('<a href="<?php echo base_url().'uploads/photos/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/photos/'?>'+data.file_name+'" width="100"/></a>')
				$("#completeUpload").show("fast");
				$("#article_picture_1").val(data.file_name);
				$("#alert_article_picture_1").val("Upload success");
				$("#alert_article_picture_1").show("fast");
			}
        });
    }); 
</script>
<?php $this->load->view('admin/footer');?>