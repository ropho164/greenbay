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
            <div id="iTitle">Thêm banner</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_banner/proaddata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Trang hiển thị</td>
                <td><table width="100%" border="0">
                  <tr>
                    <td width="175" align="left" valign="middle"><strong><em>HOME</em></strong></td>
                    <td width="100" align="left" valign="middle"><input name="is_home" type="checkbox" id="is_home" value="1" <?php echo set_checkbox('is_home', '1'); ?>/></td>
                    <td width="175" align="left" valign="middle"><em><strong>GALLERY</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox"  name="is_gal" type="checkbox" id="is_gal" value="1" <?php echo set_checkbox('is_gal', '1'); ?>/></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>ACCOMMODATION</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_acc" type="checkbox" id="is_acc" value="1" <?php echo set_checkbox('is_acc', '1'); ?> /></td>
                    <td align="left" valign="middle"><em><strong>SPECIAL OFFERS</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_spe" type="checkbox" id="is_spe" value="1" <?php echo set_checkbox('is_spe', '1'); ?>/></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>RECREATION</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_fac" type="checkbox" id="is_fac" value="1" <?php echo set_checkbox('is_fac', '1'); ?>/></td>
                    <td align="left" valign="middle"><strong>RESERVATION</strong></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_res" type="checkbox" id="is_res" value="1" <?php echo set_checkbox('is_res', '1'); ?>/></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>DINING</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_din" type="checkbox" id="is_din" value="1" <?php echo set_checkbox('is_din', '1'); ?>/></td>
                    <td align="left" valign="middle"><em><strong>CONTACT</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_con" type="checkbox" id="is_con" value="1" <?php echo set_checkbox('is_con', '1'); ?>/></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>SITEMAP</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_sit" type="checkbox" id="is_sit3" value="1" <?php echo set_checkbox('is_sit', '1'); ?>/></td>
                    <td align="left" valign="middle"><em><strong>POLICIES</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_ply" type="checkbox" id="is_ply" value="1" <?php echo set_checkbox('is_ply', '1'); ?>/></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>ABOUT US</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_wel" type="checkbox" id="is_wel" value="1" <?php echo set_checkbox('is_wel', '1'); ?>/></td>
                    <td align="left" valign="middle"><em><strong>ORTHER</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_ort" type="checkbox" id="is_ort" value="1" <?php echo set_checkbox('is_ort', '1'); ?>/></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><em><strong>TROPICAL SPA</strong></em></td>
                    <td align="left" valign="middle"><input class="checkbox" name="is_spa" type="checkbox" id="is_spa" value="1" <?php echo set_checkbox('is_spa', '1'); ?>/></td>
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
                <td align="left"><textarea name="banner_title_en" rows="5" id="banner_title_en" style="width:680px;resize:none"  placeholder="Mô tả tiếng Anh"><?php echo set_value('banner_title_en'); ?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('banner_title_en'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Mô tả tiếng Việt<sup>*</sup></td>
                <td align="left"><textarea name="banner_title_vn" rows="5" id="banner_title_vn" style="width:680px;resize:none"  placeholder="Mô tả tiếng Việt"><?php echo set_value('banner_title_vn'); ?></textarea></td>
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
                      <input type="hidden" name="banner_photo" id="banner_photo" value="<?php echo set_value('banner_photo'); ?>" />
                      <!--(Size: <span id="setSizeUpload">Tùy chọn hiển thị</span>)--></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><div id="completeUpload"></div><br/><span class="errorValidate"><?php echo form_error('banner_photo'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Banner link<sup>*</sup></td>
                <td><input name="banner_lnk" type="text" id="banner_lnk" style="width:550px;resize:none" placeholder="Link cho banner khi click" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('banner_lnk'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Thứ tự</td>
                <td><input name="b_order" type="text" id="b_order" style="width:50px;resize:none" value="<?=$count+1?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('b_order'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Trạng thái</td>
                <td><input name="b_active" type="checkbox" id="b_active" value="1" <?php echo set_checkbox('b_active', '1'); ?>/></td>
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
						echo "Thêm dữ liệu thành công.";
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
		$('#is_home').on('click',function(){
			if(this.checked){
				$('.checkbox').each(function(){
					$(this).prop('checked',false);
				});
				//$('#setSizeUpload').empty().append("Option");
				$('#viewUploadSmall').css("display","none");
				$('#viewUpload').css("display","block");
			}
		});
		$('.checkbox').on('click',function(){
			if(this.checked){
				 $('#is_home').prop('checked',false);
			}
			//$('#setSizeUpload').empty().append("Option");
			$('#viewUpload').css("display","none");
			$('#viewUploadSmall').css("display","block");
		});
		uploadFile();
		uploadFileSmall();
		if($("#banner_photo").val()!=''){
			$("#completeUpload").empty();
			$("#completeUpload").append('<a href="<?php echo base_url().'uploads/banner/'?>'+$("#banner_photo").val()+'" target="_blank"><img src="<?php echo base_url().'uploads/banner/'?>'+$("#banner_photo").val()+'" style="width:100px"/></a>')
			$("#completeUpload").show("fast");
		}
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