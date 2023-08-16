<?php
/**
 * The template used for displaying work post type content
 *
 * @package WordPress
 * @subpackage Enhenyero
 * @since Enhenyero 1.0
 */

$date = get_the_date();
$location = get_post_meta($post->ID,'_work_metadata_location',true);
$portfolio_images = get_post_meta($post->ID,'work_slide_images',true);
$work_meta = '';
$the_categories = '';
$separator = ', ';
$get_categories = get_terms('work_categories');
if ($date && $location) $work_meta = '<p class="work-meta">'.$date.'<br/>'.$location.'</p>';
elseif ($date && !$location) $work_meta = '<p class="work-meta">'.$date.'</p>';
elseif (!$date && $location) $work_meta = '<p class="work-meta">'.$location.'</p>';
if ( ! empty( $get_categories ) ) {
    foreach( $get_categories as $category ) {
        $the_categories .= esc_html($category->name).$separator;
    }
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if( has_post_thumbnail() ) : ?>
		<header class="entry-header">
			<div class="entry-cover blog-preview">
				<?php the_post_thumbnail('full'); ?>
			</div>
		</header><!-- .entry-header -->
		<?php
	endif; ?>

	<div class="entry-content">
		<?php
			if ($work_meta != '') echo $work_meta;
			if ($the_categories != '') echo '<p class="work-meta">'.trim( $the_categories, $separator ).'</p>';

			the_content();

			/* Portfolio Image : Carousel */
			if( count( $portfolio_images ) > 0 && is_array( $portfolio_images ) ) {
				?>
				<div id="imageSlider" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php
						for( $j=0; $j < count( $portfolio_images ); $j++ ) {
							?><li data-target="#imageSlider" data-slide-to="<?php echo esc_attr( $j ); ?>" class="<?php if( $j == 0 ) { echo 'active'; } ?>"></li><?php
						}
						?>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php
						$i = 1;
						foreach ( (array) $portfolio_images as $attachment_id => $attachment_url ) {
							?>
							<div class="item<?php if( $i == 1 ) { echo ' active'; } ?>">
								<?php echo wp_get_attachment_image( $attachment_id, 'thumb-800-500' ); ?>
							</div>
							<?php
							$i++;
						}
						?>
					</div>
					<a class="nofancybox left carousel-control nolightbox" href="#imageSlider" role="button" data-slide="prev">
						<span class="fa fa-long-arrow-left" aria-hidden="true"></span>
					</a>
					<a class="nofancybox right carousel-control nolightbox" href="#imageSlider" role="button" data-slide="next">
						<span class="fa fa-long-arrow-right" aria-hidden="true"></span>
					</a>
					<a class="nofancybox center pause carousel-control nolightbox" href="#imageSlider" role="button" data-slide="pause">
						<span class="fa fa-pause" aria-hidden="true"></span>
					</a>
					<a class="nofancybox center play carousel-control nolightbox" role="button" data-slide="play">
						<span class="fa fa-play" aria-hidden="true"></span>
					</a>
				</div>
	
				<?php
			}

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
	<?php $slug = get_the_permalink();
	$title = get_the_title(); ?>
	
	<footer class="with_top_border">
		<div class="entry-meta divided-content regular darklinks grey"><p><em>Like this post? Share it!</em></p>
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

</article><!-- #post-## -->
