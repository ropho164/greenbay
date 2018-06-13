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
            <div id="iTitle">Danh sách đặt phòng</div>
            <form id="myform" name="myform" method="post">
              <div id="iMenuAction">
                Có <strong><?=$count?></strong> dòng
                -  <a href="javascript:void(0)" onclick="return DelMulti('<?php echo base_url()."admin/c_booking/delmultirecord";?>')">Xóa dữ liệu chọn</a></div>
              <?php
                if($results && sizeof($results)>0){
				$num = 0;
				?>
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2" id="ListData">
                <tr>
                  <th width="50" nowrap="nowrap"> Mã </th>
                  <th width="60" align="left">Mã GD</th>
                  <th width="150" align="left">Người đặt</th>
                  <th align="left" nowrap="nowrap"> Loại phòng</th>
                  <th nowrap="nowrap" width="70">Ngày đến</th>
                  <th nowrap="nowrap" width="70">Ngày đi</th>
                  <th nowrap="nowrap" width="120">Thanh toán</th>
                  <th nowrap="nowrap">Trạng thái</th>
                  <th nowrap="nowrap" width="50"><input id='delete' type='hidden' name='delete' value='delete'/>Chọn</th>
                  <th nowrap="nowrap" width="100">Chức năng</th>
                  </tr>
                <?php 
				  foreach($results as $obj){ 
				  $num++
				  ?>
                <tr <?php if(!($num%2)){echo 'class="bgcolor2"';}?>>
                  <td align="center" nowrap="nowrap"><?=$obj['id']?></td>
                  <td align="left" valign="middle"><?=$obj['trans_number']?></td>
                  <td align="left" valign="middle"><?=$obj['fname']?></td>
                  <td align="left" valign="middle"><?=$obj['room_name']?></td>
                  <td align="center" nowrap="nowrap"><?=$obj['date_from']?></td>
                  <td align="center" nowrap="nowrap"><?=$obj['date_to']?></td>
                  <td align="center" nowrap="nowrap"><strong>
                    <?=smarty_vnd($obj['booking_prepayment'])?>
                  </strong></td>
                  <td align="center" nowrap="nowrap">
				  <?php
                  	if($obj['booking_status']==0){
						echo '<span style="color:#F00">Chưa xử lý</span>';
					}
					if($obj['booking_status']==1){
						echo '<strong><span style="color:#0000FF">Đã xử lý</span></strong>';
					}
					if($obj['booking_status']==2){
						echo '<span style="color:#0000FF">Đã xử lý & Gửi Mail</span>';
					}
				  ?></td>
                  <td align="center" nowrap="nowrap"><input type='checkbox' name='checkbox[]' id='checkbox[]'  value="<?=$obj['id']?>" /></td>
                  <td align="center" valign="middle" nowrap="nowrap">
                    <a href="<?php echo base_url()."admin/c_booking/editdata/".$obj['id'];?>"><img src="<?php echo base_url();?>templates/admin/images/b_edit.png" width="16" height="16" border="0" title="Cập nhật nội dung liên hệ" alt="Cập nhật nội dung liên hệ"  /></a>
                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="return Del(<?=$obj['id']?>,'<?php echo base_url()."admin/c_booking/delrecord";?>')"><img src="<?php echo base_url();?>templates/admin/images/b_drop.png" width="16" height="16" border="0" title="Xóa dữ liệu" alt="Xóa dữ liệu"  /></a>	</td>
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
<?php $this->load->view('admin/footer');?>