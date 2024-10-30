/**
 * Live-update changes to the custom CSS.
 */
( function( $ ) {
	wp.customize( 'chromeless_widgets_page_css', function( value ) {
		value.bind( function( to ) {
			$( '#chromeless_widgets_page_css' ).html( to );
		} );
	} );
} )( jQuery );