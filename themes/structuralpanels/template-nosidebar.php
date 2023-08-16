<?php
/*
	Template Name: Full No Sidebar
*/
get_header();
	$page_layout = get_post_meta( get_the_ID(), '_cmb_enhenyero_page_layout', true );

	$page_editional_title = get_post_meta( get_the_ID(), '_cmb_enhenyero_page_additional_title', true );
	$page_short_description = get_post_meta( get_the_ID(), '_cmb_enhenyero_page_short_description', true );
	$page_description = apply_filters( 'the_content', get_post_meta( get_the_ID(), '_cmb_enhenyero_page_description', true ) );
	?>
	<main id="main" class="site-main container" role="main">
		<div id="en-content">
			<div class="row">
				<div class="col-md-12">
					<?php
					if( IsNullOrEmptyString( $page_editional_title ) || IsNullOrEmptyString( $page_short_description ) || IsNullOrEmptyString( $page_description ) ) {
						?>
						<div class="container-fluid ">
							<div class="<?php if( $page_layout != 'with_sidebar' ) { echo 'container '; } ?>p_z">
								<!-- Left Content 4 Cols -->
								<div class="col-sm-4 page-additional-title col-md-4">
									<div class="section-title text-left"> <!-- Left Section Title -->
										<?php
										if( IsNullOrEmptyString( $page_editional_title ) ) {
											?>
											<h2><?php echo esc_html ( $page_editional_title ); ?></h2>
											<hr>
											<?php
										}
										?>
										<small><?php echo html_entity_decode( $page_short_description ); ?></small>
									</div>
								</div>
								<!-- Right Content 8 Cols -->
								<div class="col-sm-8 col-md-8">
									<p>
										<?php echo html_entity_decode( $page_description ); ?>
									</p>
								</div>
							</div>
						</div>
						<?php
					}

					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the page content template.
						get_template_part( 'content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							?>
							<div class="container">
								<?php comments_template(); ?>
							</div>
							<?php
						endif;

					// End the loop.
					endwhile;
					?>
				</div>
			</div>
		</div>
	</main><!-- .site-main -->
	<?php
get_footer();