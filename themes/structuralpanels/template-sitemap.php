<?php
/*

Template Name: Sitemap

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
			<div class="row">
				<div class="container p_z">
					<div class="col-md-12">
						<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="entry-content">
							<?php the_content(); ?>
							</div><!-- .entry-content -->

						</article><!-- #post-## -->
						<?php endwhile; ?>
					</div>
					
					
				</div>
			</div>
		</div><!-- /.container -->
	</main><!-- .site-main -->
	<?php
get_footer();