<?php $this->load->view('admin/header', $page_title);?>
<style>
	pre { font-size: 1.1em; }
	hr { margin: 20px; }
	a { color: #003399; background-color: transparent; font-weight: normal; }

	h1 { color: #444; background-color: transparent; border-bottom: 1px solid #D0D0D0; font-weight: bold; margin: 24px 0 2px 0; padding: 5px 0 6px 0; }

	form { display: inline; }
	input[type=submit] { border: 1px solid #D0D0D0; margin: 1em; font-weight: bold; font-size: 1.2em;  padding: .5em;}
	button, input, optgroup, select, textarea{width: 100%}
	.translator_table_header { font-size: 1.5em; font-weight: bold; background: none; border-bottom: 1px solid  #D0D0D0;min-width: 180px; }
	.translator_error { color: #f00; font-weight: bold; }
	.translator_note { color: #0f0; font-weight: bold; }
</style>
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
          <div id="contentpage" style="width: 100%">            
           <div style="padding: 10px 30px;">
           	<?php $this->load->view($page_content);?>
           </div>
          </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
$this->load->view('admin/footer');
?> 
