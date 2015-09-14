<?php
/**
 * Theme Setup Functions and Definitions.
 *
 * @package     CompassBuildingRome
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */

// Include Hybrid Core.
require_once( trailingslashit( get_template_directory() ) . 'hybrid-core/hybrid.php' );
new Hybrid();

add_action( 'after_setup_theme', 'compassbuildingrome_setup', 10 );
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since   1.0.0
 * @return  void
 */
function compassbuildingrome_setup() {
	// http://themehybrid.com/docs/theme-layouts
	add_theme_support(
		'theme-layouts',
		array(
			'1c'        => __( '1 Column Wide',                'compassbuildingrome-mpw-rome' ),
			'1c-narrow' => __( '1 Column Narrow',              'compassbuildingrome-mpw-rome' ),
			'2c-l'      => __( '2 Columns: Content / Sidebar', 'compassbuildingrome-mpw-rome' ),
			'2c-r'      => __( '2 Columns: Sidebar / Content', 'compassbuildingrome-mpw-rome' )
		),
		array( 'default' => is_rtl() ? '2c-r' :'2c-l' )
	);

	// http://themehybrid.com/docs/hybrid_set_content_width
	hybrid_set_content_width( 1140 );

	// http://codex.wordpress.org/Automatic_Feed_Links
	add_theme_support( 'automatic-feed-links' );

	// http://themehybrid.com/docs/hybrid-core-styles
	add_theme_support( 'hybrid-core-styles', array( 'style', 'google-fonts', ) );

	// https://github.com/FlagshipWP/flagship-library/wiki/Flagship-Site-Logo
	add_theme_support( 'site-logo', array('size' => 'medium', ) );

	// https://developer.wordpress.org/themes/functionality/navigation-menus/
	register_nav_menus( array(
		'primary'   => _x( 'Primary Menu', 'nav menu location', 'compassbuildingrome-mpw-rome' ),
		'secondary' => _x( 'Secondary Menu', 'nav menu location', 'compassbuildingrome-mpw-rome' ),
	) );

	// https://developer.wordpress.org/themes/functionality/post-formats/
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat',
	) );

	// https://github.com/justintadlock/breadcrumb-trail
	add_theme_support( 'breadcrumb-trail' );

	// https://github.com/justintadlock/get-the-image
	add_theme_support( 'get-the-image' );

	// http://themehybrid.com/docs/template-hierarchy
	add_theme_support( 'hybrid-core-template-hierarchy' );

	// https://github.com/FlagshipWP/flagship-library/wiki/Flagship-Author-Box
	add_theme_support( 'flagship-author-box' );

	// https://github.com/FlagshipWP/flagship-library/wiki/Flagship-Footer-Widgets
	add_theme_support( 'flagship-footer-widgets', 4 );
}

add_action( 'after_setup_theme', 'compassbuildingrome_includes', 10 );
/**
 * Load all required theme files.
 *
 * @since   1.0.0
 * @return  void
 */
function compassbuildingrome_includes() {
	// Set the includes directories.
	$includes_dir = trailingslashit( get_template_directory() ) . 'includes/';

	// Load the main file in the Flagship library directory.
	require_once $includes_dir . 'vendor/flagship-library/flagship-library.php';

	// Load all PHP files in the vendor directory.
	require_once $includes_dir . 'vendor/tha-theme-hooks.php';

	// Load all PHP files in the includes directory.
	require_once $includes_dir . 'compatibility.php';
	require_once $includes_dir . 'general.php';
	require_once $includes_dir . 'scripts.php';
	require_once $includes_dir . 'widgetize.php';
}

// define the tha_entry_top callback

function insert_layer_slider () {
	$post_id = get_the_id();
	$insert_slider = get_post_meta( $post_id, 'rw_layer_slide_show', true );
	if ($insert_slider){
		return layerslider($insert_slider);
	}
}

add_action( 'tha_entry_before', 'insert_layer_slider', 10 );

	require_once 'includes/class-tgm-plugin-activation.php';
	
function my_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from a GitHub repository in your theme.
		// This presumes that the plugin code is based in the root of the GitHub repository
		// and not in a subdirectory ('/src') of the repository.
		array(
			'name'      => 'MPW Quick Links',
			'slug'      => 'mpw-quick-links',
			'source'    => 'https://github.com/damonmaldonado/mpw-quick-links/archive/master.zip',
			'required' => true,
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Meta Box',
			'slug'      => 'meta-box',
			'required'  => true,
		),

		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );



// Add a hook for child themes to execute code.
do_action( 'flagship_after_setup_parent' );

  function column_func( $atts, $content="" ) {
    $divclass = "col";
    if ($atts['number'] != "") {
      $divclass = "col-" . $atts['number'];
    }
    return "<div class='" . $divclass . "'>" . $content . "</div>";
  }
  add_shortcode( 'column', 'column_func' );


  //add metabox to hide title

  add_filter( 'rwmb_meta_boxes', 'mpwrome_register_meta_boxes' );
function mpwrome_register_meta_boxes( $meta_boxes )
{
    $prefix = 'rw_';
    // 1st meta box
    $meta_boxes[] = array(
        'id'       => 'hide_title',
        'title'    => 'Hide Page Title',
        'pages'    => array( 'post', 'page' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name'  => 'Check to hide the title on this page',
                'id'    => $prefix . 'hide_title',
                'type'  => 'checkbox',
            )
        )
    );
     $meta_boxes[] = array(
        'id'       => 'layer_slider_show',
        'title'    => 'Insert Layer Slider On Page',
        'pages'    => array( 'post', 'page' ),
        'context'  => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name'  => 'Enter Layer Slider Number to insert Slider on this page',
                'id'    => $prefix . 'layer_slide_show',
                'type'  => 'text',
            )
        )
    );
    return $meta_boxes;
}
