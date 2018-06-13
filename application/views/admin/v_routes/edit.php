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
            <div id="iTitle">Cập nhật danh mục</div><br/>
            <?php 
			$attributes = array('id'=>'myform','name'=>'myform');
			echo form_open('admin/c_routes/proeditdata',$attributes); 
			?>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="ListData">
              <tr>
                <td width="20">&nbsp;</td>
                <td width="200">&nbsp;</td>
                <td align="left"><input type="hidden" name="idget" id="idget" value="<?=$results_data_edit[0]['id']?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Controller<sup>*</sup></td>
                <td align="left">
                	<select name="sl_controller" id="sl_controller" class="form-control">
                     	<?php
						if(isset($control)){
							foreach($control as $obj){
								$sel = "";
								if($results_data_edit[0]['controller']==$obj['keyc']){
									$sel = "selected";
								}
								echo '<option value="'.$obj['keyc'].'" '.$sel.'>'.$obj['lablec'].'</option>';
							}
						}
					 ?>
                    </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td nowrap="nowrap">Url friendly<sup>*</sup></td>
                <td align="left">
                  <input name="txt_slug" type="text" id="txt_slug" value="<?=$results_data_edit[0]['slug']?>" class="form-control" placeholder="Enter url friendly" ></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left"><span class="errorValidate"><?php echo form_error('txt_slug'); ?></span></td>
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
                <td colspan="2">
				<div><span class="success">
				<?php if(isset($b_Check) && $b_Check == true){
					if($b_Check_Ins==1){
						echo "Insert data succes.";
					}
				}?></span></div>
                </td>
                </tr>
            </table>
            </form>
          </div>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php $this->load->view('admin/footer');?>