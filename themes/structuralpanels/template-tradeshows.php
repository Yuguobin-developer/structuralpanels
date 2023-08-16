<?php
/*

Template Name: Tradeshows

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

						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							#get_template_part( 'content', 'page' );
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
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery(".additional-info").hide();
	jQuery(".read-more").click(function(){
		jQuery(this).parent().next(".additional-info").toggle();
		return false;
	});
});
</script>

<?php

$args = array(
	'post_type' => 'tradeshow',
	'posts_per_page' => '-1',
	'meta_key' => '_tradeshow_metadata_start_date',
	'orderby' => 'meta_value',
	'order' => 'ASC',
);

$query = new WP_Query($args);

if ($query->have_posts()) {
	$tradeshow_count = 0;
	while ($query->have_posts()) {
		$query->the_post();
		$id = get_the_ID();
		$end_date = $venue = $address = $city = $province = $website = $booth = $google_maps_search = $venue_location = $locale = '';
		$start_date = get_post_meta($id,'_tradeshow_metadata_start_date',1);
		$end_date = get_post_meta($id,'_tradeshow_metadata_end_date',1);
		$venue = get_post_meta($id,'_tradeshow_metadata_location',1);
		$address = get_post_meta($id,'_tradeshow_metadata_address',1);
		$city = get_post_meta($id,'_tradeshow_metadata_city',1);
		$province = get_post_meta($id,'_tradeshow_metadata_province',1);
		$booth = get_post_meta($id,'_tradeshow_metadata_booth',1);
		$website = get_post_meta($id,'_tradeshow_metadata_website',1);
		
		if ($city && $province) $locale = $city.', '.$province;
		elseif ($city && !$province) $locale = $city;
		elseif ($province && !$city) $locale = $province;
		
		if ($venue && $address) $venue_location = $venue.', '.$address;
		elseif ($venue && !$address) $venue_location = $venue;
		elseif ($address && !$venue) $venue_location = $address;
		
		if ($address && $city && $province) $google_maps_search = '<a href="https://www.google.com/maps/?q='.$address.' '.$city.' '.$province.'" target="_blank" title="View on Google Maps">'.$venue_location.'</a>';
		
		$start_month = date('M', $start_date);
		$start_day = date('j', $start_date);
		$start_dow = date('l', $start_date);
		$start_year = date('Y', $start_date);
		
		if ($end_date) {
			$end_month = date('M', $end_date);
			$end_day = date('j', $end_date);
			$end_dow = date('l', $end_date);
			$end_year = date('Y', $end_date);
			if ($start_year == $end_year) {
				$the_date = $start_dow.', '.$start_month.'. '.$start_day.' - '.$end_dow.', '.$end_month.'. '.$end_day.', '.$end_year;
			}
			else {
				$the_date = $start_dow.', '.$start_month.'. '.$start_day.', '.$start_year.' - '.$end_dow.', '.$end_month.'. '.$end_day.', '.$end_year;
			}
		
		}
		else {
			$the_date = $start_dow.', '.$start_month.'. '.$start_day.', '.$start_year;
			$end_date = $start_date;
		}
// 		Adjust $end_date for calendars and page display on day-of
		
// 		strtotime($end_date.' + 1 day');
// 		$event_date = strtotime($date);
$format = 'm/d/Y';
$today = DateTime::createFromFormat($format, date('m/d/Y'));
$start = DateTime::createFromFormat($format, date('m/d/Y',$start_date));
$end = DateTime::createFromFormat($format, date('m/d/Y',$end_date));
$adjusted_end_date = DateTime::createFromFormat($format, date('m/d/Y',$end_date));
$adjusted_end_date->add(new DateInterval('P1D'));

/*
echo "<p>Start: ".$start->format('d/m/Y')."</p>";
echo "<p>End: ".$end->format('d/m/Y')."</p>";
echo "<p>Adjusted: ".$adjusted_end_date->format('d/m/Y')."</p>";
*/
/*
var_dump($today);
echo '<br/>';
var_dump($end);
*/

		if ($today < $end) {

			echo '<div class="trade-show-event"><h2>'.get_the_title().'</h2>';
			
			echo '<p>';
			if ($the_date) echo '<span class="fa fa-calendar"></span> <a href="" onclick="var cal = ics(); cal.addEvent(\''.get_the_title().'\', \''.get_bloginfo('name').'\', \''.$venue_location.', '.$locale.'\', \''.date('m/d/Y',$start_date).'\', \''.$adjusted_end_date->format('m/d/Y').'\'); cal.download(\''.get_the_title().'\')">'.$the_date.'</a><br/>';
			if ($locale) echo '<span class="fa fa-compass"></span> '.$locale;
			echo '</p><p>
				<a href="'.get_the_permalink().'" class="read-more">More info <span class="fa fa-chevron-circle-right"></span></a>
			</p><div class="additional-info"><p>';
	
			if ($venue_location) echo '<span class="fa fa-map-marker"></span> ';
			if ($google_maps_search) echo $google_maps_search;
			else echo $venue_location;
			echo '<br/>';
			if ($booth) echo '<span class="fa fa-hashtag"></span> Booth '.$booth.'<br/>';
			if ($website) echo '<span class="fa fa-link"></span> <a href="'.$website.'" target="_blank">'.$website.'</a><br/>';
			
			the_content();
			echo '</p></div></div>';
			$tradeshow_count++;
		}
	}
}
wp_reset_postdata();

if ($tradeshow_count < 1) { the_content(); }

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
<?php


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