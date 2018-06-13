<?php
	$this->load->view('admin/header');
	$CI =&get_instance();
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
            <div id="iTitle">Accommodation Intro</div>
            <form id="myform" name="myform" method="post">
              <div id="iMenuAction" style="clear:both">
                Có <strong><?=$count?></strong> dòng
                - <a href="<?php echo base_url()."admin/abouts/addata/".$langue."/".$types;?>" title="Add new data">Thêm dữ liệu</a> | <a href="javascript:void(0)" onclick="return DelMulti('<?php echo base_url()."admin/abouts/delmultirecord";?>')">Xóa dữ liệu chọn</a></div>
                
                <div style="margin-left:60px;float:left;width:90%;clear:both;">
                	<div style="float:left;width:auto;border:1px #CCCCCC solid;padding:5px;height:55px;margin-bottom:5px">
                    Ngôn ngữ:<br/>
                    <select name="article_langue" id="article_langue">
                        <option value="en" <?php if($langue=='en'){?> selected="selected" <?php } ?>>Tiếng Anh</option>
                        <option value="vn" <?php if($langue=='vn'){?> selected="selected" <?php } ?>>Tiếng Việt</option>
                    </select>
                    </div>
                </div>
                <div style="clear:both">
              <?php
                if($results && sizeof($results)>0){
				$num = 0;
				?>
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2" id="ListData">
                <tr>
                  <th width="50" nowrap="nowrap">Mã</th>
                  <th width="110" align="left" nowrap="nowrap">Hình đại diện</th>
                  <th align="left" nowrap="nowrap">Tiêu đề</th>
                  <th nowrap="nowrap" width="80">Trạng thái</th>
                  <th width="50" align="center" nowrap="nowrap"><input id='delete' type='hidden' name='delete' value='delete'/>Chọn</th>
                  <th nowrap="nowrap" width="100">Chức năng</th>
                  </tr>
                <?php 
				  foreach($results as $obj){ 
				  $num++
				  ?>
                <tr <?php if(!($num%2)){echo 'class="bgcolor2"';}?>>
                  <td align="center" nowrap="nowrap"><?=$obj['id']?></td>
                  <td align="left" nowrap="nowrap"><img src="<?=base_url().$obj['article_picture_1']?>" height="90" border="0" style="border:1px #333333 solid;margin:5px 5px 5px 5px"  /></td>
                  <td align="left" valign="top"><div style="margin:5px 5px 5px 5px">
                    <div style="font-weight:bold;color:#0f9e4a;clear:both"><?php echo $obj['article_title_1'];?></div>
                    <div style="font-weight:bold;color:#454545;clear:both"><?php echo $obj['article_title'];?></div>
                    <div style="font-weight:bold;color:#454545;clear:both"><?php echo word_limiter($obj['article_desc'],30);?></div>
                  </div></td>
                  <td align="center" nowrap="nowrap">
                    <?php
                  	if($obj['article_status']==1){
						echo '<img src="'.base_url().'templates/admin/images/active_on.gif" border="0" title="active" alt="active"  />';
					}
					else{
						echo '<img src="'.base_url().'templates/admin/images/active_off.gif" border="0" title="deactive" alt="deactive"  />';
					}
				  ?>
                  </td>
                  <td align="center" valign="middle" nowrap="nowrap"><input type='checkbox' name='checkbox[]' id='checkbox[]'  value="<?=$obj['id']?>" /></td>
                  <td align="center" valign="middle" nowrap="nowrap">
                   <a href="<?php echo base_url()."admin/abouts/editdata/".$obj['id'];?>"><img src="<?php echo base_url();?>templates/admin/images/b_edit.png" width="16" height="16" border="0" title="Chỉnh sửa thông tin dòng này" alt="Chỉnh sửa thông tin dòng này"  /></a>
                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="return Del(<?=$obj['id']?>,'<?php echo base_url()."admin/abouts/delrecord";?>')"><img src="<?php echo base_url();?>templates/admin/images/b_drop.png" width="16" height="16" border="0" title="Xóa dòng này" alt="Xóa dòng này"  /></a>
                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="return DuplicateRow('id',<?=$obj['id']?>,'<?php echo base_url()."admin/abouts/duplicaterow";?>')"><img src="<?php echo base_url();?>templates/admin/images/import-icon.png" width="16" height="16" border="0" title="Copy dòng này" alt="Copy dòng này"  /></a>	
                    </td>
                  </tr>
                <?php }?>
                </table>
                </div>
              </form>
            <?php }else{?>
            <div align="center" style="clear:both">Không có dữ liệu</div>
            <?php }?>
            <hr />
            <div id="iPaging"><?php echo $links; ?></div>
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
	$(document).ready(function () {
		$("#article_langue").change(function () {
	          window.location = "<?=base_url()?>admin/abouts/fillter/"+$(this).val()+"/<?=$types?>";
		});
	});
</script>
<?php $this->load->view('admin/footer');?>