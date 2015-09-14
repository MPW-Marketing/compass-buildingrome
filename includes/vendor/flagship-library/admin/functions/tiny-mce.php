<?php
/**
 * Modifications to TinyMCE, the default WordPress editor.
 *
 * @package     FlagshipLibrary
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.4.0
 */

add_filter( 'mce_buttons', 'flagship_add_styleselect', 99 );
/**
 * Add styleselect button to the end of the first row of TinyMCE buttons.
 *
 * @since  1.4.0
 * @access public
 * @param  $buttons array existing TinyMCE buttons
 * @return $buttons array modified TinyMCE buttons
 */
function flagship_add_styleselect( $buttons ) {
	// Get rid of styleselect if it's been added somewhere else.
	if ( in_array( 'styleselect', $buttons ) ) {
		unset( $buttons['styleselect'] );
	}
	array_push( $buttons, 'styleselect' );
	return $buttons;
}

add_filter( 'mce_buttons_2', 'flagship_disable_styleselect', 99 );
/**
 * Remove styleselect button if it's been added to the second row of TinyMCE
 * buttons.
 *
 * @since  1.4.0
 * @access public
 * @param  $buttons array existing TinyMCE buttons
 * @return $buttons array modified TinyMCE buttons
 */
function flagship_disable_styleselect( $buttons ) {
	if ( in_array( 'styleselect', $buttons ) ) {
		unset( $buttons['styleselect'] );
	}
	return $buttons;
}

add_filter( 'tiny_mce_before_init', 'flagship_tiny_mce_formats', 99 );
/**
 * Add our custom Flagship styles to the styleselect dropdown button.
 *
 * @since  1.4.0
 * @access public
 * @param  $args array existing TinyMCE arguments
 * @return $args array modified TinyMCE arguments
 * @see    http://wordpress.stackexchange.com/a/128950/9844
 */
function flagship_tiny_mce_formats( $args ) {
	$flagship_formats = apply_filters( 'flagship_tiny_mce_formats',
		array(
			array(
				'title'    => __( 'Drop Cap', 'compassbuildingrome-mpw-rome' ),
				'inline'   => 'span',
				'classes'  => 'dropcap',
			),
			array(
				'title'    => __( 'Pull Quote Left', 'compassbuildingrome-mpw-rome' ),
				'block'    => 'blockquote',
				'classes'  => 'pullquote alignleft',
				'wrapper'  => true,
			),
			array(
				'title'    => __( 'Pull Quote Right', 'compassbuildingrome-mpw-rome' ),
				'block'    => 'blockquote',
				'classes'  => 'pullquote alignright',
				'wrapper'  => true,
			),
			array(
				'title'    => __( 'Intro Paragraph', 'compassbuildingrome-mpw-rome' ),
				'selector' => 'p',
				'classes'  => 'intro-pagragraph',
				'wrapper'  => true,
			),
			array(
				'title'    => __( 'Call to Action', 'compassbuildingrome-mpw-rome' ),
				'block'    => 'div',
				'classes'  => 'call-to-action',
				'wrapper'  => true,
				'exact'    => true,
			),
			array(
				'title'    => __( 'Feature Box', 'compassbuildingrome-mpw-rome' ),
				'block'    => 'div',
				'classes'  => 'feature-box',
				'wrapper'  => true,
				'exact'    => true,
			),
			array(
				'title'    => __( 'Code Block', 'compassbuildingrome-mpw-rome' ),
				'format'   => 'pre',
			),
			array(
				'title'    => __( 'Buttons', 'compassbuildingrome-mpw-rome' ),
				'items'    => array(
					array(
						'title'    => __( 'Standard', 'compassbuildingrome-mpw-rome' ),
						'selector' => 'a',
						'classes'  => 'button',
						'exact'    => true,
					),
					array(
						'title'    => __( 'Standard Block', 'compassbuildingrome-mpw-rome' ),
						'selector' => 'a',
						'classes'  => 'button block',
						'exact'    => true,
					),
					array(
						'title'    => __( 'Call to Action', 'compassbuildingrome-mpw-rome' ),
						'selector' => 'a',
						'classes'  => 'button secondary cta',
						'exact'    => true,
					),
					array(
						'title'    => __( 'Call to Action Block', 'compassbuildingrome-mpw-rome' ),
						'selector' => 'a',
						'classes'  => 'button secondary cta block',
						'exact'    => true,
					),
				),
			),
		)
	);
	// Merge with any existing formats which have been added by plugins.
	if ( ! empty( $args['style_formats'] ) ) {
		$existing_formats = json_decode( $args['style_formats'] );
		$flagship_formats = array_merge( $flagship_formats, $existing_formats );
	}

	$args['style_formats'] = json_encode( $flagship_formats );

	return $args;
}
