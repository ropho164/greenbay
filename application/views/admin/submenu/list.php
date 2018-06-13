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
            <div id="iTitle">Danh mục con</div>
            <form id="myform" name="myform" method="post">
              <div id="iMenuAction">
                Có <strong><?=$count?></strong> dòng
                - <a href="<?php echo base_url()."admin/sub_menu/addata/";?>" title="Add new data">Thêm dữ liệu</a> | <a href="javascript:void(0)" onclick="return DelMulti('<?php echo base_url()."admin/sub_menu/delmultirecord";?>')">Xóa dữ liệu chọn</a></div>
              <?php
                if($results && sizeof($results)>0){
				$num = 0;
				?>
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2" id="ListData">
                <tr>
                  <th width="80" nowrap="nowrap"> Mã </th>
                  <th align="left" nowrap="nowrap">Danh mục chính</th>
                  <th align="left" nowrap="nowrap">Tiếng Anh</th>
                  <th align="left" nowrap="nowrap">Tiếng Việt</th>
                  <th nowrap="nowrap" width="50">Thứ tự</th>
                  <th nowrap="nowrap" width="50"><input id='delete' type='hidden' name='delete' value='delete'/>Chọn</th>
                  <th nowrap="nowrap" width="100">Chức năng</th>
                  </tr>
                <?php 
				  foreach($results as $obj){ 
				  $num++
				  ?>
                <tr <?php if(!($num%2)){echo 'class="bgcolor2"';}?>>
                  <td align="center" nowrap="nowrap"><?=$obj['id']?></td>
                  <td align="left" nowrap="nowrap"><?=$obj['category_name_en'].' - '.$obj['category_name_vn']?></td>
                  <td align="left" nowrap="nowrap"><?=$obj['sub_name_en']?></td>
                  <td align="left" nowrap="nowrap"><?=$obj['sub_name_vn']?></td>
                  <td align="center" nowrap="nowrap"><input class="editorder" name="editorder" value="<?=$obj['sub_order']?>" style="width:40px;text-align:center" data="<?=$obj['id']?>"/></td>
                  <td align="center" nowrap="nowrap"><input type='checkbox' name='checkbox[]' id='checkbox[]'  value="<?=$obj['id']?>" /></td>
                  <td align="center" valign="middle" nowrap="nowrap">
                    <a href="<?php echo base_url()."admin/sub_menu/editdata/".$obj['id'];?>"><img src="<?php echo base_url();?>templates/admin/images/b_edit.png" width="16" height="16" border="0" title="Chỉnh sửa thông tin dòng này" alt="Chỉnh sửa thông tin dòng này"  /></a>
                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="return Del(<?=$obj['id']?>,'<?php echo base_url()."admin/sub_menu/delrecord";?>')"><img src="<?php echo base_url();?>templates/admin/images/b_drop.png" width="16" height="16" border="0" title="Xóa dòng này" alt="Xóa dòng này"  /></a>	</td>
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
			data:{id:id,category_order:order},
			url: '<?=base_url()?>admin/sub_menu/updOrder',
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