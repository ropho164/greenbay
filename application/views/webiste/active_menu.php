<?php 
if($main_menu_link!='' && $main_menu_link!=NULL){
echo '<script language="javascript">';
echo  '$(function () {';
   echo '$(".'.$main_menu_link.'").addClass("active");';
echo  '});';
echo '</script>';
}?>