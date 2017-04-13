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

function spkgd_speaker_details_callback(){
	?>
	<!-- <div class="inside"> -->
		<table class="form-table">
				<tr>
					<th>Name:</th>
					<td><input type="text" name="name"/></td>
				</tr>

				<tr>
					<th>Title:</th>
					<td><input type="text" name="title"></td>
				</tr>

				<tr>
					<th>Institution:</th>
					<td><input type="text" name="institution"></td>
				</tr>
		</table>
	<!-- </div> -->
	<?php

}

function spkgd_presentation_details_callback(){

}