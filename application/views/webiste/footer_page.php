<div class="footer_parent item-affect clearfix">
    <div class="footer_map_color clearfix">
        <div class="row row-eq-height">
           <div class="col-xs-4">
                <div class="footer_content">
                   <p style="padding-top:15px;"><img alt="Green Bay Resort Phu Quoc" class="img-responsive" src="<?=base_url()?>uploads/images/logo-white.png" /></p>
                   <?php
					if($results_info_contact && sizeof($results_info_contact)>0){
						foreach($results_info_contact as $obj){
							echo html_entity_decode($obj["info_content"]);
							echo '<p>';
							echo $obj["info_title_office"].'<br/>';
							echo html_entity_decode($obj["info_content_office"]);
							echo '</p>';
						}	
					}
					?>
                </div>
           </div>
           <div class="col-xs-8 col-height-right-foter mg0 pd0">
           <div class="col-xs-6 col-height-foter">
                 <div class="item-container-fluid">
                    <div class="item-row-fluid">
                         <div class="col-xs-5 mg0 pd0">
                            <div class="footer_content footer_content_line">                               
                                <a href="<?=base_url().$this->lang->line('key')?>/explore"><?=$this->lang->line('foot_abouts')?></a><br/>
                                <a href="<?=base_url().$this->lang->line('key')?>/accommodation"><?=$this->lang->line('foot_accom')?></a><br/> 
                                <a href="<?=base_url().$this->lang->line('key')?>/dining"><?=$this->lang->line('foot_dining')?></a><br/>
                                <a href="<?=base_url().$this->lang->line('key')?>/interests/nature-loving-activities"><?=$this->lang->line('foot_spa')?></a><br/>
                            </div>
                          </div>
                          <div class="col-xs-7 mg0 pd0">
                            <div class="footer_content footer_content_line">                               
                                <a href="<?=base_url().$this->lang->line('key')?>/policy"><?=$this->lang->line('foot_policy')?></a><br/>
                                <a href="<?=base_url().$this->lang->line('key')?>/payment_and_cancellation"><?=$this->lang->line('foot_paycancel')?></a><br/>
                                <a href="javscript:void(0)"><?=$this->lang->line('foot_careers')?></a><br/>                                
                                <a href="<?=base_url().$this->lang->line('key')?>/contact-us"><?=$this->lang->line('foot_contact_us')?></a><br/>
                            </div>
                        </div>
                    </div>
                </div>
           </div> 
           <div class="col-xs-6 col-height-right-foter">
                <div class="item-container-fluid">
                    <div class="item-row-fluid">
                        <div class="footer_content clearfix">
                            <div style="font-size:12pt;color:rgba(255,255,255,1.00);float:left;padding-right:3px;padding-top:6px"><?=$this->lang->line('social_follow')?></div>
                            <div class="social-circle"><a href="https://www.facebook.com/greenbayphuquoc/" target="_blank" title="Facebook"><span class="fa fa-facebook icon_text_social"></span></a></div>
                            <div class="social-circle"><a href="https://www.instagram.com/greenbayphuquocresort/" target="_blank" title="Instagram"><span class="fa fa-instagram icon_text_social"></span></a></div>
                            <div class="social-circle"><a href="javascript:void(0)" target="_blank" title="Tripadvisor"><span class="fa fa-tripadvisor icon_text_social"></span></a></div>
                        </div>
                        <div class="footer_content clearfix">
                            <div style="font-size:12pt;color:rgba(255,255,255,1.00);padding-right:5px;padding-top:10px"><?=$this->lang->line('social_join')?></div>
                            <div style="clear:both">
                            <?=$this->lang->line('social_join_content')?>
                            </div>
                            <div style="clear:both;padding-top:10px">
                                    <form id="frm_newsletter" class="form-inline pull-left">
                                      <div class="col-xs-10 mg0 pd0">
                                         <input type="text" name="cus_email" id="cus_email" placeholder="Enter your email here..." class="input-newsletter"/>
                                      </div>
                                      <div class="col-xs-2 mg0 pd0">
                                        <button id="btnReEmail" type="button" class="btn-newsletter"><span class="fa fa-chevron-circle-right" style="color:#FFFFFF;font-size:18pt;background-color:transparent !important"></span></button>
                                      </div>
                                  </form>
                            </div>
                        </div>
                    </div>
               </div>
           </div>  
			</div>              
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="footer_content"> <a href="<?=base_url().$this->lang->line('key')?>">@GB</a> |  
                <?php
					if($e_bro && sizeof($e_bro)>0){
						echo '<a href="'.base_url().$e_bro[0]['article_files_1'].'" target="_blank">'.$this->lang->line('foot_e_brochure').'</a>  | ';

					}
				?><a href="<?=base_url().$this->lang->line('key')?>/sitemap"><?=$this->lang->line('foot_sitemap')?></a></div>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 pd0 mg0 copyright">
        @ 2017 Green Bay Resort Phu Quoc. All rights reserved.<br/>Developed by Media Gurus
</div>
<?php
$ci = &get_instance();
$ohot = $ci->getHotRooms($language);
$view = '';
if(isset($main_menu_link)){
	$view = $main_menu_link;
}
if(sizeof($ohot)>0 && $view!='reservation' && $view!='accommodation'){
?>
<div class="promoTabBottom inline-block">
	<form method="post" action="<?=base_url().$language?>/accommodation/list">
		<input name="ROOMSTYPE" type="hidden" value="<?=$ohot[0]['categories_sub_id']?>">
		<div class="pull-left _title_promo">
		 <?php 			 	
			echo $this->lang->line('hot_lable_first').'&nbsp;';
			if($language=='en'){
				echo 'USD '.$ohot[0]['article_price_promo'];
			}else{
				echo $ohot[0]['article_price_promo'].'VNĐ';	
			}
			echo '&nbsp;'.$this->lang->line('hot_lable_affter');
			?>
		 </div>
		<div class="pull-right">
			 <button type="submit" class="btn bg_btn_promo_green input-no-radius">
				<span class="txtt_trans_up"><?php echo $this->lang->line('btn_booking');?></span>
			 </button>
		 </div>
	 </form>
</div>
<?php } ?>