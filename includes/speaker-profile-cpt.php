<?php

function spkgd_create_speaker_Profiles_posttype(){

	// Set UI labels for Custom Post Type
    $labels = array(
        'name'                	=> 'Speaker Bios',
        'singular_name'       	=> 'Speaker Profile',
        'add_new'				=> 'Add New Speaker Profile',
        'add_new_item'        	=> 'Add New Speaker Profile',
        'edit_item'           	=> 'Edit Speaker Profile',
        'new_item'				=> 'New Speaker Profile',
        'view_item'           	=> 'View Speaker Profile',
        'view_items'			=> 'View Speaker Profile',
        'search_items'        	=> 'Search Speaker Profile',
        'not_found'           	=> 'No Speaker Profiles found',
        'not_found_in_trash'	=> 'No Speaker Profiles found in trash',
        'all_items'           	=> 'Speaker Profiles',		
    );

  	$args = array(
	    'labels'					=> $labels,
	    'description'				=> 'Custom Layout for Speaker Profiles',
	    'public'			        => true,
	    'exclude_from_search'		=> false,
	    'publicly_queryable'		=> true,
	    'show_ui'					=> true,
	    'show_in_nav_menus'			=> false,
	    'show_in_menu'				=> true,
	    'show_in_admin_bar'			=> false,
		/*'menu_position'				=> 
		//'menu_icon'					=> @todo*/
	    'supports'      			=> array( 'title', 'editor', 'revisions', 'thumbnail', 'genesis-layouts' ),
		'has_archive'   			=> false,
	);
	register_post_type( 'spkgd_speaker_Profile', $args ); 
}
add_action( 'init', 'spkgd_create_speaker_Profiles_posttype' );