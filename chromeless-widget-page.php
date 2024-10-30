<?php
/**
 * Plugin Name: Chrome-less Widgets Page
 * Plugin URI: http://celloexpressions.com/plugins/chromeless-widgets-page
 * Description: Framework for building a page that's largely external to the rest of the site and uses widgets for all of its content.
 * Version: 1.2
 * Author: Nick Halsey
 * Author URI: http://celloexpressions.com/
 * Tags: Widgets, external, one-page
 * License: GPLv2

=====================================================================================
Copyright (C) 2024 Nick Halsey

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with WordPress; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
=====================================================================================
*/

/**
 * Take over WordPress when we're on the specified slug, using the custom template instead of the theme or a 404 page.
 *
 * Note that this will make any actual content located at this URL inaccessible.
 *
 */
function chromeless_widget_page_template_redirect() {
	global $wp;
	if ( get_option( 'chromeless_widgets_page_slug', 'custom-full-page' ) === $wp->request ) {
		chromeless_widget_page_takeover_page();
	}
}
add_action('template_redirect', 'chromeless_widget_page_template_redirect');

function chromeless_widget_page_takeover_page() {
	global $wp_query;

	// If we have a 404 status, ie, WordPress doesn't have anything at this URL, override it.
	if ( $wp_query->is_404 ) {
		$wp_query->is_404 = false;
		$wp_query->is_archive = true;
		// Change the header to 200 OK.
		header("HTTP/1.1 200 OK");
	}
	
	// Load slideshow page.
	require_once( 'page-template.php' );

	// Stop execution.
	exit;
}

// Add the core `wp_head` and `wp_footer` actions to our custom actions in the page template.
add_action( 'chromeless_widgets_page_head', 'wp_head' );
add_action( 'chromeless_widgets_page_footer', 'wp_footer' );

// Register the widget area. the page only contains one area, positioning can be done with CSS.
add_action( 'widgets_init', 'chromeless_widgets_page_widgets_init' );
function chromeless_widgets_page_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Chromeless Widgets Page' ),
		'id'            => 'chromeless-widgets-page',
		'description'   => '',
		'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget'  => '</article>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

// Set up options in the Customizer.
require_once( 'customize-options.php' );
