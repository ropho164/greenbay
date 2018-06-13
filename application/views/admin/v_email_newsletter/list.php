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
            <div id="iTitle">Email nhận bản tin</div>
            <form id="myform" name="myform" method="post">
              <div id="iMenuAction">
                Có <strong><?=$count?></strong> dòng
                -  <a href="javascript:void(0)" onclick="return DelMulti('<?php echo base_url()."admin/c_email_newsletter/delmultirecord";?>')">Xóa dữ liệu chọn</a></div>
              <?php
                if($results && sizeof($results)>0){
				$num = 0;
				?>
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2" id="ListData">
                <tr>
                  <th width="80" nowrap="nowrap"> Mã</th>
                  <th align="left" nowrap="nowrap">Email</th>
                  <th nowrap="nowrap" width="130">Ngày đk email</th>
                  <th nowrap="nowrap" width="80">Đã gửi</th>
                  <th nowrap="nowrap" width="50"><input id='delete' type='hidden' name='delete' value='delete'/>
                    Chọn</th>
                  <th nowrap="nowrap" width="100">Chức năng</th>
                  </tr>
                <?php 
				  foreach($results as $obj){ 
				  $num++
				  ?>
                <tr <?php if(!($num%2)){echo 'class="bgcolor2"';}?>>
                  <td align="center" nowrap="nowrap"><?=$obj['id']?></td>
                  <td align="left" nowrap="nowrap"><?=$obj['cus_email']?></td>
                  <td align="center" nowrap="nowrap"><?=$obj['cus_date']?></td>
                  <td align="center" nowrap="nowrap"><?php
                  	if($obj['cus_send']==1){
						echo 'Yes';
					}
					else{
						echo 'No';
					}
				  ?></td>
                  <td align="center" nowrap="nowrap"><input type='checkbox' name='checkbox[]' id='checkbox[]'  value="<?=$obj['id']?>" /></td>
                  <td align="center" valign="middle" nowrap="nowrap">
                    <a href="<?php echo base_url()."admin/c_email_newsletter/editdata/".$obj['id'];?>"><img src="<?php echo base_url();?>templates/admin/images/b_edit.png" width="16" height="16" border="0" title="edit" alt="edit"  /></a>
                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="return Del(<?=$obj['id']?>,'<?php echo base_url()."admin/c_email_newsletter/delrecord";?>')"><img src="<?php echo base_url();?>templates/admin/images/b_drop.png" width="16" height="16" border="0" title="delete" alt="delete"  /></a>	</td>
                  </tr>
                <?php }?>
                </table>
              </form>
            <?php }else{?>
            <div align="center">Chưa có dữ liệu</div>
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
	
});
function sendEmailTo(id){
	$.ajax({
		data:{id:id},
		url: '<?=base_url()?>admin/c_email_newsletter/sendNewsletter',
		type:"POST",
		dataType:"text",
		success:function(data){
			if(data==-10){
				 alert("Vui lòng đăng nhập lại");	
			}
			if(data==-1){
				alert("Không tìm thấy email default để gửi bản tin.");	
			}
			if(data==-2){
				alert("Không tìm thấy bản tin default để làm nội dung gửi.");	
			}
			if(data==-3){
				alert("Không tìm thấy email người nhận.");	
			}
			if(data==-4){
				alert("Không thể email");	
			}
			if(data==1){
				alert("Gửi bản tin thành công.");	
			}
		}
	});
}
</script>
<?php $this->load->view('admin/footer');?>