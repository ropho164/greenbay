<?php $ci = &get_instance();?>
<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>GreenBay Phú Quốc - Resort & Spa</title>
<meta name="description" content="Resort & Spa">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="robots" content="all,follow">
<link href="<?=base_url()?>templates/website/css/font.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/bootstrap/css/animate.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/js/magnific-popup/magnific-popup.css" rel="stylesheet">
<link href="<?=base_url()?>templates/website/bootstrap/css/datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>templates/website/css/custom-menu.css">
<link rel="stylesheet" href="<?=base_url()?>templates/website/css/custom-slider.css">
<link rel="stylesheet" href="<?=base_url()?>templates/website/css/custom.css">
<link href="<?=base_url()?>templates/website/bootstrap/css/bootstrap.vertical-tabs.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>templates/website/css/geometry.css">
<link rel="shortcut icon" href="<?=base_url()?>favicon.ico" type="image/x-icon">
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K3KJ6J3');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3KJ6J3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_full">
	<?php include ("menu.php");?>
    <div class="container-full fix-no-banner clearfix">
    <div class="about_parent_home bg_things_to_see clearfix" style="background-color:#f5f5f5;">
        <div class="row item-affect" style="padding-top:30px;">
            <div class="col-xs-12">
                <div class="_title" style="padding-bottom: 10px">
					<div class="_item_title">
						<div class="clearfix"><div class="_title_special" style="text-transform: none;font-size: 30pt"><?php echo $this->lang->line('menu_text_contact');?></div></div>
						<div class="clearfix _item_underline_title"></div>
					</div>
				</div>
            </div>
        </div>
        <div class="row-std col-eq-height mg0 pd0 item-affect clearfix">
            <div class="col-xs-6 col-xs-push-6 bg_things_to_see_photo mg0 pd0">
              <!--getPhotoThumb-->
				<div class="col-xs-12" style="padding-bottom: 40px;"> 
					<div class="contact_map_bound">
						<div id="map"></div>
					</div>
				</div>           
            </div>
            <div class="col-xs-6 col-xs-pull-6 mg0 pd0">
				<div class="col-xs-12" style="padding-bottom: 40px;">
					 <?php if($results_info_contact && sizeof($results_info_contact)>0){?>
					 <div class="contact_detail_text">
						<div class="_item_title">
							<div class="clearfix font_bold_std" style="color: #0f9e4a;">
							<?=$results_info_contact[0]['info_title']?>
							</div>
							<div class="clearfix _item_underline_green_title"></div>
						</div>
						<div class="font_std">
							<?=html_entity_decode($results_info_contact[0]['info_content'])?>
						</div>
					 </div>
					 <div class="contact_detail_text">
						<div class="_item_title">
							<div class="clearfix font_bold_std" style="color: #0f9e4a;">
							<?=$results_info_contact[0]['info_title_office']?>
							</div>
							<div class="clearfix _item_underline_green_title"></div>
						</div>
						<div class="font_std">
							<?=html_entity_decode($results_info_contact[0]['info_content_office'])?>
						</div>
					 </div>
					 <?php }?>
				</div>
            </div>
        </div>
    </div>
    <!--end things-->
    <?php include ("footer_page.php");?>
    </div>
    <?php include ("form-right.php");?>  
</div>
<!-- Javascript files
<script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>-->
<script src="<?=base_url()?>templates/website/js/jquery-1.11.0.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.easing.min.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/moment-with-locales.js"></script>
<script src="<?=base_url()?>templates/website/bootstrap/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url()?>templates/website/js/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>templates/website/js/jquery.transit.min.js"></script>
<script src="<?=base_url()?>templates/website/js/scipt-page.js"></script>
<script src="<?=base_url()?>templates/website/js/viewport.js"></script>
<script src="<?=base_url()?>templates/website/js/fix-no-banner.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA7glD9i0jYDHj022OxNeBnknqTC_SzaWA&language=vi"></script>
<script language="javascript">
$(document).ready(function() {
	showGoogleMapDefault("Cua Can, Phu Quoc Island, Kien Giang Province, Viet Nam","Green Bay Resort Phu Quoc");
})
function showGoogleMapDefault(strAddress,srtNote){	
	var contentString;
	var address = strAddress;
	initialize(10.295990, 103.894389);
	function initialize(latitude,longitude) {
		var latlng = new google.maps.LatLng(latitude,longitude);
		directionsDisplay = new google.maps.DirectionsRenderer();
		var myOptions = {
			  center: latlng,
			  zoom: 15,
			  scaleControl:false,
			  panControl:false,
			  scrollwheel:false,
			  zoomControl:false,
			  draggable:false,
			  streetViewControl:false,
			  mapTypeControl:false,
			  mapTypeId: google.maps.MapTypeId.ROADMAP,
			  disableDefaultUI: true,
			  
		};
		var map = new google.maps.Map(document.getElementById("map"),myOptions);
		contentString = "<div id='content' style='overflow: hidden;text-align:left;width: auto'>";
		contentString += "<div style='margin:0 0 5px 0;font-weight:bold;'>"+srtNote+"</div>";
		contentString += "<div style='padding-bottom: 5px;'>"+address+"</div>";
		contentString += "</div>";
		var marker = new google.maps.Marker({
			  position: latlng, 
			  map: map, 
			  title:"Green Bay Resort Phu Quoc"
		}); 
		var infowindow = new google.maps.InfoWindow({ content: contentString});
		infowindow.open(map,marker);
		google.maps.event.addListener(marker, 'click', function(){ infowindow.open(map,marker);});
	}
}
</script>
<?php include_once("ajaxpost-data.php");?>
<?php include_once("active_menu.php");?>
</body>
</html>