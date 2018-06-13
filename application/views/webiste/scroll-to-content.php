<?php if($sub_menu_link && $sub_menu_link!='' && $sub_menu_link!=NULL){
	echo '<script>';
		echo  '$(function () {';
			echo 'setTimeout(function(){';
			echo '$("html, body").stop().animate({';
				echo 'scrollTop: $("#'.$sub_menu_link.'").offset().top-60';
			echo '}, 1500, "easeInOutExpo");';
		echo '},1000);';
		echo  '});';
	echo '</script>';
}?>