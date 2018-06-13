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
            <div id="iTitle">Tài khoản hệ thống</div>
            <form id="myform" name="myform" method="post">
              <div id="iMenuAction">
                Có <strong><?=$count?></strong> dòng
                - <a href="<?php echo base_url()."admin/account_system/addata";?>" title="Thêm dữ liệu">Thêm dữ liệu</a> | <a href="javascript:void(0)" onclick="return DelMulti('<?php echo base_url()."admin/account_system/delmultirecord";?>')">Xóa dữ liệu chọn</a></div>
              <?php
                if($results && sizeof($results)>0){
				$num = 0;
				?>
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2" id="ListData">
                <tr>
                  <th width="80" nowrap="nowrap"> Mã</th>
                  <th align="left" nowrap="nowrap">Email</th>
                  <th align="left" nowrap="nowrap">Họ &amp; Tên</th>
                  <th align="left" nowrap="nowrap">Vai trò</th>
                  <th nowrap="nowrap" width="100">Trạng thái</th>
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
                  <td align="left" nowrap="nowrap"><?=$obj['uemail']?></td>
                  <td align="left" nowrap="nowrap"><?=$obj['ufname']?></td>
                  <td align="left" nowrap="nowrap"><strong><?=$obj['role_name']?></strong></td>
                  <td align="center" nowrap="nowrap">
                  <?php
                  	if($obj['uactive']==1){
						echo '<img src="'.base_url().'templates/admin/images/active_on.gif" border="0" title="active" alt="active"  />';
					}
					else{
						echo '<img src="'.base_url().'templates/admin/images/active_off.gif" border="0" title="deactive" alt="deactive"  />';
					}
				  ?>
                  </td>
                  <td align="center" nowrap="nowrap"><input type='checkbox' name='checkbox[]' id='checkbox[]'  value="<?=$obj['id']?>" /></td>
                  <td align="center" valign="middle" nowrap="nowrap">
                    <a href="<?php echo base_url()."admin/account_system/editdata/".$obj['id'];?>"><img src="<?php echo base_url();?>templates/admin/images/b_edit.png" width="16" height="16" border="0" title="edit" alt="edit"  /></a>
                    &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="return Del(<?=$obj['id']?>,'<?php echo base_url()."admin/account_system/delrecord";?>')"><img src="<?php echo base_url();?>templates/admin/images/b_drop.png" width="16" height="16" border="0" title="delete" alt="delete"  /></a>	</td>
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
<?php $this->load->view('admin/footer');?>