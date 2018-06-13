<?php

/* Forms */

foreach ( $languages as $language ) {
	
	echo form_open('admin/translator', '', $hidden );
	
	echo form_submit('slaveLang', $language);
	
	echo form_close();
	
}

?>
