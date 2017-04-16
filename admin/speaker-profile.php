<?php

// update post messages
function spkgd_speaker_messages( $messages ) {
	global $post, $post_ID;
	$messages['spkgd_speaker'] = array(
	    0	=> '', 
	    1	=> 'Speaker Profile updated',
	    2	=> __('Custom field updated.'),
	    3	=> __('Custom field deleted.'),
	    4	=> __('Speaker Profile updated.'),
	    //5 => //NA for this post type
	    6	=> 'Speaker Profile published',
	    7	=> 'Speaker Profile saved',
	    8	=> 'Speaker Profile submitted',
	    9	=> 'Speaker Profile scheduled',
	    10	=> 'Speaker Profile draft updated',
	);
  return $messages;
}
add_filter( 'post_updated_messages', 'spkgd_speaker_messages' );

//Add meta boxes to Speaker Profile Edit page
function spkgd_build_metaboxes( $post ){

	add_meta_box( 	'spkgd_speaker_details', 
					'Speaker Details', 
					'spkgd_speaker_details_callback',
					'spkgd_speaker',
					'normal' );

	add_meta_box( 	'spkgd_presentation_details', 
					'Presentation Details', 
					'spkgd_presentation_details_callback',
					'spkgd_speaker',
					'normal' );
}
add_action( 'add_meta_boxes_spkgd_speaker', 'spkgd_build_metaboxes');

function spkgd_speaker_details_callback( $post ){

	$current_name 				= get_post_meta( $post->ID, 'spkgd_speaker_name', true );
	$current_speaker_title 		= get_post_meta( $post->ID, 'spkgd_speaker_title', true );
	$current_institution 		= get_post_meta( $post->ID, 'spkgd_institution', true );
	$current_biography 			= get_post_meta( $post->ID, 'spkgd_biography', true );
	?>

	<table class="form-table">
		<tr>
			<th>Name:</th>
			<td><input type="text" name="name" size="30" 
			value=<?php echo('"' . $current_name . '"');?> ></td>
		</tr>

		<tr>
			<th>Title:</th>
			<td><input type="text" name="speaker-title" size="60"
			value=<?php echo('"' . $current_speaker_title . '"');?> ></td>
		</tr>

		<tr>
			<th>Institution:</th>
			<td><input type="text" name="institution" size="110"
			value=<?php echo('"' . $current_institution . '"');?> ></td>
		</tr>

		<tr>
			<th>Biography:</th>
			<td><?php wp_editor( $current_biography, 'biography', array( 'wpautop' => false ) ); ?></td>
		</tr>
	</table>

	<?php
}

function spkgd_presentation_details_callback( $post ){
	$current_abstract_title		= get_post_meta( $post->ID, 'spkgd_abstract_title', true );
	$current_abstract 			= get_post_meta( $post->ID, 'spkgd_abstract', true );
	?>

	<table class="form-table">
		<tr>
			<th>Title:</th>
			<td><input type="text" name="abstract-title" size="30"
			value=<?php echo('"' . $current_abstract_title . '"');?> ></td>
		</tr>

		<tr>
			<th>Abstract:</th>
			<td><?php wp_editor( $current_abstract, 'abstract', array( 'wpautop' => false ) ); ?></td>
		</tr>
	</table>

	<?php
}

function spkgd_save_speaker( $post_id ){
	//don't overwrite data if triggered by autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
	return;

/*	if ( !wp_verify_nonce( $_POST['___box_content_nonce'], plugin_basename( __FILE__ ) ) )
	return;*/

	// Make sure the user has permission to edit this post
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}

	$name 				= $_POST['name'];
	$speaker_title 		= $_POST['speaker-title'];
	$institution 		= $_POST['institution'];
	$biography 			= $_POST['biography'];
	$abstract_title		= $_POST['abstract-title'];
	$abstract 			= $_POST['abstract'];

	update_post_meta( $post_id, 'spkgd_speaker_name', $name );
	update_post_meta( $post_id, 'spkgd_speaker_title', $speaker_title );
	update_post_meta( $post_id, 'spkgd_institution', $institution );
	update_post_meta( $post_id, 'spkgd_biography', $biography );
	update_post_meta( $post_id, 'spkgd_abstract_title', $abstract_title );
	update_post_meta( $post_id, 'spkgd_abstract', $abstract );
}
add_action( 'save_post', 'spkgd_save_speaker' );