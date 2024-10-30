<?php
/*
 * Template that renders a widget area without theme chrome.
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo( 'title' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<?php
	/*
	 * Action in the <head> of the page template, like `wp_head`, and calling `wp_head` by default.
	 */
	do_action( 'chromeless_widgets_page_head' );
?>
</head>
<body <?php body_class(); ?>>
	<section class="widgets-container">
		<?php dynamic_sidebar( 'chromeless-widgets-page' ); ?>
	</section>
<?php
	/*
	 * Action just before </body> of page template, like `wp_footer` and calling `wp_footer` by default.
	 */
	do_action( 'chromeless_widgets_page_footer' );
?>
</body>
</html>