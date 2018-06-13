<?php $this->load->view('admin/header');?>
<?php 
$langue = ($this->uri->segment($this->config->item('idgroup'))) ? $this->uri->segment($this->config->item('idgroup')) : 'vn';
$CI =&get_instance();
?>
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
            <div id="iTitle">Thông tin liên hệ website</div>
            <form id="myform" name="myform" method="post">
              <div id="iMenuAction">
                Có <strong><?=$count?></strong> dòng
                <?php if($count<=0){?>
                - <a href="<?php echo base_url()."admin/c_infocontact/addata/".$langue;?>" title="Add new data">Thêm dữ liệu</a>
                <?php }?>
              </div>
              <div style="margin-left:60px;float:left;width:90%;clear:both;">
                	<div style="float:left;width:auto;border:1px #CCCCCC solid;padding:5px;height:55px;margin-bottom:5px">
                    Ngôn ngữ:<br/>
                    <select name="article_langue" id="article_langue">
                        <option value="en" <?php if($langue=='en'){?> selected="selected" <?php } ?>>Tiếng Anh</option>
                        <option value="vn" <?php if($langue=='vn'){?> selected="selected" <?php } ?>>Tiếng Việt</option>
                    </select>
                    </div>
                </div>
              <?php
                if($results && sizeof($results)>0){
				$num = 0;
				?>
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2" id="ListData">
                <tr>
                  <th width="80" nowrap="nowrap"> Mã </th>
                  <th align="left">Tiêu đề</th>
                  <th nowrap="nowrap" width="100">Chức năng</th>
                  </tr>
                <?php 
				  foreach($results as $obj){ 
				  $num++
				  ?>
                <tr <?php if(!($num%2)){echo 'class="bgcolor2"';}?>>
                  <td align="center" nowrap="nowrap"><?=$obj['id']?></td>
                  <td align="left" nowrap="nowrap"><?=$obj['info_title']?></td>
                  <td align="center" valign="middle" nowrap="nowrap">
                    <a href="<?php echo base_url()."admin/c_infocontact/editdata/".$obj['id'];?>"><img src="<?php echo base_url();?>templates/admin/images/b_edit.png" width="16" height="16" border="0" title="Chỉnh sửa thông tin dòng này" alt="Chỉnh sửa thông tin dòng này"  /></a></td>
                  </tr>
                <?php }?>
                </table>
              </form>
            <?php }else{?>
            <div style="clear:both;padding:20px;text-align:center">Không có dữ liệu</div>
            <?php }?>
            
            <div id="iPaging"><?php echo $links; ?></div>
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
    $(document).ready(function () {
		$("#article_langue").change(function () {
			var mainid = $(this).val();
			if (mainid != '') {
	            window.location = "<?=base_url()?>admin/c_infocontact/fillter/"+mainid;
        	}
        	return false;
		});
	});
</script>
<?php $this->load->view('admin/footer');?>