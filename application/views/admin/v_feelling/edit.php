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
            <div id="iTitle">Cập nhật nội dung cảm nhận KH</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_feelling/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Tiêu đề<sup>*</sup></td>
                <td align="left">
                  <input name="title_feel" value="<?=$results_data_edit[0]['title_feel']?>" type="text" id="title_feel" style="width:680px;resize:none" placeholder="Tiêu đề" ></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('title_feel'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                  Mô tả<sup>*</sup></td>
                <td>
                <textarea name="desc_feel" rows="8" id="desc_feel" style="width:680px;" placeholder="Giới thiệu sơ lược nội dung"><?=$results_data_edit[0]['desc_feel']?></textarea>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('desc_feel'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Hình<sup>*</sup><br />
                  (Size: 200px x 200px)
                  </td>
                <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><button id="userfile1" class="btn btn-sm" type="button">Select Photo(s)</button></td>
                    <td valign="top"><input name="alert_article_picture_1" type="text" id="alert_article_picture_1" readonly style="display:none" />
                      <span class="errorValidate"><?php echo form_error('article_picture_1'); ?></span>
                      <input type="hidden" name="article_picture_1" id="article_picture_1" value="<?=$results_data_edit[0]['photo_feel']?>" />
                      </td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div id="completeUpload"></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Link<sup>*</sup></td>
                <td align="left">
                <input name="link_feel" value="<?=$results_data_edit[0]['link_feel']?>" type="text" id="link_feel" style="width:680px;resize:none" placeholder="Link liên kết" ></td>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('link_feel'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Thứ tự</td>
                <td><input name="order_feel" type="text" id="order_feel" style="width:50px;resize:none" value="<?=$results_data_edit[0]['order_feel']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('order_feel'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Trạng thái</td>
                <td><input name="active_feel" type="checkbox" id="active_feel" value="1" <?php if($results_data_edit[0]['active_feel']==1){?> checked="checked" <?php } ?>/>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Ngày</td>
                <td><input type="text" id="date_feel" name="date_feel" value="<?=$results_data_edit[0]['date_feel']?>" readonly></td>
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
		$("#date_feel").datepicker({dateFormat: 'yy-mm-dd'}).datepicker('setDate', new Date());
       	if($("#article_picture_1").val()!=''){
			$("#completeUpload").empty();
			$("#completeUpload").append('<a href="<?php echo base_url().'uploads/feelling/'?>'+$("#article_picture_1").val()+'" target="_blank"><img src="<?php echo base_url().'uploads/feelling/'?>'+$("#article_picture_1").val()+'" width="100"/></a>')
			$("#completeUpload").show("fast");
		}
		$('#userfile1').uploadFile({
			uploadStr:"Chọn hình",
			url:"<?php echo base_url(); ?>admin/uploadify/do_upload_feelling",
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
					$("#completeUpload").append('<a href="<?php echo base_url().'uploads/feelling/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/feelling/'?>'+data.file_name+'" width="100"/></a>')
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
</script>
<?php $this->load->view('admin/footer');?>