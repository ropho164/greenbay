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
            <div id="iTitle">Trả lời thông tin liên hệ</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_contact/proansdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td height="40">&nbsp;</td>
                <td colspan="2" align="left" valign="top"><strong><span style="font-size:16pt">Nội dung khách hàng liên hệ</span></strong></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="middle"><strong>Thông tin người liên hệ</strong></td>
                <td align="left"><table width="100%" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="150"><strong>Tên:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['cus_name']?>
                    </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Email:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['cus_email']?>
                      </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Điện thoại:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['cus_phone']?>
                    </strong></td>
                  </tr>
                  <tr>
                    <td><strong>Ngày gửi:</strong></td>
                    <td><strong>
                      <?=$results_data_edit[0]['cus_date']?>
                      </strong></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top"><strong>Tiêu đề liên hệ</strong></td>
                <td align="left" valign="top"><strong><?=$results_data_edit[0]['cus_title']?></strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left" valign="top"><strong>Nội dung câu hỏi</strong></td>
                <td align="left" valign="top"><?=html_entity_decode($results_data_edit[0]['cus_cont'])?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2"><hr/></td>
              </tr>
              
              <tr>
                <td>&nbsp;</td>
                <td colspan="2"><strong><span style="font-size:16pt">Nội dung trả lời từ Paramax</span></strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Gửi tới email</td>
                <td align="left"><input name="cus_mail_to" type="text" id="cus_mail_to" placeholder="Email người dùng" style="width:500px;resize:none" value="<?=$results_data_edit[0]['cus_email']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('cus_mail_to'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Tiêu đề trả lời</td>
                <td align="left"><input name="cus_title_ans" type="text" id="cus_title_ans" placeholder="Tiêu đề trả lời" style="width:500px;resize:none" value="<?=$results_data_edit[0]['cus_title_ans']?>" /></td>
              </tr>
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('cus_title_ans'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Nội dung trả lời</td>
                <td align="left"><textarea name="cus_cont_ans" rows="5" id="cus_cont_ans" style="width:700px;resize:none" placeholder="nội dung trả lời"><?=str_ireplace('\r\n','',$results_data_edit[0]['cus_cont_ans'])?></textarea><?php echo display_ckeditor($ckeditor); ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span class="errorValidate"><?php echo form_error('cus_cont_ans'); ?></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Chức năng</td>
                <td>
                  <select name="slFunction" id="slFunction">
                    <option value="0">Lưu nội dung</option>
                    <option value="1">Lưu nội dung và sendmail</option>
                  </select>
                  </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><span id="txtemail"></span></td>
                <td><div id="contentemail"></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Thực hiện" class="btn_save"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2">
				<div><span class="success">
                <?php if(isset($b_Check) && $b_Check == true){
					if($b_Check_Ins==1){
						echo "Thêm dữ liệu thành công.";
					}
					elseif($b_Check_Ins==-2){
						echo "Không tìm thấy cấu hình email gừi";
					}
					elseif($b_Check_Ins==-400){
						echo "Không thể send email đến người nhận hoặc email người nhận không tồn tại.";
					}
				}?></span></div>
                </td>
                </tr>
          </table>
            </form>
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<script language="javascript">
$(document).ready(function () {
	 $("#slFunction").change(function () {
			$("#content_txt_ans").empty();
			var act = $(this).val();
			if(act==1){
				loadAllMail();
			}
			else{
				$("#contentemail").empty();
				$("#txtemail").empty();	
			}
	 });
});
function loadAllMail(){
	var htmlText = "";
	$("#contentemail").empty();
	$("#txtemail").empty();	
	$.ajax({
		type:"get",
		url:"<?=base_url()?>admin/c_contact/getAllMail",
		dataType:"json",
		success:function(data){
			if(data.length>0){					
				$("#contentemail").append('<select name="slEmail" id="slEmail" style="width:360px;resize:none"></select>');
				$.each(data,function(i,value) {
					htmlText+='<option value="'+data[i].id+'">'+data[i].smtp_name+' - '+data[i].smtp_user+'</option>';
				});
				$("#slEmail").append(htmlText);
				$("#txtemail").append('Sử dụng email trả lời');	
			}
			else{
				$("#contentemail").empty();
				$("#txtemail").empty();	
				$("#contentemail").append('Không có email');	
			}
		}
	});	
}
</script>
<?php $this->load->view('admin/footer');?>