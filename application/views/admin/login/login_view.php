<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login CMS</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/website/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/login.css" />
<script src="<?php echo base_url();?>templates/website/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url();?>templates/website/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="item-container-fluid">
    <div class="item-row-fluid">
        <div class="loginform">
            <?php 
            $attributes = array('id'=>'myform','name'=>'myform');
            echo form_open(base_url().'admin/verifylogin',$attributes); 
            ?>
            <div class="login-hearder"><img src="<?php echo base_url();?>templates/admin/images/LoginBanner.jpg" tyle="width:100%;height:auto"></div>
            <div class="login-row clearfix">
                <label class="col-md-3" for="uemail">Email:</label>
                <div class="col-md-9"> <input type="email" class="form-control" id="uemail" name="uemail"></div>
              </div>
              <div class="login-row clearfix">
                <label class="col-md-3" for="upassword">Password:</label>
                <div class="col-md-9"> <input type="password" class="form-control" id="upassword" name="upassword"></div>
              </div>
              <div class="login-row clearfix">
                <label class="col-md-3" for="upassword"></label>
                <div class="col-md-9"><button type="submit" class="btn btn-primary">Login</button></div>
              </div>
              <div class="login-row text-center clearfix" style="color:#FF0000"><?php echo form_error('uemail'); ?><?php echo form_error('upassword'); ?></div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
