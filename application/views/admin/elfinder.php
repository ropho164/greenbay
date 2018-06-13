<?php $this->load->view('admin/header-elfinder');?>
<table width="100%" border="0" cellpadding="0" cellspacing="1">  
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="200" rowspan="2" align="center" valign="top" style="background:#333">
          <?php $this->load->view('admin/menu_left');?></td>
        <td align="center" valign="top" nowrap="nowrap"><div class="welcome">
        <?php $this->load->view('admin/login/check_login_view');?></div></td>
      </tr>
      <tr>
        <td valign="top">
          <div id="contentpage" style="position: relative;width: 90%;margin: 0 auto">            
            <!--
            <div id="iTitle" style="margin-top: 10px;margin-bottom: 10px;">
            	<input type = "text" name = "galleryimages" id = "galleryimages" style = "display:none"/>
				<a href = "javascript:void(0)" id = "elfinder_button">Add Gallery Images</a>
				<div id = "selectedImages">
				</div>
            </div>
            -->
            <div id="iTitle" style="margin-top: 10px;margin-bottom: 10px;">Quản lý files</div>
            <div id="elfinder" class="clearfix" style="width: 100%;margin: 0 auto;position: relative"></div>
          </div>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {		
	
	var elf = $('#elfinder').elfinder({
		url : '<?=base_url()?>admin/c_fileup/elfinder_init',
		lang : 'en',
		handlers : {
			select : function(event, elfinderInstance) {
				console.log(event.data);
			}
		},
		uiOptions: {
			toolbar : [
				// toolbar configuration
				['open'],
				['back', 'forward'],
				['reload'],
				['home', 'up'],
				['upload'],
				['info'],
				['view']
			]
		},
		contextmenu : {
			files  : [
				'getfile', '|','open', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
				'rm', '|', 'edit', 'rename', '|', 'info'
			]
		},
		width:"100%",
		height:$(window).height()-100
	}).elfinder('instance'); 
	
	$('#elfinder_button').live('click', function() {
	  $('<div id="editor" />').dialogelfinder({
		url : '<?=base_url()?>admin/c_fileup/elfinder_init',
		width: '70%',
		height: '500px',
		resizable: false,
		uiOptions: {
			toolbar : [
				// toolbar configuration
				['home'],
				['reload'],
				['upload'],
				['download'],
				['view'],
				['search']
			]
		},
		contextmenu : {
			files  : [
				'getfile', '|','open', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
				'rm', '|', 'edit', 'rename', '|', 'info'
			]
		},
		getFileCallback: function(file) {
		  var filePath = file.url; //file contains the relative url.
		  var imgPath = "<img src = '"+filePath+"' style='width:100px'/>";
		  var dms ="<br/>W x H: "+file.width+"px x "+file.height+"px";	
		  $('#selectedImages').append(imgPath+dms); //add the image to a div so you can see the selected images
		  $('#editor').remove(); //close the window after image is selected
		}
	  });
	});
});
</script>
</body>
</html>