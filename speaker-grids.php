<?php

/**
* Plugin Name: Speaker Grids
* Plugin URI: http://fusion53.com/
* Description: Organize and display speaker profiles in an attractive grid.
* Version: 0.0.1
* Author: Mark Gajadhar
* Author URI: http://fusion53.com/
**/

define( 'SPKGD_ABSPATH', plugin_dir_path(__FILE__) );
define( 'SPKGD_ABSURL', plugin_dir_url(__FILE__) );

//Link in all relative files
include( SPKGD_ABSPATH . '/includes/speaker-profile-cpt.php');
include( SPKGD_ABSPATH . '/includes/shortcode.php');
if( is_admin() ){
	//include( SPKGD_ABSPATH . '/admin/menu.php');
}
else {
	//include( SPKGD_ABSPATH . '/includes/tbd.php');
}

//register scripts and stylesfor later use
function spkgd_register_assets(){
	wp_register_style( 'spkgd_shortcode_styles', (SPKGD_ABSURL . 'css/style-shortcode.css') );
	//wp_register_script( 'spkgd_speaker_grids', (SPKGD_ABSURL . 'js/script.js'), array('???') );
}
add_action('init', 'spkgd_register_assets');