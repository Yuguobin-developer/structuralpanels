<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 */


$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date( null, false );
$start_time = tribe_get_start_date( null, false, $time_format );
$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date( null, false );
$end_time = tribe_get_end_date( null, false, $time_format );
$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$time_formatted = null;
if ( $start_time == $end_time ) {
	$time_formatted = esc_html( $start_time );
} else {
	$time_formatted = esc_html( $start_time . $time_range_separator . $end_time );
}

$event_id = Tribe__Main::post_id_helper();

/**
 * Returns a formatted time for a single event
 *
 * @var string Formatted time string
 * @var int Event post id
 */
$time_formatted = apply_filters( 'tribe_events_single_event_time_formatted', $time_formatted, $event_id );

/**
 * Returns the title of the "Time" section of event details
 *
 * @var string Time title
 * @var int Event post id
 */
$time_title = apply_filters( 'tribe_events_single_event_time_title', __( 'Time:', 'the-events-calendar' ), $event_id );

$cost    = tribe_get_formatted_cost();
$website = tribe_get_event_website_link();
?>

<div class="uk-width-medium-1-2">
	<h2 class="uk-h3"> <?php esc_html_e( 'Details', 'the-events-calendar' ) ?> </h2>
	<dl class="uk-margin-bottom-remove">

		<?php
		do_action( 'tribe_events_single_meta_details_section_start' );

		// All day (multiday) events
		if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :
			?>

			<dt><?php esc_html_e( 'Start:', 'the-events-calendar' ) ?></dt>
			<dd><?php esc_html_e( $start_date ) ?></dd>

			<dt><?php esc_html_e( 'End:', 'the-events-calendar' ) ?></dt>
			<dd><?php esc_html_e( $end_date ) ?></dd>

		<?php
		// All day (single day) events
		elseif ( tribe_event_is_all_day() ):
			?>

			<dt><?php esc_html_e( 'Date:', 'the-events-calendar' ) ?></dt>
			<dd><?php esc_html_e( $start_date ) ?></dd>

		<?php
		// Multiday events
		elseif ( tribe_event_is_multiday() ) :
			?>

			<dt><?php esc_html_e( 'Start:', 'the-events-calendar' ) ?></dt>
			<dd><?php esc_html_e( $start_datetime ) ?></dd>

			<dt> <?php esc_html_e( 'End:', 'the-events-calendar' ) ?> </dt>
			<dd><?php esc_html_e( $end_datetime ) ?></dd>

		<?php
		// Single day events
		else :
			?>

			<dt><?php esc_html_e( 'Date:', 'the-events-calendar' ) ?></dt>
			<dd><?php esc_html_e( $start_date ) ?></dd>

			<dt><?php echo esc_html( $time_title ); ?></dt>
			<dd><?php echo $time_formatted; ?></dd>

		<?php endif ?>

		<?php
		// Event Cost
		if ( ! empty( $cost ) ) : ?>

			<dt><?php esc_html_e( 'Cost:', 'the-events-calendar' ) ?></dt>
			<dd><?php esc_html_e( $cost ); ?></dd>

		<?php endif ?>

		<?php
		echo tribe_get_event_categories(
			get_the_id(), array(
				'before'       => '',
				'sep'          => ', ',
				'after'        => '',
				'label'        => null, // An appropriate plural/singular label will be provided
				'label_before' => '<dt class="tribe-events-event-categories-label">',
				'label_after'  => '</dt>',
				'wrap_before'  => '<dd class="tribe-events-event-categories">',
				'wrap_after'   => '</dd>',
			)
		);
		?>

		<?php echo tribe_meta_event_tags( sprintf( esc_html__( '%s Tags:', 'the-events-calendar' ), tribe_get_event_label_singular() ), ', ', false ) ?>

		<?php
		// Event Website
		if ( ! empty( $website ) ) : ?>

			<dt><?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> </dt>
			<dd> <?php echo $website; ?> </dd>

		<?php endif ?>

		<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>
	</dl>
</div>
