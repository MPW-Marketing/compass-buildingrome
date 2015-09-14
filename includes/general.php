<?php
/**
 * General Theme-Specific Functions.
 *
 * @package     CompassBuildingRome
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */

add_action( 'init', 'compassbuildingrome_register_image_sizes', 5 );
/**
 * Register custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function compassbuildingrome_register_image_sizes() {
	// Set the 'post-thumbnail' size.
	set_post_thumbnail_size( 175, 130, true );

	// Add the 'compassbuildingrome-full' image size.
	add_image_size( 'compassbuildingrome-full', 1025, 500, true );
}

add_filter( 'excerpt_length', 'compassbuildingrome_excerpt_length' );
/**
 * Add a custom excerpt length.
 *
 * @since  1.0.0
 * @access public
 * @param  integer $length
 * @return integer
 */
function compassbuildingrome_excerpt_length( $length ) {
	return 60;
}

add_action( 'tha_entry_top', 'compassbuildingrome_do_sticky_banner' );
/**
 * Add markup for a sticky ribbon on sticky posts in archive views.
 *
 * @since   1.0.0
 * @return  void
 */
function compassbuildingrome_do_sticky_banner() {
	if ( is_singular() || ! is_sticky() ) {
		return;
	}
	?>
	<div class="corner-ribbon sticky">
		<p class="ribbon-content"><?php _e( 'Sticky', 'compassbuildingrome-mpw-rome' ); ?></p>
	</div>
	<?php
}
