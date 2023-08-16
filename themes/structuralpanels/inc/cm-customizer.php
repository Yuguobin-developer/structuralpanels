<?php

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cm_customize_register( $wp_customize ) {
	
/*  Alert Banner Section */
	$wp_customize->add_section( 'alert-banner' , array(
	    'title'      => 'Alert Banner',
	    'priority'   => 30,
	) );
	
		$wp_customize->add_setting('fa_icon', array(
			'default' => '',
			"transport" => "refresh"
		));

		$wp_customize->selective_refresh->add_partial( 'fa_icon', array(
			'selector' => '.fa_icon',
			'render_callback' => '__return_false',
			) );

		$wp_customize->add_control('fa_icon', array(
			'label'   => 'Font Awesome Icon',
			'section' => 'alert-banner',
			'type'    => 'text',
		));

		$wp_customize->add_setting('alert-banner', array(
			'default' => '',
			"transport" => "refresh"
		));

		$wp_customize->selective_refresh->add_partial( 'alert-banner', array(
			'selector' => '.alert-banner',
			'render_callback' => '__return_false',
			) );

		$wp_customize->add_control('alert-banner', array(
			'label'   => 'Alert Banner',
			'section' => 'alert-banner',
			'type'    => 'text',
		));

		$wp_customize->add_setting('alert-link', array(
			'default' => '',
			"transport" => "refresh"
		));
		$wp_customize->add_control('alert-link', array(
			'label'   => 'Alert Banner Link',
			'section' => 'alert-banner',
			'type'    => 'text',
		));
	
		$wp_customize->add_setting('alert-background-color', array(
			'default' => '',
			"transport" => "refresh"
		));

		$wp_customize->selective_refresh->add_partial( 'alert-background-color', array(
			'selector' => '.alert-background-color',
			'render_callback' => '__return_false',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'alert-background-color', array(
			'label' => 'Background Colour',
			'section' => 'alert-banner',
			'settings' => 'alert-background-color',
		)));
	
		$wp_customize->add_setting('text-alert-color', array(
			'default' => '',
			"transport" => "refresh"
		));

		$wp_customize->selective_refresh->add_partial( 'text-alert-color', array(
			'selector' => '.text-alert-color',
			'render_callback' => '__return_false',
			) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text-alert-color', array(
			'label' => 'Text Colour',
			'section' => 'alert-banner',
			'settings' => 'text-alert-color'
		)));
		
		$wp_customize->add_setting('alert-on', array(
			'default' => '',
			"transport" => "refresh"
		));
		
		$wp_customize->add_control('alert-on', array(
			'label'   => 'Alert Banner Showing',
			'section' => 'alert-banner',
			'type'    => 'checkbox',
		));
}

add_action( 'customize_register', 'cm_customize_register', 30);

?>