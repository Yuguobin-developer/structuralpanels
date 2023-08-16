<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/organizer.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>

<div class="uk-width-medium-1-2">
	<h2 class="uk-h3"><?php echo tribe_get_organizer_label( ! $multiple ); ?></h2>
	<dl class="uk-margin-bottom-remove">
		<?php
		do_action( 'tribe_events_single_meta_organizer_section_start' );

		foreach ( $organizer_ids as $organizer ) {
			if ( ! $organizer ) {
				continue;
			}

			?>
			<dt style="display:none;"><?php // This element is just to make sure we have a valid HTML ?></dt>
			<dd><?php echo tribe_get_organizer_link( $organizer ) ?></dd>
			<?php
		}

		if ( ! $multiple ) { // only show organizer details if there is one
			if ( ! empty( $phone ) ) {
				?>
				<dt><?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?></dt>
				<dd><?php echo esc_html( $phone ); ?></dd>
				<?php
			}//end if

			if ( ! empty( $email ) ) {
				?>
				<dt><?php esc_html_e( 'Email:', 'the-events-calendar' ) ?></dt>
				<dd><?php echo esc_html( $email ); ?></dd>
				<?php
			}//end if

			if ( ! empty( $website ) ) {
				?>
				<dt><?php esc_html_e( 'Website:', 'the-events-calendar' ) ?></dt>
				<dd><?php echo $website; ?></dd>
				<?php
			}//end if
		}//end if

		do_action( 'tribe_events_single_meta_organizer_section_end' );
		?>
	</dl>
</div>
