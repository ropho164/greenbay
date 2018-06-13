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
            <div id="iTitle">Photos</div>
            <form id="myform" name="myform" method="post">
              <div id="iMenuAction" style="clear:both">
                Có <strong><?=$count?></strong> dòng
                - <a href="<?php echo base_url()."admin/photos/addata";?>" title="Add new data">Thêm dữ liệu</a></div>
              <div style="clear:both">
			  <?php
                if($results && sizeof($results)>0){
				$num = 0;
				?>
              <table width="90%" border="0" align="center" cellpadding="0" cellspacing="2" id="ListData">
                <tr>
                  <td>
						<div style="width: 100%;margin: 0 auto">
						 <?php 
						  foreach($results as $obj){ 
						  $num++
						  ?> 
							<div class="col-xs-3" style="padding-left: 5px;padding-right: 5px;position: relative">
								<img src="<?php echo base_url();?>uploads/photos/thumb/<?=$obj['article_picture_1']?>"  class="img-responsive" style="border:1px #333333 solid;margin:5px 0px 0px 0px"  />
								<div style="width: 40px;margin: 3px auto">
										<input class="editorder" name="editorder" value="<?=$obj['order_article']?>" style="width:40px;text-align:center" data="<?=$obj['id']?>"/>
								</div>
								<div style="position: absolute;top: 20px;left: 20px;">
									<a href="javascript:void(0)" onclick="return Del(<?=$obj['id']?>,'<?php echo base_url()."admin/photos/delrecord";?>')"><img src="<?php echo base_url();?>templates/admin/images/b_drop.png" width="16" height="16" border="0" title="Xóa dòng này" alt="Xóa dòng này"  /></a>
								</div>         			
							</div>
						<?php } ?>
					 </div>
                 	</td>
                  </tr>
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
		$( ".editorder" ).change(function() {
			var order = $( this ).val();
			var id  = $( this ).attr('data');
			$.ajax({
				data:{id:id,order_article:order},
				url: '<?=base_url()?>admin/photos/updOrder',
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
		$( ".editview" ).change(function() {
			var article_view = $( this ).val();
			var id  = $( this ).attr('data');
			$.ajax({
				data:{id:id,article_view:article_view},
				url: '<?=base_url()?>admin/photos/updView',
				type:"POST",
				dataType:"text",
				success:function(data){
					if(data==1){
						 alert("Update lượt xem thành công");	
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