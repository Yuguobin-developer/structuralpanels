<?php
if (!function_exists('e80_slider')) {
	function e80_slider ($atts) {
		global $ert_option;
	
		extract(shortcode_atts(
			array(
				'section_id' => '',
			), $atts)
		);
	
		if( '' === $section_id ) :
			$section_id = __('show-slides', TXT_DOMAIN );
		endif;
	
		ob_start();
		?>
		<div id="<?php echo esc_attr( $section_id ); ?>" class="section-main shortcode-photos-slider">
			<div id="header-slider" class="carousel slide carousel-fade" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php
					$photos_slider_args = array(
						'post_type' => 'photos_slider',
						'posts_per_page' => -1
					);
					$photos_slider_query = new WP_Query( $photos_slider_args );
	
					$i = 1;
					while ( $photos_slider_query->have_posts() ) : $photos_slider_query->the_post();
						?>
						<div class="item<?php if( $i == 1 ) { echo ' active'; } ?>"> <!-- Slider Item #1 -->
							<img src="<?php echo esc_url ( get_post_meta( get_the_ID(), '_cmb_enhenyero_slide_img', true ) ); ?>" alt="..." />
							<div class="carousel-caption">
								<h1><?php the_title(); ?></h1>
								<p class="lead"><?php echo esc_html( get_post_meta( get_the_ID(), '_cmb_enhenyero_slide_desc', true ) ); ?></p>
								<a class="btn btn-default en-btn" href="<?php echo esc_url( get_post_meta( get_the_ID(), '_cmb_enhenyero_slide_btn_url', true ) ); ?>" role="button"><?php echo esc_html( get_post_meta( get_the_ID(), '_cmb_enhenyero_slide_btn_txt', true ) ); ?></a>
							</div>
						</div>
						<?php
						$i++;
					endwhile;
	
					// Reset Post Data
					wp_reset_postdata();
					?>
				</div>
	
				<a class="nofancybox left carousel-control" href="#header-slider" role="button" data-slide="prev">
					<span class="fa fa-long-arrow-left" aria-hidden="true"></span>
				</a>
				<a class="nofancybox right carousel-control" href="#header-slider" role="button" data-slide="next">
					<span class="fa fa-long-arrow-right" aria-hidden="true"></span>
				</a>
			</div>
		</div><!-- /#ert-enhenyero-photos-slider -->
		<?php
		return ob_get_clean();
	}
}
add_shortcode('show-slides', 'e80_slider');