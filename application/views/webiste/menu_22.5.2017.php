<?php
$ci_submenu = &get_instance();
?>
<div id="menu_fix_page" class="navbar navbar-default container-menu navbar-fixed-top" role="navigation">
	<div class="container-fluid">
    <div class="info-hearer pull-right">
        <div class="icon_line pull-right">
            <button type="button" class="btn btn-default btn-square"><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i></button>
			<a href="<?=base_url().$this->lang->line('key')?>/contact-us"><span class="link_header_font">Map & direction</span></a>
        </div>
        <div class="icon_line pull-right">
            <button type="button" class="btn btn-default btn-circle"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></button>
            <span class="link_header_font">Email: info@greenbayphuquocresort.com</span>
        </div>
        <div class="icon_line pull-right">
            <button type="button" class="btn btn-default btn-circle"><i class="fa fa-phone" aria-hidden="true"></i></button>
            <span class="link_header_font">Tel (+84) 3929 1989</span>
        </div>
    </div>
    <div class="navbar-header">
		<div class="navbar-brand"><div class="navbar-brand-parent"><a href="<?php echo base_url().$language?>/home"><img src="<?=base_url()?>templates/website/images/logo.png"/></a></div></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
        <div class="navbar-toggle" style="padding-top:8px;">
        	<?php
        	if($language=="en") echo '<a href="'.base_url().'vn/home"><img src="'.base_url().'templates/website/images/langu_vn.png"></a>';
        	else echo'<a href="'.base_url().'en/home"><img src="'.base_url().'templates/website/images/langu_en.png"></a>';
        	?>
        </div>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">	
		<?php
			if($results_main_menu && sizeof($results_main_menu)>0){
				foreach($results_main_menu as $objMenuMain){
					$result_sub_menu = $ci_submenu->getSubMenu($objMenuMain['id']);
					if($result_sub_menu && sizeof($result_sub_menu)>0){
						$csub = 0;
						?>
                        <li id="drop-<?=$objMenuMain['id']?>" class="dropdown <?=$objMenuMain['category_lnk']?> has-child">
                        	<a href="<?php echo base_url().$language.'/'.$objMenuMain['category_lnk'];?>"><?=$objMenuMain['category_name_'.$this->lang->line('key')]?></a>
                        	<div class="menu-toogle-arrow" data-id="<?=$objMenuMain['id']?>"><span class="glyphicon glyphicon-plus"></span>
                        	</div>
                        	<ul class="dropdown-menu">
                            	<?php
								foreach($result_sub_menu as $objMenuSub){
									$csub++;
									echo '<li class="no-child"><a href="'.base_url().$language.'/'.$objMenuMain['category_lnk'].'/'.$objMenuSub['sub_lnk'].'">'.$objMenuSub['sub_name_'.$this->lang->line('key')].'</a></li>';
									if($csub<sizeof($result_sub_menu)){
										echo '<li class="divider"></li>';	
									}
								}
								?>
                            </ul>
                        </li>
                        <?
					}
					else{
						echo '<li class="'.$objMenuMain['category_lnk'].' no-child"><a href="'.base_url().$language.'/'.$objMenuMain['category_lnk'].'">'.$objMenuMain['category_name_'.$this->lang->line('key')].'</a></li>';	
					}
				}
				?>
				<li class="no-child pull-right item-lang <?php if($this->lang->line('key')=='en') echo "active-lang"; ?> "><a href="<?=base_url()?>en/home">English</a></li>		
            	<li class="no-child pull-right item-lang <?php if($this->lang->line('key')=='vn') echo "active-lang"; ?>"><a href="<?=base_url()?>vn/home">Tiếng Việt</a></li>
				<?php
			  } 
			?>
		</ul>
	</div><!--/.nav-collapse -->
    </div>
</div>