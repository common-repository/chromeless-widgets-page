<?php

// Add Customizer settings and controls.
add_action( 'customize_register', 'chromeless_widgets_page_customize_register' );
function chromeless_widgets_page_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'chromeless_widgets_page', array(
		'title'    => __( 'Chromeless Widgets Page' ),
	) );

	// Page slug option.
	$wp_customize->add_setting( 'chromeless_widgets_page_slug', array(
		'default'           => 'custom-full-page',
		'type'              => 'option',
		'capability'        => 'manage_options',
		'sanitize_callback' => 'sanitize_title', // This function is designed for satitizing a post slug.
	) );

	$wp_customize->add_control( 'chromeless_widgets_page_slug', array(
		'type'        => 'text',
		'label'       => 'Page Slug',
		'description' => __( 'This is the url extension where the page will be located. If it matches a page that has actual content, that content will no longer be accessible.' ),
		'section'     => 'chromeless_widgets_page',
	) );

	$wp_customize->add_setting( 'chromeless_widgets_page_css', array( 
		'type'      => 'option',
		'capablity' => 'manage_options',
		'transport' => 'postMessage',
	) );

	if ( class_exists ( 'WP_Customize_Code_Editor_Control' ) ) {
		$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'chromeless_widgets_page_css', array(
			'code_type'   => 'text/css',
			'label'           => 'Page CSS',
			'description'     => 'Add styling rules here for quick customization.',
			'section'         => 'chromeless_widgets_page',
			'active_callback' => 'chromeless_widgets_page_on_page',
		) ) );
	} else {
		$wp_customize->add_control( 'chromeless_widgets_page_css', array(
			'type'            => 'textarea',
			'label'           => 'Page CSS',
			'description'     => 'Add styling rules here for quick customization.',
			'section'         => 'chromeless_widgets_page',
			'active_callback' => 'chromeless_widgets_page_on_page',
		) );
	}
}

// Return whether we're on the page.
function chromeless_widgets_page_on_page() {
	global $wp;
	if ( get_option( 'chromeless_widgets_page_slug', 'custom-full-page' ) === $wp->request ) {
		return true;
	} else {
		return false;
	}
}

// CSS Output.
add_action( 'chromeless_widgets_page_head', 'chromeless_widgets_page_css' );
function chromeless_widgets_page_css() {
	$css = get_option( 'chromeless_widgets_page_css', '' );
	echo '<style type="text/css" id="chromeless_widgets_page_css">';
	echo wp_kses_data( $css );
	echo '</style>';
}

// Enqueue live-previewing script.
add_action( 'customize_preview_init', 'chromeless_widgets_page_customize_preview_scripts' );
function chromeless_widgets_page_customize_preview_scripts() {
	wp_enqueue_script( 'chromeless_widgets_page_customize_preview', plugin_dir_url( __FILE__ ) . 'customize-preview.js', array( 'customize-preview' ) );
}
