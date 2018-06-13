<?php

/* Forms */

foreach ( $langdirs as $langdir ) {
	
	echo form_open('admin/translator');
	
	echo form_submit('langDir', $langdir);
	
	echo form_close();
	
}

?>
