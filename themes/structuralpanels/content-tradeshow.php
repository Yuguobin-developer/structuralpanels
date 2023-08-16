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

$id = get_the_ID();
$end_date = $venue = $address = $city = $province = $website = $booth = $google_maps_search = '';
$start_date = get_post_meta($id,'_tradeshow_metadata_start_date',1);
$end_date = get_post_meta($id,'_tradeshow_metadata_end_date',1);
$venue = get_post_meta($id,'_tradeshow_metadata_location',1);
$address = get_post_meta($id,'_tradeshow_metadata_address',1);
$city = get_post_meta($id,'_tradeshow_metadata_city',1);
$province = get_post_meta($id,'_tradeshow_metadata_province',1);
if ($address && $city && $province) $google_maps_search = 'https://www.google.com/maps/?q='.$address.' '.$city.' '.$province;
$booth = get_post_meta($id,'_tradeshow_metadata_booth',1);
$website = get_post_meta($id,'_tradeshow_metadata_website',1);

$start_month = date('M', $start_date);
$start_day = date('j', $start_date);
$start_year = date('Y', $start_date);

if ($end_date) {
	$end_month = date('M', $end_date);
	$end_day = date('j', $end_date);
	$end_year = date('Y', $end_date);
	if ($start_month == $end_month && $start_year == $end_year) {
		$the_date = $start_month.'. '.$start_day.' - '.$end_day.', '.$end_year;
	}
	elseif ($start_month != $end_month && $start_year == $end_year) {
		$the_date = $start_month.'. '.$start_day.' - '.$end_month.'. '.$end_day.', '.$end_year;
	}
	else {
		$the_date = $start_month.'. '.$start_day.', '.$start_year.' - '.$end_month.'. '.$end_day.', '.$end_year;
	}
}
else {
	$the_date = $start_month.'. '.$start_day.', '.$start_year;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('news'); ?>>
	<?php
	if ( has_post_thumbnail() ) {
		?>
		<div class="featured-img">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php
	}
		?>
		<div class="entry-content">
			<p><span class="fa fa-calendar"></span> <?php echo $the_date;?></p>
			<p class="fontawe-address"><?php if ($venue) echo $venue; if ($address) echo '<br/>',$address; if ($city) echo '<br/>',$city; if ($province) echo ', ',$province;?></p>
			<?php
				if ($google_maps_search) {?>
			<p><span class="fa fa-location-arrow"></span> <a href="<?php echo $google_maps_search;?>" target="_blank">View on Google Maps</a></p>
			<?php }
				if ($booth) {?>
			<p><span class="fa fa-hashtag"></span> Booth <?php echo $booth;?></p>
			<?php }
				if ($website) {?>
			<p><span class="fa fa-link"></span> <a href="<?php echo $website;?>" target="_blank"><?php echo $website;?></a></p>
			<?php }

			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'read more %s', TXT_DOMAIN ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			?>
		</div><!-- .entry-content -->

		<div class="clearfix"></div>
		<div class="smallspacer"></div>

</article><!-- #post-## -->