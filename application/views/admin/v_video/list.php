<?php $this->load->view('admin/header');?>
<table width="100%" border="0" cellpadding="0" cellspacing="1">  
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200" rowspan="2" align="center" valign="top" style="background:#333">
          <?php $this->load->view('admin/menu_left');?>          </td>
        <td align="center" valign="top" nowrap="nowrap"><div class="welcome">
        <?php $this->load->view('admin/login/check_login_view');?></div></td>
      </tr>
      <tr>
        <td valign="top">
          <div id="contentpage">            
            <div id="iTitle">Video</div>
            <form id="myform" name="myform" method="post">
              <div id="iMenuAction">
                Có <strong><?=$count?></strong> dòng
                - <a href="<?php echo base_url()."admin/c_video/addata/";?>" title="Add new data">Thêm dữ liệu</a> | <a href="javascript:void(0)" onclick="return DelMulti('<?php echo base_url()."admin/c_video/delmultirecord";?>')">Xóa dữ liệu chọn</a></div>
              <?php
                if($results && sizeof($results)>0){
				$num = 0;
				?>
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2" id="ListData">
                <tr>
                  <th width="80" nowrap="nowrap"> Mã </th>
                  <th align="left" nowrap="nowrap">Tên video</th>
                  <th nowrap="nowrap" width="50">Thứ tự</th>
                  <th nowrap="nowrap" width="90">Trạng thái</th>
                  <th nowrap="nowrap" width="50"><input id='delete' type='hidden' name='delete' value='delete'/>Chọn</th>
                  <th nowrap="nowrap" width="100">Chức năng</th>
                  </tr>
                <?php 
				  foreach($results as $obj){ 
				  $num++
				  ?>
                <tr <?php if(!($num%2)){echo 'class="bgcolor2"';}?>>
                  <td align="center" nowrap="nowrap"><?=$obj['id']?></td>
                  <td align="left" valign="top"><?=$obj['title_video']?></td>
                  <td align="center" nowrap="nowrap"><input class="editorder" name="editorder" value="<?=$obj['order_video']?>" style="width:40px;text-align:center" data="<?=$obj['id']?>"/></td>
                  <td align="center" nowrap="nowrap"><?php
                  	if($obj['active_video']==1){
						echo '<img src="'.base_url().'templates/admin/images/active_on.gif" border="0" title="active" alt="active"  />';
					}
					else{
						echo '<img src="'.base_url().'templates/admin/images/active_off.gif" border="0" title="deactive" alt="deactive"  />';
					}
				  ?></td>
                  <td align="center" nowrap="nowrap"><input type='checkbox' name='checkbox[]' id='checkbox[]'  value="<?=$obj['id']?>" /></td>
                  <td align="center" valign="middle" nowrap="nowrap">
                    <a href="<?php echo base_url()."admin/c_video/editdata/".$obj['id'];?>"><img src="<?php echo base_url();?>templates/admin/images/b_edit.png" width="16" height="16" border="0" title="Chỉnh sửa thông tin dòng này" alt="Chỉnh sửa thông tin dòng này"  /></a>
                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="return Del(<?=$obj['id']?>,'<?php echo base_url()."admin/c_video/delrecord";?>')"><img src="<?php echo base_url();?>templates/admin/images/b_drop.png" width="16" height="16" border="0" title="Xóa dòng này" alt="Xóa dòng này"  /></a>	</td>
                  </tr>
                <?php }?>
                </table>
              </form>
            <?php }else{?>
            <div align="center">Không có dữ liệu</div>
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
	$( ".editorder" ).change(function() {
		var order = $( this ).val();
		var id  = $( this ).attr('data');
		$.ajax({
			data:{id:id,order_video:order},
			url: '<?=base_url()?>admin/c_video/updOrder',
			type:"POST",
			dataType:"text",
			success:function(data){
				if(data==1){
					 alert("Update thành công");	
				}
				else{
					alert("Update không thành công");	
				}
			}
		});
	});
});
</script>
<?php $this->load->view('admin/footer');?>