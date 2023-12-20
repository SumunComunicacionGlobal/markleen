<?php
/**
 * Markleen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Markleen
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function markleen_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Markleen, use a find and replace
		* to change 'markleen' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'markleen', get_template_directory() . '/languages' );

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

	add_theme_support('post-formats', array('video', 'aside'));

	// Rename post format
	function cambiar_nombre_formato_aside($name, $format) {
		if ($format === 'aside') {
			$name = 'Study Cases';
		}
		return $name;
	}
	add_filter('post_format_label_aside', 'cambiar_nombre_formato_aside', 10, 2);
	
	

	// Default thumbnail size
	add_image_size( 'img-card', 332, 332, true );
	add_image_size( 'img-card-blog', 592, 592, true );
	

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Primary', 'markleen' ),
			'top-menu' => esc_html__( 'Top', 'markleen' ),
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
			'markleen_custom_background_args',
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
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'markleen_setup' );

// Add excerpt to pages
add_post_type_support( 'page', 'excerpt' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function markleen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'markleen_content_width', 640 );
}
add_action( 'after_setup_theme', 'markleen_content_width', 0 );



/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widget-areas.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Gutenberg Support.
 */
require get_template_directory() . '/inc/gutenberg-support.php';


/**
 * Custom post types
 */
require get_template_directory().'/inc/custom-post-type.php';


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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/remove-taxonomy-slug.php';


/**
 * Custom shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';


/**
 * Contact Form redirect to thanks page
 */
add_action( 'wp_footer', 'cf7_thank_you_redirect' );
 
function cf7_thank_you_redirect() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ('10' == event.detail.contactFormId ) {
		location = 'https://markleen.com/es/gracias-markleen/';
	}
	else if ('897' == event.detail.contactFormId ) {
		location = 'https://markleen.com/thanks-markleen/';
	}
	else {
		// do nothing
	}
}, false );
</script>
<?php
}