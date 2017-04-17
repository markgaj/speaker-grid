<?php
	function spkgd_display(){
		$speakers = get_posts( array('post_type' => 'spkgd_speaker', 'numberposts' => -1) );

		foreach ($speakers as $speaker){
			$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $speaker->ID ), 'full' );
			$feature_image = $feature_image[0];

			$speaker_data = get_post_meta( $speaker->ID );

			//strip out unnecessary arrays
			foreach($speaker_data as $k => $v){
				$speaker_data[$k] = array_shift($v);
			}

			var_dump($feature_image);
			
			ob_start(); ?>

			<div class="spkgd_container">
				<div class="spkgd_box">
					<img src=<?php echo($feature_image);?> ></img>
					<h2><?php echo($speaker_data["spkgd_speaker_name"]);?></h2>
			    	<p><?php echo($speaker_data["spkgd_abstract_title"]);?></p>
			    	<div class="spkgd_clear"></div>
			    	<div class="spkgd_link-bar">
			    		<div class="spkgd_speaker-bio-link">
			        		<p>BIO <img src=<?php echo(SPKGD_ABSURL . '/images/expand_arrow.png');?> ></img></p>
			      		</div>
			      		<div class="spkgd_abstract-link">
			        		<p>ABSTRACT <img src=<?php echo(SPKGD_ABSURL . '/images/expand_arrow.png');?> ></img></p>
			      		</div>
			    	</div>
			    	<div class="spkgd_clear"></div>
			    	<div class="spkgd_speaker-bio">
			      		<h1> <?php echo($speaker_data["spkgd_speaker_title"]);?></h1>
			      		<div class="spkgd_institution">
			        		<p>
			          			<?php echo($speaker_data["spkgd_institution"]);?>
			        		</p>
			      		</div>
			       		<?php echo($speaker_data["spkgd_biography"]);?>
			    	</div>
			    	<div class="spkgd_abstract">
			     		<h1><?php echo($speaker_data["spkgd_speaker_abstract-title"]);?></h1>
			      		<p>
			        		<?php echo($speaker_data["spkgd_abstract"]);?>
			      		</p>
			    	</div>
				</div>
			</div>

			<?php
		}
	return ob_get_clean();
	}
	add_shortcode( 'spkgd', 'spkgd_display' );