<?php

/**
* Plugin Name: Speaker Grids
* Plugin URI: http://fusion53.com/
* Description: Organize and displaying speaker profiles in an attractive grid.
* Version: 0.0.1
* Author: Mark Gajadhar
* Author URI: http://fusion53.com/
**/

define( 'UMF_ABSPATH', plugin_dir_path(__FILE__) );
define( 'UMF_ABSURL', plugin_dir_url(__FILE__) );

//Link in all relative files
include( UMF_ABSPATH . '/includes/speaker-profile-cpt.php');
if( is_admin() ){
	//include( UMF_ABSPATH . '/admin/menu.php');
}
else {
	//include( UMF_ABSPATH . '/includes/tbd.php');
}

//register scripts for later use
//wp_register_script( 'spkgd_speaker_grids', (UMF_ABSURL . 'js/script.js'), array('???') );