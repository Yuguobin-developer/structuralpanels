<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Enhenyero
* @since Enhenyero 1.0
*/
get_header();
	$page_layout = get_post_meta( get_the_ID(), '_cmb_enhenyero_page_layout', true );
	
	$page_editional_title = get_post_meta( get_the_ID(), '_cmb_enhenyero_page_additional_title', true );
	$page_short_description = get_post_meta( get_the_ID(), '_cmb_enhenyero_page_short_description', true );
	$page_description = apply_filters( 'the_content', get_post_meta( get_the_ID(), '_cmb_enhenyero_page_description', true ) );
	?>
	<main id="main" class="site-main" role="main">
		<div id="en-content">
			<div class="row">
				<div class="container p_z">
					<div class="<?php /* if( $page_layout != 'without_sidebar' ) { */ echo 'col-md-8 col-sm-8'; /* } else { echo 'col-md-12'; }  */?>">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						// End the loop.
						endwhile;
						?>
					</div>
					<!-- Sidebar -->
					<?php
					if( $page_layout != 'without_sidebar' ) {
						?>
						<div class="col-md-4 col-sm-4">
							<div class="sidebar">
								<?php get_sidebar(); ?>
							</div>
						</div><!-- End Sidebar -->
						<?php
					}
					?>
				</div>
			</div>
		</div><!-- /.container -->
	</main><!-- .site-main -->
	<?php
get_footer();