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
            <div id="iTitle">Cập nhật banner tin khuyến mãi</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_banner_promotion/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
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
                <td align="left"><span class="errorValidate"><?php echo form_error('banner_title'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Banner ảnh<sup>*</sup></td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><?php echo form_upload('userfile1','','id="userfile1"'); ?></td>
                    <td valign="middle"><input name="alert_banner_photo" type="text" id="alert_banner_photo" readonly="readonly" style="display:none" />
                      <input type="hidden" name="banner_photo" id="banner_photo" value="<?=$results_data_edit[0]['banner_photo']?>" />
                      (Size: 640px x 363px)</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><div id="completeUpload">Link ảnh banner:&nbsp;<a href="<?=base_url().'uploads/banner_promotion/'.$results_data_edit[0]['banner_photo']?>" target="_blank"><?=base_url().'uploads/banner_promotion/'.$results_data_edit[0]['banner_photo']?></a></div><br/><span class="errorValidate"><?php echo form_error('banner_photo'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Banner link<sup>*</sup></td>
                <td><input name="banner_lnk" type="text" value="<?=$results_data_edit[0]['banner_lnk']?>" id="banner_lnk" style="width:550px;resize:none" placeholder="Link cho banner khi click" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('banner_lnk'); ?></span></td>
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
<script type="text/javascript">
    $(document).ready(function () {
      var base_url = '<?php echo base_url(); ?>';
        $('#userfile1').uploadify({
            'debug':false,
            'auto':true,
			'queueSizeLimit' : 5,
			'uploadLimit' : 5,
            'swf':'<?php echo base_url(); ?>uploadify/uploadify.swf',
            'uploader':'<?php echo base_url(); ?>admin/uploadify/do_upload_banner_promotion',
            'cancelImg':'<?php echo base_url(); ?>uploadify/uploadify-cancel.png',
            'fileTypeExts':'*.jpg;*.png;',
            'fileTypeDesc':'Image Files (.jpg,.png)',
            'fileSizeLimit':'10MB',
            'fileObjName':'userfile',
            'buttonText':'Chọn ảnh',
            'multi':false,
            'removeCompleted':true,
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
				$("#completeUpload").empty();
				$("#completeUpload").hide("fast");
                $("#alert_banner_photo").val("Upload error");
				$("#alert_banner_photo").show("fast");
            },
			'onUploadSuccess' : function(file, data, response) {
				data = JSON.parse(data)
				$("#completeUpload").append('<br/>Link upload:&nbsp;<a href="<?php echo base_url().'uploads/banner_promotion/'?>'+data.file_name+'" target="_blank"><?php echo base_url().'uploads/banner_promotion/'?>'+data.file_name+'</a><br/>')
				$("#completeUpload").show("fast");
				$("#banner_photo").val(data.file_name);
				$("#alert_banner_photo").val("Upload success");
				$("#alert_banner_photo").show("fast");
			}
        });
    });
</script>
<?php $this->load->view('admin/footer');?>