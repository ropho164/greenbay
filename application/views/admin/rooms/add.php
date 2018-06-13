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
			echo form_open('admin/rooms/proaddata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Ngôn ngữ bài viết<sup>*</sup></td>
                <td align="left">
                	<select name="article_langue" id="article_langue" style="width:360px;resize:none">
                        <option value="en" <?php echo set_select('article_langue', 'en', FALSE);?>>Tiếng Anh</option>
                        <option value="vn" <?php echo set_select('article_langue', 'vn', FALSE);?>>Tiếng Việt</option>
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
                <td nowrap="nowrap">Danh mục chính<sup>*</sup></td>
                <td align="left">
                <?php
                if($results_main_menu && sizeof($results_main_menu)>0){
				?>
                  <select name="main_menu_id" id="main_menu_id" style="width:360px;resize:none">
                    <?php foreach($results_main_menu as $obj){ ?>
                    <option value="<?=$obj['id']?>" <?php echo set_select('main_menu_id', $obj['id'], FALSE);?>><?=$obj['category_name_en'].' - '.$obj['category_name_vn']?></option>
                    <?php } ?>
                    </select>
                  <?php } ?>                  
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Danh mục con<sup>*</sup></td>
                <td align="left">
                <select name="sub_menu_id" id="sub_menu_id" style="width:360px;resize:none">
                <?php
                if($results_sub_menu && sizeof($results_sub_menu)>0){
                  foreach($results_sub_menu as $objSub){ ?>
                  	<option value="<?=$objSub['id']?>"  <?php echo set_select('sub_menu_id', $objSub['id'], FALSE);?>><?=$objSub['sub_name_en']?></option>
                  <?php } 
				}
				else{
					echo '<option value="0"' .set_select('sub_menu_id', 0, FALSE).'>Không có danh mục</option>';
				} ?>
                </select>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề  (SEO)<sup>*</sup></td>
                <td align="left"><input type="text" name="article_seo_title" id="article_seo_title" style="width:680px;resize:none" placeholder="Tiêu đề (SEO)" value="<?php echo set_value('article_seo_title'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('article_seo_title'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Từ khóa (SEO)<sup>*</sup></td>
                <td align="left"><input type="text" name="article_key" id="article_key" style="width:680px;resize:none" placeholder="Từ khóa (SEO)" value="<?php echo set_value('article_key'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('article_key'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top">Mô tả (SEO)<sup>*</sup></td>
                <td align="left"><textarea name="article_des" rows="3" id="article_des" style="width:680px;resize:none"  placeholder="Nội dung Mô tả (SEO)"><?php echo set_value('article_des'); ?></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('article_des'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">Tiêu đề 1<sup>*</sup></td>
                <td align="left"><input type="text" name="article_price_apply" id="article_price_apply" style="width:680px;resize:none" placeholder="Exp: Garden View" value="<?php echo set_value('article_price_apply'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_price_apply'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề 2<sup>*</sup></td>
                <td align="left"><input type="text" value="<?php echo set_value('article_title'); ?>" name="article_title" id="article_title" style="width:680px;resize:none" placeholder="Exp: BUNGALOW"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left">
                <div class="errorValidate"><?php echo form_error('article_title'); ?></div>
                <div id="result_upload">
					<?php 
					if(isset($b_Check) && $b_Check == true){
						if($b_Check_Ins==-1){
							echo "<span class='errorValidate' style='font-size:12pt'>Tiêu đề bài viết đang tồn tại trên hệ thống.</span>";
						}
					}
					?>
                </div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">Số lượng phòng<sup>*</sup></td>
                <td align="left"><input type="text" name="article_quantity" id="article_quantity" style="width:680px;resize:none" placeholder="Số lượng phòng" value="<?php echo set_value('article_quantity'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">Diện tích phòng<sup>*</sup></td>
                <td align="left"><input type="text" name="article_size" id="article_size" style="width:680px;resize:none" placeholder="Diện tích phòng" value="<?php echo set_value('article_size'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">Giá phòng($)<sup>*</sup></td>
                <td align="left"><input type="text" name="article_price" id="article_price" style="width:680px;resize:none" placeholder="Price($)" value="<?php echo set_value('article_price'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_price'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">Giá phòng(VNĐ)<sup>*</sup></td>
                <td align="left"><input type="text" name="article_price_vn" id="article_price_vn" style="width:680px;resize:none" placeholder="Giá phòng (VNĐ)" value="<?php echo set_value('article_price_vn'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_price_vn'); ?></div></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">Giá promotion </td>
                <td align="left"><input type="text" name="article_price_promo" id="article_price_promo" style="width:680px;resize:none" placeholder="Giá promotion" value="<?php echo set_value('article_price_promo'); ?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('article_price_promo'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">Mô tả<sup>*</sup></td>
                <td align="left">
                  <textarea name="article_desc" rows="6" id="article_desc" style="width:680px;resize:none" placeholder="Mô tả"><?php echo set_value('article_desc'); ?></textarea>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_desc'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Tiện ích phòng<sup>*</sup></td>
                <td align="left"><textarea name="article_content" id="article_content" style="width:360px;resize:none"  placeholder="Nội dung"><?php echo html_entity_decode(set_value('article_content')); ?></textarea>
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
                <td nowrap="nowrap">Nội dung<sup> *</sup></td>
                <td align="left"><textarea name="article_content_orther" id="article_content_orther" style="width:360px;resize:none"  placeholder="Nội dung"><?php echo html_entity_decode(set_value('article_content_orther')); ?></textarea>
                  <?php echo display_ckeditor($ckeditor1); ?></td>
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
                <td>Hình 2<sup>*</sup><br />
                  (Size: 960px x 847px)
                </td>
                <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><button id="userfile2" class="btn btn-sm" type="button">Select Photo(s)</button></td>
                    <td valign="top"><input name="alert_article_picture_2" type="text" id="alert_article_picture_2" readonly style="display:none" />
                      <span class="errorValidate"><?php echo form_error('article_picture_1'); ?></span>
                      <input type="hidden" name="article_picture_2" id="article_picture_2" value="<?php echo set_value('article_picture_2'); ?>" />
                      </td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div id="completeUpload2"></div><br/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top">Ảnh trình diễn</td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><button id="userfile3" class="btn btn-sm" type="button">Select Photo(s)</button></td>
                    <td valign="middle"><input name="alert_product_photo_slide" type="text" id="alert_product_photo_slide" readonly style="display:none" />(Tối đa 10 ảnh một lần upload)&nbsp;&nbsp;<span id="slide_err" class="errorValidate"></span>
                    
                    </td>
                    </tr>
                  <tr>
                    <td colspan="2">
                    <div id="listPhoto" style="clear:both;text-align:left;position:relative"><?php
                    if(count($list_photo) > 0){
							for($i=0;$i<count($list_photo);$i++)
							{
								echo '<div class="photo_action_current_'.$i.'" style="position:relative;float:left;margin-right:5px">';
								echo '<input class="photo_action_current_'.$i.'" name="slidephoto[]" id="slidephoto[]" type="hidden" value="'.$list_photo[$i].'" />';
								echo '<a href="'.base_url().'uploads/rooms/slide_details/'.$list_photo[$i].'" target="_blank"><img src="'.base_url().'uploads/rooms/slide_details/'.$list_photo[$i].'" style="width:100px;height:100px"/></a><br/><input id="slidephotoorder[]" name="slidephotoorder[]"  type="text" style="width:100px;text-align:center" value="'.($i+1).'" />';
								echo '<div class="photo_action_current_'.$i.'" style="position:absolute;top:0;right:0;width:20px;height:auto"><a class="delact_current" href="javascript:void(0)"><img src="'.base_url().'templates/admin/images/b_del_icon.png" width="20" height="20" border="0"/></a></div>';
								echo '</div>';
							}
						}
					?></div></td>
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
                <td align="left"><input name="order_article" type="text" id="order_article" style="width:50px;resize:none" value="<?=$count+1?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('order_article'); ?></span></td>
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
                <td nowrap="nowrap">HOT</td>
                <td align="left"><input type="checkbox" name="article_hot" id="article_hot" value="1"  <?php echo set_checkbox('article_hot', '1'); ?> ></td>
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
			$("#completeUpload").append('<a href="<?php echo base_url().'uploads/rooms/'?>'+$("#article_picture_1").val()+'" target="_blank"><img src="<?php echo base_url().'uploads/rooms/'?>'+$("#article_picture_1").val()+'" width="100"/></a>')
			$("#completeUpload").show("fast");
		}
		if($("#article_picture_2").val()!=''){
			$("#completeUpload2").empty();
			$("#completeUpload2").append('<a href="<?php echo base_url().'uploads/rooms/'?>'+$("#article_picture_2").val()+'" target="_blank"><img src="<?php echo base_url().'uploads/rooms/'?>'+$("#article_picture_2").val()+'" width="100"/></a>')
			$("#completeUpload2").show("fast");
		}
		$('#userfile1').uploadFile({
			uploadStr:"Chọn hình",
			url:"<?php echo base_url(); ?>admin/uploadify/do_upload_rooms",
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
					$("#completeUpload").append('<a href="<?php echo base_url().'uploads/rooms/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/rooms/'?>'+data.file_name+'" width="100"/></a>')
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
		$('#userfile2').uploadFile({
			uploadStr:"Chọn hình",
			url:"<?php echo base_url(); ?>admin/uploadify/do_upload_rooms_details",
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
					$("#completeUpload2").empty();
					$("#completeUpload2").append('<a href="<?php echo base_url().'uploads/rooms/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/rooms/'?>'+data.file_name+'" width="100"/></a>')
					$("#completeUpload2").show("fast");
					$("#article_picture_2").val(data.file_name);
					$("#alert_article_picture_2").val("Upload success");
					$("#alert_article_picture_2").show("fast");
				}
				else{
					$("#completeUpload2").empty();
					$("#completeUpload2").hide("fast");
					$("#alert_article_picture_2").val("Upload error");
					$("#alert_article_picture_2").show("fast");
				}
				pd.statusbar.empty();
				pd.statusbar.hide();
			},
			onError: function(files,status,errMsg,pd){
				$("#completeUpload2").empty();
				$("#completeUpload2").hide("fast");
				$("#alert_article_picture_2").val("Upload error");
				$("#alert_article_picture_2").show("fast");
				pd.statusbar.empty();
				pd.statusbar.hide();
			}
		});
		$('#userfile3').uploadFile({
			uploadStr:"Chọn hình (s)",
			url:"<?php echo base_url(); ?>admin/uploadify/do_upload_rooms_slide",
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
					htmlText+='<a href="<?php echo base_url().'uploads/rooms/slide_details/'?>'+data.file_name+'" target="_blank"><img src="<?php echo base_url().'uploads/rooms/slide_details/'?>'+data.file_name+'" style="width:100px;height:100px"/></a><br/><input id="slidephotoorder[]" name="slidephotoorder[]"  type="text" style="width:100px;text-align:center" value="'+numPhoto+'" />';
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
<?php $this->load->view('admin/footer-rooms');?>