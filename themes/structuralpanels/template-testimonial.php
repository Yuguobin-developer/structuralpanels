<?php 

/*
Template Name: Testimonial Page
*/

get_header();

$page_layout = get_post_meta( get_the_ID(), '_cmb_enhenyero_page_layout', true );
	


?>
	<main id="main" class="site-main" role="main">
		<div id="en-content">
			<div class="row">
				<div class="container p_z">
					<div class="<?php if( $page_layout != 'without_sidebar' ) { echo 'col-md-8 col-sm-8'; } else { echo 'col-md-12'; } ?>">
						<?php
						if( IsNullOrEmptyString( $page_editional_title ) || IsNullOrEmptyString( $page_short_description ) || IsNullOrEmptyString( $page_description ) ) {
							?>
							<div class="container-fluid p_z">
								<!-- Left Content 4 Cols -->
								<div class="col-sm-4 page-additional-title col-md-4 p_l_z">
									<div class="section-title text-left"> <!-- Left Section Title -->
										<?php
										if( IsNullOrEmptyString( $page_editional_title ) ) {
											?>
											<h2><?php echo esc_html ( $page_editional_title ); ?></h2>
											<hr>
											<?php
										}
										?>
										<small><?php echo wpautop( $page_short_description ); ?></small>
									</div>
								</div>
								<!-- Right Content 8 Cols -->
								<div class="col-sm-8 col-md-8 p_r_z">
									<?php echo wpautop( $page_description ); ?>
								</div>
							</div>
							<?php
						}

if ($post->post_content != '') {
	echo '<div class="content">';
	the_content();
	echo '</div>';
	}


$query = new WP_Query(array(
    'post_type' => 'testimonials',
    'posts_per_page' => -1,
    'post_status' => 'publish'
));
$i = 1;

if ($query->have_posts()) {
	while ($query->have_posts()) {
		$query->the_post();
		?>
		<div class="col-md-6 testimonial-list<?php if (($i%2 != 0 )) echo ' first';?>">
			<div class="testimonial-inner">
				<?php if ($post->_testimonial_pullquote): ?><h2 class="pull-quote-title"><a class="" href="#"><?php echo $post->_testimonial_pullquote;?></a></h2><?php endif; ?>
				<?php
					$readmore_linktext = 'continue reading';
	                if ($post->_testimonial_video) {
		                ?>
		                <div class="responsive-embed-container">
			                <?php echo $post->_testimonial_video;?>
		                </div>
		                <?php
	// 		            $readmore_linktext = 'watch the video';
		                }
		            else {
			          	echo $post->_cmb_enhenyero_testimonial_txt;
	                ?>
				<?php }?>
				<div class="author-info">
					<?php /* ?>
					<div class="testimonial-img">
					<?php
						if (has_post_thumbnail()) the_post_thumbnail('thumbnail');
						else echo '<i class="fa fa-user-circle-o" aria-hidden="true"></i>';
	// 					else echo '<img src="'.get_stylesheet_directory_uri().'/images/instructor-template-image.jpg" alt="default" />';
						?>
					</div> 
					<?php */ ?>
					<div class="author-name">
						<h4><?php the_title(); ?></h4>
						<?php  if($post->_testimonial_title): ?><h5 class="t-job"><?php echo get_post_meta( get_the_ID(), '_testimonial_title', true ); ?></h5><?php endif; ?>
						<?php  if($post->_testimonial_location): ?><h5><?php echo $post->_testimonial_location; ?></h5><?php endif; ?>
						
					</div>  
				</div>
			</div>
		</div>
	<?php
// 		edit_post_link('Edit');
		$i++;
		}
	}

wp_reset_query();
?>
</div>
</div>
</div>
</div>
</main>
<?php 

//echo '<div class="content"><a class="icon-fa-comment" href="/submit-a-testimonial/">Want to share your RP4K experience? <strong>Submit your own testimonial here</strong>.</a></div>';

get_footer();