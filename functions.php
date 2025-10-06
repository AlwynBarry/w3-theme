<?php
/**
 * w3 Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 *
 * @author		Alwyn Barry
 * @copyright	2021
 * For use in	w3-theme
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version		1.0.2
 * 
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * 
 * @package w3_theme
 */


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wt_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wt_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Cambray W3, use a find and replace
		 * to change 'wt' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wt', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in three locations.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'wt' ),
				'menu-2' => __('Secondary', 'wt'),
				'menu-3' => __('Tertiary', 'wt'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wt_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 250;
		$logo_height = 90;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		
		
		/**
		 * Additions to core underscores provision from here
		**/
		
		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		
		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Base', 'wt' ),
				'slug'  => 'wt-base',
				'color' => '#ffffff',
			),
			array(
				'name'  => __( 'Contrast', 'wt' ),
				'slug'  => 'wt-contrast',
				'color' => '#333333',
			),
			array(
				'name'  => __( 'Primary', 'wt' ),
				'slug'  => 'wt-primary',
				'color' => '#3a76ca',
			),
			array(
				'name'  => __( 'Primary Lighter', 'wt' ),
				'slug'  => 'wt-primary-lighter',
				'color' => '#89ade0',
			),
			array(
				'name'  => __( 'Primary Lightest', 'wt' ),
				'slug'  => 'wt-primary-lightest',
				'color' => '#f3f7fc',
			),
			array(
				'name'  => __( 'Primary Darker', 'wt' ),
				'slug'  => 'wt-primary-darker',
				'color' => '#2c5ea4',
			),
			array(
				'name'  => __( 'Secondary', 'wt' ),
				'slug'  => 'wt-secondary',
				'color' => '#76ca3a',
			),
			array(
				'name'  => __( 'Secondary Lighter', 'wt' ),
				'slug'  => 'wt-secondary-lighter',
				'color' => '#ade089',
			),
			array(
				'name'  => __( 'Secondary Darker', 'wt' ),
				'slug'  => 'wt-secondary-darker',
				'color' => '#5ea42c',
			),
			array(
				'name'  => __( 'Tertiary', 'wt' ),
				'slug'  => 'wt-tertiary',
				'color' => '#ca3a76',
			),
			array(
				'name'  => __( 'Tertiary Lighter', 'wt' ),
				'slug'  => 'wt-tertiary-lighter',
				'color' => '#e089ad',
			),
			array(
				'name'  => __( 'Tertiary Darker', 'wt' ),
				'slug'  => 'wt-tertiary-darker',
				'color' => '#a42c5e',
			),
			array(
				'name'  => __( 'Grey', 'wt' ),
				'slug'  => 'wt-grey',
				'color' => '#acaeaf',
			),
			array(
				'name'  => __( 'Light Grey', 'wt' ),
				'slug'  => 'wt-grey-lighter',
				'color' => '#eee',
			),
			array(
				'name'  => __( 'Dark Grey', 'wt' ),
				'slug'  => 'wt-grey-darker',
				'color' => '#333',
			),
			array(
				'name'  => __( 'Text', 'wt' ),
				'slug'  => 'wt-text',
				'color' => '#333',
			),
			array(
				'name'  => __( 'Light Text', 'wt' ),
				'slug'  => 'wt-text-lighter',
				'color' => '#fff',
			),
			array(
				'name'  => __( 'Mid Text', 'wt' ),
				'slug'  => 'wt-text-mid',
				'color' => '#acaeaf',
			),
			array(
				'name'  => __( 'Link', 'wt' ),
				'slug'  => 'wt-link',
				'color' => '#3a76ca',
			),
			array(
				'name'  => __( 'Link Hover', 'wt' ),
				'slug'  => 'wt-link-hover',
				'color' => '#6fc6e0',
			),
			array(
				'name'  => __( 'Breadcrumb Link', 'wt' ),
				'slug'  => 'wt-breadcrumb-link',
				'color' => '#99ccff',
			),
			array(
				'name'  => __( 'Breadcrumb Link Hover', 'wt' ),
				'slug'  => 'wt-breadcrumb-link-hover',
				'color' => '#99ffff',
			),
		) );	

		// Add pages support for Excerpts - to provide short intro for page sliders and boxes
		add_post_type_support( 'page', 'excerpt' );
		
	}
