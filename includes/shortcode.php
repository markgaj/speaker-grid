<?php
function spkgd_display(){
	$speakers = get_posts( array('post_type' 	=> 'spkgd_speaker', 
								 'numberposts' 	=> -1, 
								 'orderby' 		=> 'title',
								 'order' 		=> 'ASC') );
		
	ob_start(); ?>

		<div class="spkgd_container">
			<?php
			foreach ($speakers as $speaker){
				$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $speaker->ID ), 'full' )[0];
				$speaker_data = spkgd_strip_array( (get_post_meta( $speaker->ID )) );
				?>
					<div class="spkgd_box">
						<img src=<?php echo($feature_image);?> ></img>
						<h2><?php echo($speaker_data["spkgd_speaker_name"]);?></h2>
						<p><?
							$abstract_title = $speaker_data["spkgd_abstract_title"];
							if (strlen($abstract_title) > 130) {
								$last_word = strpos($abstract_title, ' ', 127);
								echo((substr($abstract_title, 0, $last_word)) . '...');
							} else echo($abstract_title);
							?></p>
						<div class="spkgd_clear"></div>
						<div class="spkgd_link-bar">
							<div class="spkgd_speaker-bio-link">
								<p>BIOGRAPHY <img src=<?php echo(SPKGD_ABSURL . '/images/expand_arrow.png');?> ></img></p>
							</div>
							<div class="spkgd_abstract-link">
								<p>ABSTRACT <img src=<?php echo(SPKGD_ABSURL . '/images/expand_arrow.png');?> ></img></p>
							</div>
						</div>
						<div class="spkgd_clear"></div>
						<div class="spkgd_speaker-bio">
							<h3> <?php echo($speaker_data["spkgd_speaker_title"]);?></h3>
							<div class="spkgd_institution">
								<p>
									<?php echo($speaker_data["spkgd_institution"]);?>
								</p>
							</div>
							<?php echo($speaker_data["spkgd_biography"]);?>
						</div>
						<div class="spkgd_abstract">
							<h3><?php echo($speaker_data["spkgd_abstract_title"]);?></h3>
							<p>
								<?php echo($speaker_data["spkgd_abstract"]);?>
							</p>
						</div>
					</div>
				<?php
			} ?>
		</div> <?php
	return ob_get_clean();
}
add_shortcode( 'spkgd', 'spkgd_display' );

//Only load css/js if shortcode is embedded on post or page
function spkgd_enqueue_shortcode_scripts(){
	//get database info for this page (including post content)
	//@todo - add if statement to check only posts and pages
	$queried_object = get_queried_object();	

	//Check if post content contains the Speaker Grid shortcode
	if( (strpos( $queried_object->post_content, '[spkgd' ) ) !== false ) { //there is a shortcode
		wp_enqueue_style( 'spkgd_shortcode_styles' );	
		wp_enqueue_script( 'spkgd_shortcode_scripts');
	}
}
add_action( 'wp_enqueue_scripts', 'spkgd_enqueue_shortcode_scripts');

function spkgd_strip_array( $target_array ){
		//strip out unnecessary arrays
		foreach($target_array as $k => $v){
			$target_array[$k] = array_shift($v);
		}	
		return $target_array;
	}