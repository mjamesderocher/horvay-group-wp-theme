<?php
/**
 * horvay-group Theme Customizer
 *
 * @package horvay-group
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function horvay_group_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	/**
	 * Add Checkbox to Display Site Title.
	 */

	$wp_customize->add_setting( 'display_title',
	   array(
	      'default' => 0,
	      'transport' => 'refresh'
	   )
	);
	 
	$wp_customize->add_control( 'display_title',
	   array(
	      'label' => __( 'Force Hide Site Title'),
	      'description' => esc_html__( 'Check this if you want to display the description, but not the title.' ),
	      'section'  => 'title_tagline',
	      'priority' => 50, // Optional. Order priority to load the control. Default: 10
	      'type'=> 'checkbox',
	      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
	   )
	);


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'horvay_group_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'horvay_group_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'horvay_group_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function horvay_group_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function horvay_group_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function horvay_group_customize_preview_js() {
	wp_enqueue_script( 'horvay-group-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'horvay_group_customize_preview_js' );