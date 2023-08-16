<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Enhenyero
 * @since Enhenyero 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
/*
	if( has_post_thumbnail() ) : ?>
		<header class="entry-header">
			<div class="entry-cover blog-preview">
				<?php the_post_thumbnail('full'); ?>
			</div>
		</header><!-- .entry-header -->
		<?php
	endif;
*/
	?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
