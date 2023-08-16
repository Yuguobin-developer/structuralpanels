<?php
if (!function_exists('e80_enhenyero_our_services')) {
	function e80_enhenyero_our_services ($atts) {
	
		global $ert_option;
	
		extract(shortcode_atts(
			array(
				'type' => 'product',
				/* Section & Content Options */
				'section_id' => '',
				'section_title' => '',
				'section_short_description' => '',
	
				/* Button Options */
				'btn_text' => '',
				'btn_url' => '',
	
				/* Data Display Options */
				'posts_display' => '',
	
				/* Text Options */
				'text_color' => '',
	
				/* Background Options */
				'background_image' => '',
				'background_color' => '',
				'background_repeat' => '',
	
				/* Dimension Options */
				'padding_top' => '',
				'padding_right' => '',
				'padding_bottom' => '',
				'padding_left' => '',
			), $atts)
		);
	
		if( '' === $section_id ) :
			$section_id = __('ert-enhenyero-our-services', TXT_DOMAIN );
		endif;
	
		if( '' === $posts_display ) :
			$posts_display = -1;
		endif;
	
		$strStyle = SectionStyle( $text_color, $background_color, $background_image, $background_repeat, $padding_top, $padding_right, $padding_bottom, $padding_left );
	
		ob_start();
		?>
		<div id="<?php echo esc_attr( $section_id ); ?>" class="section-main shortcode-our-services" style="<?php echo esc_html( $strStyle ); ?>">
			<div class="container p_z">
				<?php
				if( IsNullOrEmptyString( $section_title ) && IsNullOrEmptyString( $section_short_description ) )
				{
					?>
					<div class="section-title text-center"> <!-- Left Section Title -->
						<h2><?php echo esc_attr ( $section_title ); ?></h2>
						<hr>
						<p><?php echo esc_html ( $section_short_description ); ?></p>
						<a href="<?php echo esc_url( $btn_url ); ?>" class="read-more"><?php echo esc_attr( $btn_text ); ?> <span class="fa fa-chevron-circle-right"></span></a>
					</div>
					<?php
				}
	
				$args = array(
					'post_type' => $type,
					'posts_per_page' => $posts_display,
				);
				$qry = new WP_Query( $args );
	
				while ( $qry->have_posts() ) : $qry->the_post();
					?>
					<div class="col-sm-4 col-md-4">
						<div class="service"> <!-- Service #1 -->
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<?php the_post_thumbnail('thumb-360-225'); ?>
							</a>
							<a href="<?php echo esc_url( get_permalink() ); ?>"><h4><?php the_title(); ?></h4></a>
							<?php the_excerpt(); ?>
							<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Read More', TXT_DOMAIN ); ?> <span class="fa fa-chevron-circle-right"></span></a>
						</div>
					</div>
					<?php
				endwhile;
	
				// Reset Post Data
				wp_reset_postdata();
				?>
			</div>
		</div><!-- /#ert-enhenyero-our-services -->
		<?php
		return ob_get_clean();
	}
	add_shortcode('show-products', 'e80_enhenyero_our_services');
}