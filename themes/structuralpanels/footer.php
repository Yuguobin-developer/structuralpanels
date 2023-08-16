<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Enhenyero
 * @since Enhenyero 1.0
 */
	global $ert_option;
	if (!is_front_page()) {
// 		echo '<div class="fancybox-hidden"><div id="get-started-cta">'.do_shortcode('[contact-form-7 id="261" title="CTA Get Started"]').'</div></div>';
		echo do_shortcode('[spi-get-started]');
		}
?>
	<!-- Footer Area -->
	<div id="en-footer">
		<div class="footer-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-md-3">
						<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
							<?php dynamic_sidebar('sidebar-2'); ?>
						<?php endif; ?>
					</div>

					<div class="col-sm-3 col-md-3">
						<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
							<?php dynamic_sidebar('sidebar-3'); ?>
						<?php endif; ?>
					</div>

					<div class="col-sm-3 col-md-3">
						<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
							<?php dynamic_sidebar('sidebar-4'); ?>
						<?php endif; ?>
					</div>

					<div class="col-sm-3 col-md-3">
						<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
							<?php dynamic_sidebar('sidebar-5'); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-footer">
			<div class="container text-center">
				<?php if (!empty($ert_option['opt_copyright_text'])) echo '<p>'.html_entity_decode($ert_option['opt_copyright_text']).'</p>';?>
				<p>&copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url');?>"><?php bloginfo('title');?></a> All Rights Reserved. | <a href="<?php bloginfo('url');?>/sitemap/">Sitemap</a> &bull; <a href="<?php bloginfo('url');?>/warranty/">Warranty</a> | <a href="//canopymedia.ca/online-marketing-services/" target="_blank" rel="nofollow noopener noreferrer">Website services</a> provided by Canopy Media.</p>
			</div>
		</div>
	</div>

	<script>
	jQuery(document).ready(function(){
		jQuery('body.home #header-slider .carousel-caption a[href*="#"], #get-started-cta-1 a[href*="#"]').addClass("fancybox-inline");
		});
	</script>

	<?php wp_footer(); ?>

</body>
</html>