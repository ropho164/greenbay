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
            <div id="iTitle">Cập nhật banner</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_banner/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Trang hiển thị</td>
                <td><table width="100%" border="0">
                  <tr>
                    <td width="175" align="left" valign="middle"><strong><em>HOME</em></strong></td>
                    <td width="100" align="left" valign="middle"><input name="is_home" type="checkbox" id="is_home" value="1" <?php if($results_data_edit[0]['is_home']==1){?> checked="checked" <?php } ?>/></td>
                    <td width="175" align="left" valign="middle"><em><strong>GALLERY</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_gal" type="checkbox" id="is_gal" value="1" <?php if($results_data_edit[0]['is_gal']==1){?> checked="checked" <?php } ?>/></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>ACCOMMODATION</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_acc" type="checkbox" id="is_acc" value="1" <?php if($results_data_edit[0]['is_acc']==1){?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle"><em><strong>SPECIAL OFFERS</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_spe" type="checkbox" id="is_spe" value="1" <?php if($results_data_edit[0]['is_spe']==1){?> checked="checked" <?php } ?> /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>RECREATION</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_fac" type="checkbox" id="is_fac" value="1" <?php if($results_data_edit[0]['is_fac']==1){?> checked="checked" <?php } ?>/></td>
                    <td align="left" valign="middle"><strong>RESERVATION</strong></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_res" type="checkbox" id="is_res" value="1" <?php if($results_data_edit[0]['is_res']==1){?> checked="checked" <?php } ?>/></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>DINING</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_din" type="checkbox" id="is_din" value="1" <?php if($results_data_edit[0]['is_din']==1){?> checked="checked" <?php } ?>/></td>
                    <td align="left" valign="middle"><em><strong>CONTACT</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_con" type="checkbox" id="is_con" value="1" <?php if($results_data_edit[0]['is_con']==1){?> checked="checked" <?php } ?>/></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>SITEMAP</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_sit" type="checkbox" id="is_sit" value="1" <?php if($results_data_edit[0]['is_sit']==1){?> checked="checked" <?php } ?>/></td>
                    <td align="left" valign="middle"><em><strong>POLICIES</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_ply" type="checkbox" id="is_ply" value="1" <?php if($results_data_edit[0]['is_ply']==1){?> checked="checked" <?php } ?>/></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>WELCOME</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_wel" type="checkbox" id="is_wel" value="1" <?php if($results_data_edit[0]['is_wel']==1){?> checked="checked" <?php } ?>/></td>
                    <td align="left" valign="middle"><em><strong>ORTHER</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_ort" type="checkbox" id="is_ort" value="1" <?php if($results_data_edit[0]['is_ort']==1){?> checked="checked" <?php } ?>/></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>TROPICAL SPA</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_spa" type="checkbox" id="is_spa" value="1" <?php if($results_data_edit[0]['is_spa']==1){?> checked="checked" <?php } ?>/></td>
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
                <td nowrap="nowrap">Mô tả tiếng Anh<sup>*</sup></td>
                <td align="left"><textarea name="banner_title_en" rows="5" id="banner_title_en" style="width:680px;resize:none"  placeholder="Mô tả tiếng Anh"><?=$results_data_edit[0]['banner_title_en']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('banner_title_en'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Mô tả tiếng Việt<sup>*</sup></td>
                <td align="left"><textarea name="banner_title_vn" rows="5" id="banner_title_vn" style="width:680px;resize:none"  placeholder="Mô tả tiếng Việt"><?=$results_data_edit[0]['banner_title_vn']?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('banner_title_vn'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Banner ảnh<sup>*</sup></td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><div id="viewUpload" style="display:none"><button id="userfile1" class="btn btn-sm" type="button">Select Photo(s)</button></div><div id="viewUploadSmall" style="display:none"><button id="userfile2" class="btn btn-sm" type="button">Select Photo(s)</button></div></td>
                    <td valign="middle"><input name="alert_banner_photo" type="text" id="alert_banner_photo" readonly style="display:none" />
                      <input type="hidden" name="banner_photo" id="banner_photo" value="<?=$results_data_edit[0]['banner_photo']?>" />
                      <!--(Size: <span id="setSizeUpload">Tùy chọn hiển thị</span>)--></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><div id="completeUpload">Link ảnh banner:&nbsp;<a href="<?=base_url().'uploads/banner/'.$results_data_edit[0]['banner_photo']?>" target="_blank"><?=base_url().'uploads/banner/'.$results_data_edit[0]['banner_photo']?></a></div><br/><span class="errorValidate"><?php echo form_error('banner_photo'); ?></span></td>
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
                <td>Thứ tự</td>
                <td><input name="b_order" type="text" id="b_order" style="width:50px;resize:none" value="<?=$results_data_edit[0]['b_order']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('b_order'); ?></span></td>
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
		if($('#is_home').prop('checked')){
			//$('#setSizeUpload').empty().append("1600px x 800px");
			$('#viewUpload').css("display","block");
			$('#viewUploadSmall').css("display","none");
		}
		else{
			//$('#setSizeUpload').empty().append("1600px x 800px");
			$('#viewUpload').css("display","none");
			$('#viewUploadSmall').css("display","block");
		}
		$('#is_home').on('click',function(){
			if(this.checked){
				$('.checkbox').each(function(){
					$(this).prop('checked',false);
				});
				//$('#setSizeUpload').empty().append("1600px x 800px");
				$('#viewUpload').css("display","block");
				$('#viewUploadSmall').css("display","none");
			}
		});
		$('.checkbox').on('click',function(){
			if(this.checked){
				 $('#is_home').prop('checked',false);
			}			
			//$('#setSizeUpload').empty().append("1600px x 800px");
			$('#viewUpload').css("display","none");
			$('#viewUploadSmall').css("display","block");
		});
		uploadFile();
		uploadFileSmall();
    });
	function uploadFile(){
		$('#userfile1').uploadFile({
			uploadStr:"Chọn hình",
			url:"<?php echo base_url(); ?>admin/uploadify/do_upload_banner",
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
					$("#completeUpload").append('<a href="<?php echo base_url().'uploads/banner/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/banner/'?>'+data.file_name+'" style="width:100px"/></a>')
					$("#completeUpload").show("fast");
					$("#banner_photo").val(data.file_name);
					$("#alert_banner_photo").val("Upload success");
					$("#alert_banner_photo").show("fast");
				}
				else{
					$("#completeUpload").empty();
					$("#completeUpload").hide("fast");
					$("#alert_banner_photo").val("Upload error");
					$("#alert_banner_photo").show("fast");
				}
				pd.statusbar.empty();
				pd.statusbar.hide();
			},
			onError: function(files,status,errMsg,pd){
				$("#completeUpload").empty();
				$("#completeUpload").hide("fast");
                $("#alert_banner_photo").val("Upload error");
				$("#alert_banner_photo").show("fast");
				pd.statusbar.empty();
				pd.statusbar.hide();
			}
		});
	}
	function uploadFileSmall(){
		$('#userfile2').uploadFile({
			uploadStr:"Chọn hình",
			url:"<?php echo base_url(); ?>admin/uploadify/do_upload_banner",
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
					$("#completeUpload").append('<a href="<?php echo base_url().'uploads/banner/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/banner/'?>'+data.file_name+'" style="width:100px"/></a>')
					$("#completeUpload").show("fast");
					$("#banner_photo").val(data.file_name);
					$("#alert_banner_photo").val("Upload success");
					$("#alert_banner_photo").show("fast");
				}
				else{
					$("#completeUpload").empty();
					$("#completeUpload").hide("fast");
					$("#alert_banner_photo").val("Upload error");
					$("#alert_banner_photo").show("fast");
				}
				pd.statusbar.empty();
				pd.statusbar.hide();
			},
			onError: function(files,status,errMsg,pd){
				$("#completeUpload").empty();
				$("#completeUpload").hide("fast");
                $("#alert_banner_photo").val("Upload error");
				$("#alert_banner_photo").show("fast");
				pd.statusbar.empty();
				pd.statusbar.hide();
			}
		});
	}
</script>
<?php $this->load->view('admin/footer');?>