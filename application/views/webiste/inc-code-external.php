<?php 
if($results_code && sizeof($results_code)>0){ 
	foreach($results_code as $objCode){		
        $parClass = "vertical-align-center";
		$posClass = "";
		if($objCode['banner_pos_h']=='center'){
			$posClass = "modal-center";
			$parClass = "vertical-align-center";		
			echo '<div class="modal fade" id="basic-modal-content-poup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"/>';
				echo '<div class="vertical-alignment-modal">';
					echo '<div class="modal-dialog '.$parClass.'">';
						echo '<div class="modal-content">';
							echo '<a href="javascript:void(0)" class="my_popup_close" data-dismiss="modal">&nbsp;&nbsp;</a>';
							echo '<div>'.html_entity_decode($objCode['banner_photo']).'</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			?>
			<script language="javascript">
				$(function(){
					$(window).on("load",function(e){
						if($(document).width()<=<?=$objCode['banner_w']?>){
							$(".modal-content").css({"width":($(document).width()-50)+"px"});
						}
						else{
							$(".modal-content").css({"width":"<?=$objCode['banner_w']?>px"});
						}
						$(".modal-content").addClass("<?=$posClass?>");
						/*
						if (sessionStorage.getItem('set') === 'set') {
							$("#basic-modal-content-poup").modal("hide");
						}else{
							sessionStorage.setItem('set', 'set');							
						}
						*/
						$("#basic-modal-content-poup").modal("show");
					});
				});
			</script>
			<?php
		}
		else{
			if($objCode['banner_pos_h']=='left'){
				$posClass = "banner_bottom_left";
			}
			else if($objCode['banner_pos_h']=='right'){
				$posClass = "banner_bottom_right";
			}
			echo '<div id="banner_bt_cus" class="'.$posClass.'">';
			echo '<div style="position: absolute;top: 0px;right: 0px;height: 40px;width: 40px;"><a href="javascript:void(0)" class="_close" ><img src="'.base_url().'templates/website/images/close_modal.png"></a></div>';
				echo html_entity_decode($objCode['banner_photo']);
			echo '</div>';
			?>
			<script language="javascript">
				$(function(){
					$(window).on("load",function(e){
						if($(document).width()<=<?=$objCode['banner_w']?>){
							$("#banner_bt_cus").css({"width":($(document).width()-50)+"px"});
						}
						else{
							$("#banner_bt_cus").css({"width":"<?=$objCode['banner_w']?>px"});
						}
						$("#banner_bt_cus").fadeIn("slow");
					});
					$("._close").click(function(){
						$("#banner_bt_cus").fadeOut("slow");
					});
				});
			</script>
			<?php
		}
	}
}
?>

	
