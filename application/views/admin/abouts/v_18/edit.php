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
			echo form_open('admin/abouts/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /><input type="hidden" name="article_intro_type" id="article_intro_type" value="<?=$results_data_edit[0]['article_intro_type']?>" /><input type="hidden" name="article_parent" id="article_parent" value="<?=$results_data_edit[0]['article_parent']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Ngôn ngữ bài viết<sup>*</sup></td>
                <td align="left">
                	<select name="article_langue" id="article_langue" style="width:360px;resize:none">
                        <option value="en" <?php if($results_data_edit[0]['article_langue']=='en'){?> selected="selected" <?php }?>>Tiếng Anh</option>
                        <option value="vn" <?php if($results_data_edit[0]['article_langue']=='vn'){?> selected="selected" <?php }?>>Tiếng Việt</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề  (1)<sup>*</sup></td>
                <td align="left"><input type="text" name="article_title_1" id="article_title_1" style="width:680px;resize:none" placeholder="Tiêu đề (1)" value="<?=$results_data_edit[0]['article_title_1']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('article_title_1'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề (2)<sup>*</sup></td>
                <td align="left"><input type="text" name="article_title" id="article_title" style="width:680px;resize:none" placeholder="Tiêu đề (2)" value="<?=$results_data_edit[0]['article_title']?>"/></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left">
                  <div class="errorValidate"><?php echo form_error('article_title'); ?></div>  
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td valign="top" nowrap="nowrap">Giới thiệu<sup>*</sup></td>
                <td align="left">
                  <textarea name="article_desc" rows="8" id="article_desc" style="width:680px;resize:none" placeholder="Enter description"><?=$results_data_edit[0]['article_desc']?></textarea>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left"><div class="errorValidate"><?php echo form_error('article_desc'); ?></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Hình 1<sup>*</sup><br />
                  (Size: 1600px x 706px)
                  </td>
                <td align="left">
                  <div class="row" style="z-index: 0">
                    <div class="col-xs-6">
                      <div class="input-group">
                        <input name="article_picture_1" id="article_picture_1" type="text" class="form-control input-sm" placeholder="Vui lòng chọn ảnh" readonly value="<?=$results_data_edit[0]['article_picture_1']?>">
                        <span class="input-group-btn">
                          <button id="elfinder_button" data-width="1600" data-height="706" class="btn btn-sm" type="button">Files...</button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">
                <div class="errorValidate"><?php echo form_error('article_picture_1'); ?></div>					
             	</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><div id = "selectedImages"></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Hình 2<sup>*</sup><br />
                  <span class="errorValidate">(3 hình - 180px x 180px)</span>
                  </td>
                <td align="left">
					<div class="row" style="z-index: 0">
						<div class="col-xs-6">
						  <div class="input-group">
							  <input name="list_files" id="list_files" type="text" class="form-control input-sm" placeholder="Vui lòng chọn 3 hình size 180x180(px)" readonly value="<?=sizeof($results_data_photo)?>">
							  <span class="input-group-btn">
								<button id="elfinder_button_small" data-width="180" data-height="180" class="btn btn-sm" type="button">Files...</button>
							  </span>
						</div>
					  </div>
					</div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">
                <div class="errorValidate"><?php echo form_error('list_files'); ?><div>					
             	</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">
					<div id="listPhoto" style="clear:both;text-align:left;position:relative">
						<?php
						if($results_data_photo && sizeof($results_data_photo)>0){
							foreach($results_data_photo as $objPhoto){
							  echo '<div class="photo_action_'.$objPhoto['id'].'" style="position:relative;float:left;margin-right:5px">';
							  echo '<a href="'.base_url().$objPhoto['pro_photo'].'" target="_blank"><img name="photoready[]" src="'.base_url().$objPhoto['pro_photo'].'" style="width:100px;height:100px"/></a><br/><input class="editorder" type="text" style="width:100px;text-align:center" value="'.$objPhoto['pro_photo_order'].'" data="'.$objPhoto['id'].'" />';
							  echo '<div class="photo_action_'.$objPhoto['id'].'" data="'.$objPhoto['id'].'" style="position:absolute;top:5px;right:5px;width:20px;height:auto">';
							  echo '<a class="delact" href="javascript:void(0)"><img src="'.base_url().'templates/admin/images/b_del_icon.png" width="20" height="20" border="0"/></a>';
                              echo '</div>';
							  echo '</div>';
						  }
						} 
						if(count($list_photo) > 0){
							for($i=0;$i<count($list_photo);$i++){
								echo '<div class="photo_action_current_'.$i.'" style="position:relative;float:left;margin-right:5px">';
								echo '<input class="photo_action_current_'.$i.'" name="slidephoto[]" id="slidephoto[]" type="hidden" value="'.$list_photo[$i].'" />';
								echo '<a href="'.base_url().$list_photo[$i].'" target="_blank"><img src="'.base_url().$list_photo[$i].'" style="width:100px;height:100px"/></a><br/><input id="slidephotoorder[]" name="slidephotoorder[]"  type="text" style="width:100px;text-align:center" value="'.($i+1).'" />';
								echo '<div class="photo_action_current_'.$i.'" style="position:absolute;top:5px;right:5px;width:20px;height:auto"><a class="delact_current" href="javascript:void(0)"><img src="'.base_url().'templates/admin/images/b_del_icon.png" width="20" height="20" border="0"/></a></div>';
								echo '</div>';
							}
						}
						$totalCount = sizeof($results_data_photo) + count($list_photo);
					?>
					</div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Thứ tự<sup>*</sup></td>
                <td align="left"><input name="article_order" type="text" id="article_order" style="width:50px;resize:none;text-align: center" value="<?=$results_data_edit[0]['article_order']?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('article_order'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
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
		var limitFile = 3;
		var numPhoto = <?=($totalCount)>0?$totalCount:0?>;
		var photoSizeOf = $('img[name="photoready[]"]').length + $('input[name="slidephoto[]"]').length;
		$("#article_post_date").datepicker({dateFormat: 'yy-mm-dd'});
		$('#elfinder_button').live('click', function() {
			var sizeW = $(this).attr("data-width");
			var sizeH = $(this).attr("data-height");
		  $('<div id="editor" />').dialogelfinder({
			url : '<?=base_url()?>get_image/files',
			width: '70%',
			height: '500px',
			resizable: false,
			multiple: true,
			uiOptions: {
				toolbar : [
					// toolbar configuration
					['home'],
					['reload'],
					['upload'],
					['download'],
					['view'],
					['search']
				]
			},
			contextmenu : {
				files  : [
					'getfile', '|','open', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
					'rm', '|', 'edit', 'rename', '|', 'info'
				]
			},
			getFileCallback: function(file) {
				$('#selectedImages').empty();	
				var fileUrlSite = (file.path).replace(/\\/g, "\/")
				if(sizeW == file.width && sizeH == file.height){
					$("#article_picture_1").val(fileUrlSite);
			  		var imgPath = "<img src = '<?=base_url()?>"+fileUrlSite+"' style='width:100px'/>";
			  		$('#selectedImages').append(imgPath);
				}
				else{
					$("#article_picture_1").val("");
					var dms ="<span class='errorValidate'>Ảnh chọn có kích thước: <strong>("+file.width+"px x "+file.height+"px)</strong> không đúng qui định</span>";
					$('#selectedImages').append(dms);
					
				}
				console.log(file);
			  $('#editor').remove();
			}
		  });
		});
		if($("#article_picture_1").val()!=""){
			var imgPath = "<img src = '<?=base_url()?>"+$("#article_picture_1").val()+"' style='width:100px'/>";
			$('#selectedImages').append(imgPath);
		}
		/*Small list*/
		$('#elfinder_button_small').live('click', function() {
			var sizeW = $(this).attr("data-width");
			var sizeH = $(this).attr("data-height");
		   $('<div id="editor_small" />').dialogelfinder({
			url : '<?=base_url()?>get_image/files',
			width: '70%',
			height: '500px',
			resizable: false,
			commandsOptions:{
                getfile:{
                    multiple: true,
					folders: true
                }
            },
			uiOptions: {
				toolbar : [
					// toolbar configuration
					['home'],
					['reload'],
					['upload'],
					['download'],
					['view'],
					['search']
				]
			},
			contextmenu : {
				files  : [
					'getfile', '|','open', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
					'rm', '|', 'edit', 'rename', '|', 'info'
				]
			},
			getFileCallback: function(file) {
				var urls = $.map(file, function(f) { return f; });
				$.each(urls, function( index, value ) {
				  	var htmlText = "";
					if( photoSizeOf < limitFile ){
						numPhoto++;
						var urlFile = (value.path).replace(/\\/g, "\/");					
						htmlText+='<div class="photo_action_current_'+numPhoto+'" style="position:relative;float:left;margin-right:5px">';
						htmlText+='<a href="<?php echo base_url()?>'+urlFile+'" target="_blank"><img src="<?php echo base_url()?>'+urlFile+'" style="width:100px;height:100px"/></a><br/><input id="slidephotoorder[]" name="slidephotoorder[]"  type="text" style="width:100px;text-align:center" value="'+numPhoto+'" />';
						htmlText+='<div class="photo_action_current_'+numPhoto+'" data="'+numPhoto+'" style="position:absolute;top:5px;right:5px;width:20px;height:auto"><a class="delact_current" href="javascript:void(0)"><img src="<?=base_url()?>templates/admin/images/b_del_icon.png" width="20" height="20" border="0"/></a></div>';
						htmlText+='<input class="photo_action_current_'+numPhoto+'" name="slidephoto[]" id="slidephoto[]" type="hidden" value="'+urlFile+'" />';
						htmlText+='</div>';
						$("#listPhoto").append(htmlText);
						photoSizeOf = $('img[name="photoready[]"]').length + $('input[name="slidephoto[]"]').length;
						$("#list_files").val(photoSizeOf);
					}
					else{
						$('#elfinder_button_small').attr("disabled","disabled");
					}
				});
				//console.log(urls[0]);
				//$('#listPhoto').append(urls.length+"-"+urls[0].width+"x"+urls[0].height+"<br/>"+(urls[0].path).replace(/\\/g, "\/"));
			  $('#editor_small').remove();
			}
		  });
		});
		/*End list*/
		$( ".delact" ).live( "click", function() {
			var key = $( this ).parents().attr('data');
			var classname = $( this ).parents().attr('class');
			var answer = confirm("Bạn có chắc xóa dữ liệu đã này không?")
			if (answer){
				$.ajax({
					data:{id:key},
					url: '<?=base_url()?>admin/abouts/delrecordphoto',
					type:"POST",
					dataType:"text",
					success:function(data){
						if(data==1){
							$( "."+classname ).remove();
							photoSizeOf = $('img[name="photoready[]"]').length + $('input[name="slidephoto[]"]').length;
							$("#list_files").val(photoSizeOf);
							if($("#list_files").val()<limitFile){
								$('#elfinder_button_small').removeAttr("disabled");
							}
						}
						else{
							alert("Không thể xóa được dữ liệu.");	
						}
					}
				});
			}
			else{
				return false;
			}
		});
		$( ".delact_current" ).live( "click", function() {
			var classname = $( this ).parents().attr('class');
			var answer = confirm("Bạn có chắc xóa dữ liệu đã này không?")
			if (answer){
				$( "."+classname ).remove();
				photoSizeOf = $('img[name="photoready[]"]').length + $('input[name="slidephoto[]"]').length;
				$("#list_files").val(photoSizeOf);
				if($("#list_files").val()<limitFile){
					$('#elfinder_button_small').removeAttr("disabled");
				}
			}
			else{
				return false;
			}
	   });
    }); 
</script>
<?php $this->load->view('admin/footer');?>