endif;
add_action( 'after_setup_theme', 'wt_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wt_content_width', 768 );
}
add_action( 'after_setup_theme', 'wt_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wt_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'TopBar-Left', 'wt' ),
			'id'            => 'wt-site-topbar-left',
			'description'   => esc_html__( 'Add widgets here.', 'wt' ),
			'before_widget' => '<div id="%1$s" class="%2$s w3-bar-item wt-topbar-left-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="wt-topbar-widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'TopBar-Right', 'wt' ),
			'id'            => 'wt-site-topbar-right',
			'description'   => esc_html__( 'Add widgets here.', 'wt' ),
			'before_widget' => '<div id="%1$s" class="%2$s w3-bar-item wt-topbar-right-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="wt-topbar-widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wt' ),
			'id'            => 'wt-site-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'wt' ),
			'before_widget' => '<aside id="%1$s" class="%2$s wt-sidebar-widget w3-container w3-section">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="wt-sidebar-widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'wt' ),
			'id'            => 'wt-site-footer',
			'description'   => esc_html__( 'Add widgets here.', 'wt' ),
			'before_widget' => '<aside id="%1$s" class="%2$s wt-footer-widget w3-container w3-cell w3-cell-middle w3-center w3-mobile">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="wt-footer-widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'BottomBar', 'wt' ),
			'id'            => 'wt-site-bottom-bar',
			'description'   => esc_html__( 'Add widgets here.', 'wt' ),
			'before_widget' => '<div id="%1$s" class="%2$s wt-bottom-bar-widget w3-container w3-cell w3-cell-middle w3-center w3-mobile">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="wt-bottom-bar-widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'wt_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function wt_scripts() {
	wp_enqueue_style( 'wt-blocks-style', get_template_directory_uri() . '/css/blocks.css', array() );
	wp_enqueue_style( 'wt-getwid-style', get_template_directory_uri() . '/css/getwid-style.css', array( 'wt-blocks-style' ) );

	wp_enqueue_style( 'wt-w3css-style', get_template_directory_uri() . '/css/w3.css', array( 'wt-blocks-style' ) );
	wp_enqueue_style( 'w3m-topnav-style', get_template_directory_uri() . '/css/w3m-topnav.css', array( 'wt-w3css-style' ) );


	wp_register_style('wt-fontawesome-css', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css', array(), '4.7.0', 'all');
	wp_enqueue_style('wt-fontawesome-css');

	wp_enqueue_style( 'wt-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400;1,600;1,700&display=swap');

	wp_enqueue_style( 'wt-style', get_stylesheet_uri(), array( 'wt-blocks-style', 'wt-getwid-style', 'wt-w3css-style', 'w3m-topnav-style' ), _S_VERSION );
	wp_style_add_data( 'wt-style', 'rtl', 'replace' );

	wp_enqueue_script( 'w3m-topnav-script', get_template_directory_uri() . '/js/w3m-topnav.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wt_shrink-header-script', get_template_directory_uri() . '/js/shrink-header.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wt_stick-header-script', get_template_directory_uri() . '/js/stick-header.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wt_scroll-to-top-script', get_template_directory_uri() . '/js/scroll-to-top.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wt_scripts' );


/**
 * Ensure the Block Editor has the custom styles too
 */
function wt_enqueue_block_editor_styles() {
	wp_enqueue_style( 'wt-getwid-block-editor-styles', get_template_directory_uri() . '/css/getwid-editor.css' );
    wp_enqueue_style( 'wt-block-editor-styles',	get_template_directory_uri() . '/style-editor.css' );
}
add_action( 'enqueue_block_editor_assets', 'wt_enqueue_block_editor_styles' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Comments list using w3.css
 */
require get_template_directory() . '/inc/wt-comments-list.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
 
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Addition to Underscores: W3M NavWalker class
 */

/**
 * Register Custom Navigation Walker
 */
function register_w3m_navwalker(){
	require_once get_template_directory() . '/inc/class-w3m-nav-walker.php';
}
add_action( 'after_setup_theme', 'register_w3m_navwalker' );



/**
 *  Include Breadcrumb function depending on plugin
 */
// Include Breadcrumb Trail.
if ( ! function_exists( 'breadcrumb_trail' ) )
	require_once get_template_directory() . '/inc/breadcrumbs.php';


if ( ! function_exists( 'theme_breadcrumb' ) ):
/**
 * Render the breadcrumb trail.
 */
function theme_breadcrumb() {
	$breadcrumbs = ''; 

	// JT Breadcrumb Trail.
	if ( function_exists( 'breadcrumb_trail' ) ) {
		$breadcrumbs = breadcrumb_trail(
			array( 
				'container'     => 'nav', 
				'separator'     => '/', 
				'show_browse'   => false,
				'show_on_front' => false,
			) 
		);
	}	

	// Yoast SEO.
	elseif ( function_exists( 'yoast_breadcrumb' ) ) { 
		$breadcrumbs = yoast_breadcrumb( "", "", false ); 
	} 	

	// Breadcrumb NavXT.
	elseif ( function_exists( 'bcn_display' ) ) { 
		$breadcrumbs = bcn_display( true );
	} 

	if ( ! empty( $breadcrumbs ) ) { 
		echo '<div class="breadcrumbs">'. $breadcrumbs .'</div>'; 
	} 
}
endif;
/* End Breadcrumbs */


if ( ! function_exists( 'scroll_to_top' ) ) :
/**
 * Display the scroll to top link.
 */
function scroll_to_top() {
	echo '<button onclick="scrollToTop()" id="scroll-to-top" class="scroll-to-top w3-button" title="Back To Top"><span class="up-arrow"></span></button>';
}
add_action( 'wp_footer', 'scroll_to_top' );
endif;


/*
 * Provide customised login form.  Change the image login-bakground.jpg to change the look
 */
function wt_login_form() { ?>
    <style type="text/css">
      body.login {
        background-image: url(<?php echo(get_template_directory_uri() . '/login-background.jpg'); ?>);
        background-repeat: no-repeat;
        background-size: auto;
        height: auto;
      }
      div#login {
        background-color: #fff;
        margin-top: 5%;
        padding: 15px;
      }
      #login h1 a, .login h1 a {
        background-image: url(<?php echo(get_custom_logo()); ?>);
        height: 120px;
        width: auto;
        background-size: 120px auto;
        background-repeat: no-repeat;
        padding-bottom: 30px;
      }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wt_login_form' );
