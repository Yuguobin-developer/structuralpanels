<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Enhenyero
* @since Enhenyero 1.0
*/

get_header(); ?>

	<main id="main" class="site-main" role="main">
		<div id="en-content">
			<div class="container">
				<div id="blogposts" class="row">
					<!-- Blog Posts Content -->
					<div class="col-md-8 col-sm-8">
						<?php
						if ( have_posts() ) :
						
							// Start the loop.
							while ( have_posts() ) : the_post(); ?>

								<?php
								/*
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content.php and that will be used instead.
								 */
								get_template_part( 'content', 'search' );

							// End the loop.
							endwhile;

							ert_paging_nav();

						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'content', 'none' );

						endif;
						?>
					</div> <!-- End Blog Posts Content -->
					<!-- Sidebar -->
					<div class="col-md-4 col-sm-4">
						<div class="sidebar">
							<?php get_sidebar(); ?>
						</div>
					</div><!-- End Sidebar -->
				</div>
			</div>
		</div>
	</main><!-- .site-main -->
	<?php
get_footer();