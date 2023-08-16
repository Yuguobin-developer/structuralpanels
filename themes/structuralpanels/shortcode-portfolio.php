<?php
if (!function_exists('e80_enhenyero_portfolio')) {
	function e80_enhenyero_portfolio ( $atts ) {
	
		global $ert_option;
	
		extract(shortcode_atts(
			array(
				'use_filters' => false,
				'sort_type' => '',
				'sort_tax' => '',
				/* Section & Content Options */
				'section_id' => 'ert-enhenyero-portfolio',
				'section_title' => '',
				'section_short_description' => '',
	
				/* Button Options */
				'btn_text' => '',
				'btn_url' => '',
	
				/* Data Display Options */
	
				/* Layout Options */
				'layout_style' => '',
	
				/* Text Options */
				'text_color' => '',
	
				/* Background Options */
				'background_color' => '',
				'background_image' => '',
				'background_repeat' => '',
	
				/* Dimension Options */
				'padding_top' => '',
				'padding_right' => '',
				'padding_bottom' => '',
				'padding_left' => '',
			), $atts)
		);
	
/*
		if( '' === $section_id ) :
			$section_id = __('ert-enhenyero-portfolio', TXT_DOMAIN );
		endif;
*/
	
		//$strStyle = SectionStyle( $text_color, $background_color, $background_image, $background_repeat, $padding_top, $padding_right, $padding_bottom, $padding_left );
		//$strStyle = '';
		if($text_color) $strStyle .= 'color:'. $text_color .'; ';
		if($background_color) $strStyle .= 'background-color:' .$background_color.'; ';
		if($background_image) $strStyle .= 'background-image:url(' .$background_image.'); ';
		if($background_repeat) $strStyle .= 'background-repeat:' .$background_repeat.'; ';
		if($padding_top) $strStyle .= 'padding-top:' .$padding_top.'; ';
		if($padding_bottom) $strStyle .= 'padding-bottom:' .$padding_bottom.'; ';
		if($padding_right) $strStyle .= 'padding-right:' .$padding_right.'; ';
		if($padding_left) $strStyle .= 'padding-left:' .$padding_left.'; ';
	
		$ert_post_type = $sort_type;
		$ert_post_tax = $sort_tax;
	
		ob_start();
		?>
		<div id="<?php echo esc_attr( $section_id ); ?>" class="section-main shortcode-portfolio <?php echo esc_attr( $layout_style ); ?>" style="<?php echo esc_html( $strStyle ); ?>">
			<div class="container p_z">
				<?php
				if( IsNullOrEmptyString( $section_title ) && IsNullOrEmptyString( $section_short_description ) ) {
					?>
					<div class="section-title text-center"> <!-- Left Section Title -->
						<h2><?php echo esc_attr( $section_title ); ?></h2>
						<hr>
						<p><?php echo esc_html( $section_short_description ); ?></p>
						<a href="<?php echo esc_url( $btn_url ); ?>" class="read-more"><?php echo esc_attr( $btn_text ); ?> <span class="fa fa-chevron-circle-right"></span></a>
					</div>
					<?php
				}
	
				if( $layout_style == "portfolio-carousel" ) {
					?>
					<div id="portfolio-items" class="owl-carousel portfolio-carousel owl-theme">
						<?php
						$args = array(
							'post_type' => $ert_post_type,
							'posts_per_page' => -1,
						);
						$qry = new WP_Query( $args );
	
						while ( $qry->have_posts() ) : $qry->the_post();
							$alt_title = get_post_meta(get_the_ID(),'_work_metadata_title',1);
							if ($alt_title) { $the_title = $alt_title; }
							else { $the_title = get_the_title(); }
							?>
							<div class="item">
								<div class="hover-bg">
									<div class="hover-text off">
										<h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo $the_title; ?></a></h4>
										<br/>
										<?php the_excerpt();?>
										<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Read More', TXT_DOMAIN ); ?> <span class="fa fa-chevron-circle-right"></span></a>
									</div>
									<?php the_post_thumbnail('thumb-273-353'); ?>
								</div>
							</div>
							<?php
						endwhile;
	
						// Reset Post Data
						wp_reset_postdata();
						?>
					</div>
					<?php
				}
				elseif( $layout_style == "portfolio-2-column" ) {
					?>
					<ul class="list-inline cat">
						<li><a href="#" data-filter="*" class="active"><?php _e( 'All', TXT_DOMAIN ) ?></a></li>
						<?php
						$terms = get_terms( $ert_post_tax );
	
						if ( count( $terms > 0 ) && is_array( $terms ) ) {
							foreach ( $terms as $term ) {
								$termname = strtolower($term->name);
								$termname =str_replace(' ', '-', $termname);
								?>
								<li><a href="#" data-filter=".<?php echo esc_attr( $termname ); ?>"><?php echo esc_attr ( $term->name ); ?></a></li>						
								<?php
							}
						}
						?>					
					</ul>
					<div class="clearfix"></div>
					<div class="smallspacer"></div>
					<div class="row">
						<div id="itemsWork" class="portfolio-2-column">
							<?php
							$args = array(
								'post_type' => $ert_post_type,
								'posts_per_page' => -1,
							);
							$qry = new WP_Query( $args );
	
							while ( $qry->have_posts() ) : $qry->the_post();
	
								$terms = get_the_terms( get_the_ID(), $ert_post_tax );
	
								if ( $terms && ! is_wp_error( $terms ) && is_array( $terms ) ) :
									$links = array();
	
									foreach ( $terms as $term ) {
										$links[] = $term->name;
									}
	
									$tax_links = join( " ", str_replace(' ', '-', $links) );
									$tax = strtolower($tax_links);
								else :
									$tax = '';
								endif;
								?>
								<div class="col-sm-6 col-md-6 col-lg-6 <?php echo esc_attr( $tax ); ?>">
									<div class="item"><!-- Portfolio Item #6 -->
										<div class="hover-bg">
											<div class="hover-text off">
												<a href="<?php echo esc_url( get_permalink() ); ?>"><h4><?php the_title(); ?></h4></a>
												<?php the_excerpt();?>
												<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Read More', TXT_DOMAIN ); ?> <span class="fa fa-chevron-circle-right"></span></a>
											</div>
											<?php the_post_thumbnail('thumb-570-382'); ?>
										</div>
									</div>
								</div>
								<?php
							endwhile;
	
							// Reset Post Data
							wp_reset_postdata();
							?>
						</div> <!-- Isotope -->
					</div> <!-- End Row -->
					<?php
				}
				elseif( $layout_style == "portfolio-3-column" ) {
					if ($use_filters == true) {
					?>
					<ul class="list-inline cat">
						<li><a href="#" data-filter="*" class="active"><?php _e( 'All', TXT_DOMAIN ) ?></a></li>
						<?php
						$terms = get_terms( $ert_post_tax );
						if ( count( $terms ) > 0 && is_array( $terms ) ) {
							foreach ( $terms as $term ) {
								$termname = strtolower($term->name);
								$termname =str_replace(' ', '-', $termname);
								?>
								<li><a href="#" data-filter=".<?php echo esc_attr( $termname ); ?>"><?php echo esc_attr ( $term->name ); ?></a></li>						
								<?php
							}
						}
						?>
					</ul>
					<?php }?>
					<div class="clearfix"></div>
					<div class="smallspacer"></div>
					<div class="row">
						<div id="itemsWork" class="col3 portfolio-3-column">
							<?php
							$args = array(
								'post_type' => $ert_post_type,
								'posts_per_page' => -1,
							);
							$qry = new WP_Query( $args );
	
							while( $qry->have_posts() ) : $qry->the_post();
	
								$terms = get_the_terms( get_the_ID(), $ert_post_tax );
								if ( count( $terms ) > 0 && ! is_wp_error( $terms ) && is_array( $terms ) ) :
									$links = array();
	
									foreach ( $terms as $term ) {
										$links[] = $term->name;
									}
	
									$tax_links = join( " ", str_replace(' ', '-', $links) );
									$tax = strtolower( $tax_links );
								else :
									$tax = '';
								endif;
								?>
								<div class="col-sm-6 col-md-4 col-lg-4 <?php echo esc_attr( $tax ); ?>">
									<div class="item"><!-- Portfolio Item #1 -->
										<div class="hover-bg">
											<div class="hover-text off">
												<a href="<?php echo esc_url( get_permalink() ); ?>"><h4><?php the_title(); ?></h4></a>
												<?php the_excerpt();?>
												<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Read More', TXT_DOMAIN ); ?> <span class="fa fa-chevron-circle-right"></span></a>
											</div>
											<?php the_post_thumbnail('thumb-370-338'); ?>
										</div>
									</div>
								</div>
								<?php
							endwhile;
	
							// Reset Post Data
							wp_reset_postdata();
							?>
						</div> <!-- Isotope -->
					</div> <!-- End Row -->
					<?php
				}
				else {
					?>
					<ul class="list-inline cat">
						<li><a href="#" data-filter="*" class="active"><?php _e( 'All', TXT_DOMAIN ) ?></a></li>
						<?php
						$terms = get_terms( $ert_post_tax );
						if ( count( $terms > 0 ) && is_array( $terms ) ) {
							foreach ( $terms as $term ) {
								$termname = strtolower( $term->name );
								$termname =str_replace(' ', '-', $termname);
								?>
								<li><a href="#" data-filter=".<?php echo esc_attr( $termname ); ?>"><?php echo esc_attr ( $term->name ); ?></a></li>						
								<?php
							}
						}
						?>					
					</ul>
					<div class="clearfix"></div>
					<div class="smallspacer"></div>
					<div class="row">
						<div id="itemsWork">
							<?php
							$args = array(
								'post_type' => $ert_post_type,
								'posts_per_page' => -1,
							);
							$qry = new WP_Query( $args );
	
							while( $qry->have_posts() ) : $qry->the_post();
	
								$terms = get_the_terms( get_the_ID(), $ert_post_tax );
	
								if ( count( $terms ) > 0 && ! is_wp_error( $terms ) && is_array( $terms ) ) :
									$links = array();
	
									foreach ( $terms as $term ) {
										$links[] = $term->name;
									}
	
									$tax_links = join( " ", str_replace(' ', '-', $links) );
									$tax = strtolower( $tax_links );
								else :
									$tax = '';
								endif;
								?>
								<div class="col-sm-6 col-md-6 col-lg-6 <?php echo esc_attr( $tax ); ?>">
									<div class="item"><!-- Portfolio Item #6 -->
										<div class="hover-bg">
											<div class="hover-text off">
												<a href="<?php echo esc_url( get_permalink() ); ?>"><h4><?php the_title(); ?></h4></a>
												<?php the_excerpt();?>
												<?php echo esc_html( get_post_meta( get_the_ID(), '_cmb_enhenyero_pr_page_short_description', true ) ); ?></p>
												<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Read More', TXT_DOMAIN ); ?> <span class="fa fa-chevron-circle-right"></span></a>
											</div>
											<?php the_post_thumbnail('thumb-570-382'); ?>
										</div>
									</div>
								</div>
								<?php
							endwhile;
	
							// Reset Post Data
							wp_reset_postdata();
							?>
						</div> <!-- Isotope -->
					</div> <!-- End Row -->
					<?php
				}
				?>
			</div>
		</div><!-- /#ert-enhenyero-portfolio -->
		<?php
		return ob_get_clean();
	}
}
add_shortcode('show-portfolio', 'e80_enhenyero_portfolio');
