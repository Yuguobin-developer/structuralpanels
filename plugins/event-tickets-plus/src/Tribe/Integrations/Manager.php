<?php

namespace Tribe\Tickets\Plus\Integrations;

use Tribe\Tickets\Plus\Integrations\Elementor\Service_Provider as Elementor_Integration;

/**
 * Class Manager
 *
 * Loads and manages third-party plugin integration implementations.
 *
 * @since 5.4.4
 */
class Manager {

	/**
	 * The current instance of the object.
	 *
	 * @since 5.4.4
	 *
	 * @var Manager
	 */
	protected static $instance;

	/**
	 * The class singleton constructor.
	 *
	 * @return Manager
	 * @since 5.4.4
	 *
	 */
	public static function instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Conditionally loads the classes needed to integrate with third-party plugins.
	 *
	 * Third-party plugin integration classes and methods will be loaded only if
	 * supported plugins are activated.
	 *
	 * @since 5.4.4
	 */
	public function load_integrations() {
		$this->load_elementor_integration();
	}

	/**
	 * Loads the Elementor integration if Elementor is currently active.
	 *
	 * @since 5.4.4
	 */
	public function load_elementor_integration() {
		if ( ! defined( 'ELEMENTOR_PATH' ) || empty( ELEMENTOR_PATH ) ) {
			return;
		}

		tribe_register_provider( Elementor_Integration::class );
	}
}
