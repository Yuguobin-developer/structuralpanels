<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Enhenyero
 * @since Enhenyero 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news'); ?>>
	<?php
	if ( has_post_thumbnail() ) {
		?>
		<div class="featured-img">
			<?php the_post_thumbnail(); ?>
			<span class="meta-date"><i class="fa fa-calendar"></i> <?php echo get_the_date( 'M', get_the_ID() ); ?> <?php echo get_the_date( 'd', get_the_ID() ); ?><?php echo __( ',', TXT_DOMAIN ); ?> <?php echo get_the_date( 'Y', get_the_ID() ); ?></span>
		</div>
		<?php
	}

	if ( is_single() ) :
		the_title( '<h3 class="entry-title">', '</h3>' );
	else :
		the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
	endif;
	
	if ( 'post' == get_post_type() ) {
		?>
		<hr>
		<p class="meta">
			<span class="meta-date">
				<i class="fa fa-calendar"></i> <?php echo get_the_date( 'M', get_the_ID() ); ?> <?php echo get_the_date( 'd', get_the_ID() ); ?><?php echo __( ',', TXT_DOMAIN ); ?> <?php echo get_the_date( 'Y', get_the_ID() ); ?>
			</span>
			<?php the_tags('<span class="meta-tags"><i class="fa fa-tags"></i> ',', ','</span>'); ?>
			<span class="meta-comments">
				<?php
				if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo '<i class="fa fa-comments"></i> <span class="comments-link">';
					comments_popup_link( __( 'Leave a comment', TXT_DOMAIN ), __( '1 Comment', TXT_DOMAIN ), __( '% Comments', TXT_DOMAIN ) );
					echo '</span>';
				}
				?>
			</span>
			<?php edit_post_link( __( 'Edit', TXT_DOMAIN ), '<i class="fa fa-pencil"></i> <span class="edit-link">', '</span>' ); ?>
		</p>
		<?php
	}

	if( is_single() ) {
		?>
		<div class="entry-content">
			<?php
			if ( 'team' == get_post_type() ) {
				?>
				<b><?php _e('Position: ', TXT_DOMAIN); ?></b>
				<?php echo get_post_meta( get_the_ID(), '_cmb_enhenyero_team_position', true ); ?>
				<br><br><p><?php echo get_post_meta( get_the_ID(), '_cmb_enhenyero_team_description', true ); ?></p>
				<?php
			}

			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'read more %s', TXT_DOMAIN ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			// wp_link_pages( array(
			// 	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
			// 	'after'       => '</div>',
			// 	'link_before' => '<span>',
			// 	'link_after'  => '</span>',
			// 	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
			// 	'separator'   => '<span class="screen-reader-text">, </span>',
			// ) );
			?>
		</div><!-- .entry-content -->
		<?php $slug = get_the_permalink();
		$title = get_the_title();  ?>
		<footer class="with_top_border">
			<div class="entry-meta divided-content regular darklinks grey"><p><em>Like this post? Share it! Or start a conversation by leaving us a comment! </em></p>
				<div id="share-icons"><i class="fa fa-share-alt"></i>  
					<a title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $slug; ?>" target="_blank" rel="nofollow noopener noreferrer" class="nolightbox"><i class="fa fa-facebook"></i></a>
					<a title="Share on Twitter" href="https://twitter.com/intent/tweet?url=<?php echo $slug; ?>" target="_blank" rel="nofollow noopener noreferrer"><i class="fa fa-twitter-square"></i></a>
					<a title="Share on LinkedIn" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $slug; ?>&amp;title=&amp;summary=&amp;source=" target="_blank" rel="nofollow noopener noreferrer"><i class="fa fa-linkedin"></i></a>
					<a title="Share on Tumblr" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $slug; ?>" target="_blank" rel="nofollow noopener noreferrer"><i class="fa fa-tumblr-square"></i></a>
					<a title="Share on Reddit" href="https://reddit.com/submit?url=<?php echo $slug; ?>" target="_blank" rel="nofollow noopener noreferrer"><i class="fa fa-reddit-square"></i></a>
					<?php
					$title = str_replace(array('& ', '&amp; ', ' '), array('%26 ', '%26 ', '%20'), html_entity_decode(get_the_title()));
					?>
					<a href="mailto:?subject=%5BRecommended%5D%20<?php echo $title; ?>&amp;body=Check%20out%20this%20article%20I%20think%20you'll%20like:%0A%0A<?php echo $title; ?>%0A<?php echo get_the_permalink(); ?>" title="Share by email"><i class="fa fa-envelope-square"></i></a>
				</div>
			</div>
		</footer>

		<div class="clearfix"></div>
		<div class="smallspacer"></div>

		<?php get_template_part( 'templates/post', 'navigation' ); ?>

		<div class="clearfix"></div>
		<div class="smallspacer"></div>

		<?php
	}
	else {
		?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
		<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo __( 'Read More', TXT_DOMAIN ); ?> <span class="fa fa-chevron-circle-right"></span></a>
		<?php
	} ?>
</article><!-- #post-## -->