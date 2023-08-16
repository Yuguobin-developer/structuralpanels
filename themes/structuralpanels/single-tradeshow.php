<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Enhenyero
* @since Enhenyero 1.0
*/
get_header();
	?>
	<main id="main" class="site-main" role="main">
		<div id="en-content">
			<div class="container">
				<div id="blogposts" class="row">
					<div class="col-md-8 col-sm-8">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'content', 'tradeshow' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						// End the loop.
						endwhile;
						?>
						<div class="clearfix"></div>
						<div class="smallspacer"></div>
					</div>
					<!-- Sidebar -->
					<div class="col-md-4 col-sm-4">
						<div class="sidebar">
							<?php get_sidebar(); ?>
						</div>
					</div><!-- End Sidebar -->
				</div>
			</div>
		</div><!-- /.container -->
	</main><!-- .site-main -->
	<?php
get_footer();