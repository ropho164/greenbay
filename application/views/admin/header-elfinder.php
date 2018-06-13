<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS WEBSITE</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>uploadify/uploadify.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/js/bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/sdmenu/sdmenu.css" />
<link href="<?php echo base_url();?>templates/admin/mng_style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>templates/admin/style/calender.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>templates/js/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>assets/plugins/elFinder/css/elfinder.min.css" rel="stylesheet">
<link href="<?=base_url()?>assets/plugins/elFinder/css/theme.css" rel="stylesheet">
<!-- elfinder css 
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/commands.css"    type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/common.css"      type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/contextmenu.css" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/cwd.css"         type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/dialog.css"      type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/fonts.css"       type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/navbar.css"      type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/places.css"      type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/quicklook.css"   type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/statusbar.css"   type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/theme.css"       type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/toast.css"       type="text/css">
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/elFinder/css/toolbar.css"     type="text/css">
-->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/sdmenu/sdmenu.js" /></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/js/jquery.js" /></script>
<script language="javascript" src="<?php echo base_url();?>templates/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>uploadify/jquery.uploadify-3.1.js" /></script>
<script src="<?php echo base_url();?>templates/js/bootstrap/js/bootstrap.min.js" type="text/javascript"/></script>    
<script type="text/javascript" src="<?php echo base_url();?>templates/js/actions_record/action_db.js" /></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/js/numtostring.js" /></script>
<script src="<?=base_url()?>assets/plugins/elFinder/js/elfinder.full.js" /></script>
<!-- elfinder core 
	<script src="<?=base_url()?>assets/plugins/elFinder/js/elFinder.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/elFinder.version.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/jquery.elfinder.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/elFinder.options.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/elFinder.history.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/elFinder.command.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/elFinder.resources.js"></script>
	-->
	<!-- elfinder dialog
	<script src="<?=base_url()?>assets/plugins/elFinder/js/jquery.dialogelfinder.js"></script>
	-->
	<!-- elfinder default lang 
	<script src="<?=base_url()?>assets/plugins/elFinder/js/i18n/elfinder.en.js"></script>
	-->
	<!-- elfinder ui 
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/button.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/contextmenu.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/cwd.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/dialog.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/fullscreenbutton.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/mkdirbutton.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/navbar.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/overlay.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/panel.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/path.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/places.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/searchbutton.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/sortbutton.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/stat.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/toast.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/toolbar.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/tree.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/uploadButton.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/viewbutton.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/ui/workzone.js"></script>
	-->
	<!-- elfinder commands 
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/archive.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/back.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/copy.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/cut.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/chmod.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/colwidth.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/download.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/duplicate.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/edit.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/extract.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/forward.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/fullscreen.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/getfile.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/help.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/home.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/info.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/mkdir.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/mkfile.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/netmount.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/open.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/opendir.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/paste.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/places.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/quicklook.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/quicklook.plugins.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/reload.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/rename.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/resize.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/rm.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/search.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/sort.js"></script>	
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/up.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/upload.js"></script>
	<script src="<?=base_url()?>assets/plugins/elFinder/js/commands/view.js"></script>
	-->
</head>
<body>