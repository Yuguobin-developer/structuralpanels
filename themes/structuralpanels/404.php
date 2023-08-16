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
				<div class="col-sm-4 col-md-4">
					<div class="error">
						<i class="flaticon-constructor7"></i>
					</div>
				</div>
				<div class="col-sm-8 col-md-6">
					<div class="error-text">
						<h1>404</h1>
						<h2>OOPS! PAGE NOT FOUND</h2>
						<br />
						<p>We tried to find the page you're looking for, but came up with nothing.</p>
						<br />
						<?php echo get_search_form();?>
						<p><a class="read-more" href="<?php echo esc_url(home_url( '/sitemap/' ));?>">View our sitemap <span class="fa fa-chevron-circle-right"></span></a></p>
					</div>
				</div>
			</div>
		</div>
	</main><!-- .site-main -->
<?php get_footer(); ?>