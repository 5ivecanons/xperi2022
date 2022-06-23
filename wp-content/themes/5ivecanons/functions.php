<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage 5ivecanons
 * @since Twenty Twenty-One 1.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

add_action( 'login_enqueue_scripts', function() {
    wp_enqueue_style( 'login-style', get_stylesheet_directory_uri() . '/includes/login/css/wp-login-styles.css' );
    wp_enqueue_script( 'login-script', get_stylesheet_directory_uri() . '/includes/login/js/login-scripts.js', [ 'jquery' ], '',true );
} );

if ( ! function_exists( 'twenty_twenty_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @return void
	 */
	function twenty_twenty_one_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'twentytwentyone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentytwentyone', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'twentytwentyone' ),
				'footer'  => __( 'Footer Column 1 menu', 'twentytwentyone' ),
				'footer_2'  => __( 'Footer Column 2 menu', 'twentytwentyone' ),
				'footer_3'  => __( 'Footer Column 3 menu', 'twentytwentyone' ),
				'credits'  => __( 'Credits menu', 'twentytwentyone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		$background_color = get_theme_mod( 'background_color', 'D1E4DD' );
		if ( 127 > Twenty_Twenty_One_Custom_Colors::get_relative_luminance_from_hex( $background_color ) ) {
			add_theme_support( 'dark-editor-style' );
		}

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Note, the is_IE global variable is defined by WordPress and is used
		// to detect if the current browser is internet explorer.
		global $is_IE;
		if ( $is_IE ) {
			$editor_stylesheet_path = './assets/css/ie-editor.css';
		}

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'twentytwentyone' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'twentytwentyone' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'twentytwentyone' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'twentytwentyone' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'twentytwentyone' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'twentytwentyone' ),
					'size'      => 96,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'twentytwentyone' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'twentytwentyone' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		// Editor color palette.
		$black     = '#000000';
		$dark_gray = '#28303D';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$blue      = '#D1DFE4';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'twentytwentyone' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'twentytwentyone' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'twentytwentyone' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'twentytwentyone' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'twentytwentyone' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'twentytwentyone' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'twentytwentyone' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'twentytwentyone' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'twentytwentyone' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'twentytwentyone' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Purple to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'purple-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'yellow-to-purple',
				),
				array(
					'name'     => esc_html__( 'Green to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'green-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to green', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
					'slug'     => 'yellow-to-green',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'Purple to red', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'purple-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to purple', 'twentytwentyone' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
					'slug'     => 'red-to-purple',
				),
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require get_template_directory() . '/inc/starter-content.php';
			add_theme_support( 'starter-content', twenty_twenty_one_get_starter_content() );
		}

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'twenty_twenty_one_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function twenty_twenty_one_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twenty_twenty_one_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function twenty_twenty_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twenty_twenty_one_content_width', 750 );
}
add_action( 'after_setup_theme', 'twenty_twenty_one_content_width', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'carousel-style', get_template_directory_uri() . '/assets/css/slick.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'carousel-style-2', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), wp_get_theme()->get( 'Version' ) );
	
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'twenty-twenty-one-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'twenty-twenty-one-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'twenty-twenty-one-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );
	
	wp_enqueue_script(
		'jquery-script',
		get_template_directory_uri() . '/assets/js/jquery.min.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	
	wp_enqueue_script(
		'bootstrap-script',
		get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	
	wp_enqueue_script(
		'carousel-script',
		get_template_directory_uri() . '/assets/js/slick.min.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Register the IE11 polyfill file.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills-asset',
		get_template_directory_uri() . '/assets/js/polyfills.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Register the IE11 polyfill loader.
	wp_register_script(
		'twenty-twenty-one-ie11-polyfills',
		null,
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_add_inline_script(
		'twenty-twenty-one-ie11-polyfills',
		wp_get_script_polyfill(
			$wp_scripts,
			array(
				'Element.prototype.matches && Element.prototype.closest && window.NodeList && NodeList.prototype.forEach' => 'twenty-twenty-one-ie11-polyfills-asset',
			)
		)
	);

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array( 'twenty-twenty-one-ie11-polyfills' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'twenty-twenty-one-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		array( 'twenty-twenty-one-ie11-polyfills' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_scripts' );

/**
 * Enqueue block editor script.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_block_editor_script() {

	wp_enqueue_script( 'twentytwentyone-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'enqueue_block_editor_assets', 'twentytwentyone_block_editor_script' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @link https://git.io/vWdr2
 */
function twenty_twenty_one_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include get_template_directory() . '/assets/js/skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twenty_twenty_one_skip_link_focus_fix' );

/**
 * Enqueue non-latin language styles.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twenty_twenty_one_non_latin_languages() {
	$custom_css = twenty_twenty_one_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twenty-twenty-one-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'twenty_twenty_one_non_latin_languages' );

// SVG Icons class.
require get_template_directory() . '/classes/class-twenty-twenty-one-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-twenty-twenty-one-custom-colors.php';
new Twenty_Twenty_One_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-twenty-twenty-one-customize.php';
new Twenty_Twenty_One_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Dark Mode.
require_once get_template_directory() . '/classes/class-twenty-twenty-one-dark-mode.php';
new Twenty_Twenty_One_Dark_Mode();

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_preview_init() {
	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'twentytwentyone-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'twentytwentyone-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'twentytwentyone_customize_preview_init' );

/**
 * Enqueue scripts for the customizer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'twentytwentyone-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'twentytwentyone_customize_controls_enqueue_scripts' );

/**
 * Calculate classes for the main <html> element.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_the_html_classes() {
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters( 'twentytwentyone_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return void
 */
function twentytwentyone_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'twentytwentyone_add_ie_class' );

function latest_news_func($atts){
	$a = shortcode_atts( array(
		'version' => '1',
	), $atts );
	$args = array(
    	'post_type' => 'news',
		'posts_per_page' => 9
	);
	$the_query = new WP_Query( $args );
	$content = '';
	if ( $the_query->have_posts() ) {
		$content .= '<div class="news-wrapper version'.$a['version'].'">';
		while ( $the_query->have_posts() ) {
        	$the_query->the_post();
			$content .= '<article class="news-tile">';
			if(get_the_post_thumbnail()){
				$content .= '<div class="news-tile-image"><img src="'.get_the_post_thumbnail_url().'" alt="'.get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ).'"></div>';
			}
			$category = get_the_category(); 
			$catname = $category[0]->cat_name;
			$content .= '<div class="news-tile-content"><div class="attributes">
<span class="date">'.get_the_date('F j, Y').'</span>
<span class="category">'.$catname.'</span>
</div><h4 class="news-tile-title">'.wp_trim_words(get_the_title(), 7, '...').'</h4>';
			$content .= '<div class="news-tile-excerpt">'.wp_trim_words(get_the_content(), 25, '...').'</div>';
			$content .= '<div class="news-tile-cta"><a href="'.get_permalink().'" class="btn button">Read More</a></div></div>';
			$content .= '</article>';
    	}
		$content .= '</div>';
    }
	wp_reset_postdata();
	return $content;
}
add_shortcode( 'latest_news', 'latest_news_func' );

function speakers_func($atts){
	$a = shortcode_atts( array(
		'total' => '-1',
	), $atts );
	$args = array(
    	'post_type' => 'speakers',
		'posts_per_page' => $a['total']
	);
	$the_query = new WP_Query( $args );
	$content = '';
	if ( $the_query->have_posts() ) {
		$content .= '<div class="speakers-wrapper">';
		while ( $the_query->have_posts() ) {
        	$the_query->the_post();
			$content .= '<article class="speaker">';
			$content .= '<div class="speaker-image"><img src="'.get_field('headshot').'" alt="speaker image" width="402" height="440"></div>';
			$content .= '<div class="speaker-content"><h5 class="name">'.get_the_title().'</h5>';
			$content .= '<div class="title">'.get_field('title').'</div>';
			$content .= '<div class="logo"><img src="'.get_field('logo').'" alt="speaker logo" width="100" height="21"></div></div>';
			$content .= '<div class="bio">'.get_field('bio').'</div>';
			$content .= '<a class="modal-link" href="#"><div class="logoimg"><img src="https://mediaxperi.wpengine.com/wp-content/uploads/2022/02/xperi-small-white-logo.png" alt="xperi logo"></div><div class="bio-button btn button">Read Full Bio</div></a>';
			$content .= '</article>';
    	}
		$content .= '</div>';
    }
	wp_reset_postdata();
	return $content;
}
add_shortcode( 'speakers', 'speakers_func' );

function media_files_func($atts){
	$a = shortcode_atts( array(
		'total' => '-1',
	), $atts );
	$args = array(
    	'post_type' => 'creative_asset',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	$content = '';
	if ( $the_query->have_posts() ) {
		$content .= '<div class="mf-wrapper">';
		$content .= '<div class="mf-search"><input class="searchfield" value="" placeholder="search"><span><img src="/wp-content/uploads/2022/02/Icon-awesome-search.svg" alt="search icon"></span></div><div class="mf-items">';
		while ( $the_query->have_posts() ) {
        	$the_query->the_post();
			$content .= '<article class="mf-item">';
			$content .= '<a href="'.get_field('asset_file')[url].'" download>';
			$content .= '<div class="icon-image">';
			if(get_field('asset_type') == 'png' || get_field('asset_type') == 'jpg'){
				$content .= '<svg xmlns="http://www.w3.org/2000/svg" width="38.392" height="38.392" viewBox="0 0 38.392 38.392">
  <g id="Group_15932" data-name="Group 15932" transform="translate(-89 -924.566)">
    <path id="Path_281" data-name="Path 281" d="M33.584,296H4.808A4.814,4.814,0,0,0,0,300.808v28.776a4.814,4.814,0,0,0,4.808,4.808H33.584a4.814,4.814,0,0,0,4.808-4.808V300.808A4.814,4.814,0,0,0,33.584,296M1.437,300.808a3.375,3.375,0,0,1,3.371-3.371H33.584a3.375,3.375,0,0,1,3.371,3.371v23.15l-7.03-8.293a2.81,2.81,0,0,0-2.15-1h0a2.82,2.82,0,0,0-2.155,1l-5.3,6.256-7.5-8.85a2.811,2.811,0,0,0-2.15-1h0a2.819,2.819,0,0,0-2.155,1L1.437,321.4Zm0,28.776v-5.957L9.6,314a1.386,1.386,0,0,1,1.059-.491h0a1.377,1.377,0,0,1,1.054.491l16.07,18.957H4.808a3.375,3.375,0,0,1-3.371-3.371m32.147,3.371H29.667l-8.412-9.924,5.458-6.439a1.386,1.386,0,0,1,1.059-.491h0a1.377,1.377,0,0,1,1.054.491l8.128,9.588v3.4a3.375,3.375,0,0,1-3.371,3.371" transform="translate(89 628.566)" fill="#32373a"/>
    <path id="Path_282" data-name="Path 282" d="M45.9,319.1a3.8,3.8,0,1,0-3.8-3.8,3.8,3.8,0,0,0,3.8,3.8m0-6.163a2.363,2.363,0,1,1-2.363,2.363,2.365,2.365,0,0,1,2.363-2.363" transform="translate(64.188 619.434)" fill="#32373a"/>
  </g>
</svg>';
			}
			if(get_field('asset_type') == 'zip'){
				$content .= '<svg xmlns="http://www.w3.org/2000/svg" width="46.496" height="38.39" viewBox="0 0 46.496 38.39">
  <g id="Group_15938" data-name="Group 15938" transform="translate(19644.385 22141.113)">
    <path id="Path_278" data-name="Path 278" d="M485.538,305.571H468.355a3.88,3.88,0,0,0-2.987-1.422H448.341A4.348,4.348,0,0,0,444,308.5v29.7a4.349,4.349,0,0,0,4.341,4.346h37.812a4.349,4.349,0,0,0,4.342-4.346V310.529a4.963,4.963,0,0,0-4.958-4.958m3.217,4.958v1.754a4.312,4.312,0,0,0-2.6-.874H472.608a2.119,2.119,0,0,1-1.906-1.2l-1.391-2.9h16.227a3.221,3.221,0,0,1,3.217,3.217m0,27.664a2.607,2.607,0,0,1-2.6,2.606H448.341a2.607,2.607,0,0,1-2.6-2.606V308.5a2.607,2.607,0,0,1,2.6-2.606h17.027a2.135,2.135,0,0,1,1.811,1.026,1.467,1.467,0,0,1,.095.177l1.858,3.866a3.866,3.866,0,0,0,3.476,2.192h13.545a2.6,2.6,0,0,1,2.6,2.6Z" transform="translate(-20088.385 -22445.262)" fill="#32373a"/>
  </g>
</svg>';
			}
			if(get_field('asset_type') == 'video'){
				$content .= '<svg xmlns="http://www.w3.org/2000/svg" width="38.392" height="38.392" viewBox="0 0 38.392 38.392">
  <g id="Group_15942" data-name="Group 15942" transform="translate(19705.155 22022.919)">
    <path id="Path_279" data-name="Path 279" d="M315.2,592a19.2,19.2,0,1,0,19.2,19.2A19.218,19.218,0,0,0,315.2,592m0,36.955A17.759,17.759,0,1,1,332.956,611.2,17.779,17.779,0,0,1,315.2,628.954" transform="translate(-20001.156 -22614.918)" fill="#32373a"/>
    <path id="Path_280" data-name="Path 280" d="M343.629,624.2l-13.053-7.536a1.62,1.62,0,0,0-2.43,1.4v15.072a1.616,1.616,0,0,0,2.43,1.4l13.053-7.536a1.62,1.62,0,0,0,0-2.806m-.719,1.561L329.858,633.3a.183.183,0,0,1-.274-.159V618.067a.176.176,0,0,1,.091-.159.186.186,0,0,1,.092-.026.179.179,0,0,1,.091.026l13.053,7.536a.182.182,0,0,1,0,.316" transform="translate(-20020.102 -22629.326)" fill="#32373a"/>
  </g>
</svg>';
			}
			if(get_field('asset_type') == 'pdf'){
				$content .= '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30.727" height="38.39" viewBox="0 0 30.727 38.39">
  <defs>
    <clipPath id="clip-path">
      <rect id="Rectangle_15051" data-name="Rectangle 15051" width="30.727" height="38.39" fill="#32373a"/>
    </clipPath>
  </defs>
  <g id="Group_15943" data-name="Group 15943" transform="translate(0 0)">
    <g id="Group_15940" data-name="Group 15940" transform="translate(0 0)" clip-path="url(#clip-path)">
      <path id="Path_288" data-name="Path 288" d="M30.713,10.429v0a.714.714,0,0,0-.062-.172c-.007-.015-.015-.029-.023-.043a.711.711,0,0,0-.11-.149l0,0L20.669.21l0,0A.719.719,0,0,0,20.518.1L20.474.075a.716.716,0,0,0-.168-.06l-.014,0A.7.7,0,0,0,20.161,0H8.044A3.529,3.529,0,0,0,4.519,3.525v.536H3.528A3.531,3.531,0,0,0,0,7.585v27.28A3.531,3.531,0,0,0,3.528,38.39H22.683a3.529,3.529,0,0,0,3.525-3.525v-.536H27.2A3.529,3.529,0,0,0,30.727,30.8V10.566a.726.726,0,0,0-.014-.137M20.88,2.454l7.393,7.393H22.968A2.091,2.091,0,0,1,20.88,7.759Zm3.89,32.411a2.09,2.09,0,0,1-2.087,2.087H3.528a2.092,2.092,0,0,1-2.091-2.087V7.585A2.092,2.092,0,0,1,3.528,5.5h.991V30.8a3.529,3.529,0,0,0,3.525,3.525H24.77ZM27.2,32.892H8.044A2.09,2.09,0,0,1,5.957,30.8V3.525A2.09,2.09,0,0,1,8.044,1.437h11.4V7.759a3.53,3.53,0,0,0,3.526,3.526h6.322V30.8A2.09,2.09,0,0,1,27.2,32.892" transform="translate(0 0)" fill="#32373a"/>
      <path id="Path_289" data-name="Path 289" d="M38.634,64.543H23.711a.719.719,0,0,0,0,1.437H38.634a.719.719,0,1,0,0-1.437" transform="translate(-13.549 -38.034)" fill="#32373a"/>
      <path id="Path_290" data-name="Path 290" d="M38.634,52.293H23.711a.719.719,0,0,0,0,1.437H38.634a.719.719,0,1,0,0-1.437" transform="translate(-13.549 -30.816)" fill="#32373a"/>
      <path id="Path_291" data-name="Path 291" d="M38.634,40.043H23.711a.719.719,0,1,0,0,1.437H38.634a.719.719,0,1,0,0-1.437" transform="translate(-13.549 -23.597)" fill="#32373a"/>
      <path id="Path_292" data-name="Path 292" d="M23.711,29.23h7.941a.719.719,0,0,0,0-1.437H23.711a.719.719,0,0,0,0,1.437" transform="translate(-13.549 -16.378)" fill="#32373a"/>
      <path id="Path_293" data-name="Path 293" d="M23.711,16.98H29.6a.719.719,0,0,0,0-1.437H23.711a.719.719,0,0,0,0,1.437" transform="translate(-13.549 -9.159)" fill="#32373a"/>
    </g>
  </g>
</svg>';
			}
			$content .= '</div>';
			$content .= '<div class="download-image"><img src="/wp-content/uploads/2022/01/Icon-feather-download.svg" alt="download"></div>';
			$content .= '<div class="title">'.get_the_title().'</div>';
			$content .= '<div class="file-info"><div class="size">File Size: '.number_format(get_field('asset_file')[filesize] / 1048576, 1).'MB</div><div class="type">Kind: '.strtoupper(get_field('asset_type')).'</div></div>';
			$content .= '</a>';
			$content .= '</article>';
    	}
		$content .= '</div></div>';
    }
	wp_reset_postdata();
	return $content;
}
add_shortcode( 'media_files', 'media_files_func' );

function wistia_channel_func($atts){
	$a = shortcode_atts( array(
		'id' => '',
	), $atts );
	$id = $a['id'];
	$content = '';
	$content .= '<script src="https://fast.wistia.com/assets/external/channel.js" async></script><link rel="stylesheet" href="https://fast.wistia.com/embed/channel/project/'.$id.'/font.css" /><div class="wistia_channel wistia_async_'.$id.' mode=inline" style="min-height:100vh;position:relative;width:100%;"></div>';
	return $content;
}
add_shortcode( 'wistia_channel', 'wistia_channel_func' );

function wistia_video_func($atts){
	$a = shortcode_atts( array(
		'id' => '',
	), $atts );
	$id = $a['id'];
	$content = '';
	$content .= '<a href="#wistia-video-'.$id.'" class="wistia-video"></a>';
	$content .= '<div id="wistia-video-'.$id.'" class="mfp-hide"><script src="https://fast.wistia.com/embed/medias/'.$id.'.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_'.$id.' seo=false videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/'.$id.'/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div></div></div></div></div>';
	return $content;
}
add_shortcode( 'wistia_video', 'wistia_video_func' );

function megamenu_func($atts){
	$a = shortcode_atts( array(
		'name' => '',
	), $atts );
	$args = array(
    	'post_type' => 'megamenu',
		'title' => $a['name']
	);
	$the_query = new WP_Query( $args );
	$content = '';
	if ( $the_query->have_posts() ) {
		$content .= '<div class="close-mm">X</div><div class="megamenu-wrapper"><div class="container"><div class="row">';
		while ( $the_query->have_posts() ) {
        	$the_query->the_post();
			$cols = get_field('columns');
			foreach($cols as $c){
				$content .= '<div class="megamenu-column col-sm-'.$c['column_size'].'">';
				foreach($c['elements'] as $e){
					$content .= '<div class="megamenu-element">';
					if($e['element'] == 'Image'){
						$content .= '<img src="'.$e['image']['url'].'" alt="'.$e['image']['alt'].'" width="'.$e['image']['width'].'" height="'.$e['image']['height'].'" />';
					}
					if($e['element'] == 'Content'){
						$content .= $e['content'];
					}
					if($e['element'] == 'Button'){
						$content .= '<a href="'.$e['button_url'].'" class="btn button">'.$e['button_text'].'</a>';
					}
					$content .= '</div>';
				}
				$content .= '</div>';
			}
		}
		$content .= '</div></div></div>';
	}
	wp_reset_postdata();
	return $content;
}
add_shortcode( 'megamenu', 'megamenu_func' );

function testimonials_func($atts){
	$a = shortcode_atts( array(
		'only' => '',
	), $atts );
	$args = array(
    	'post_type' => 'testimonials',
		'posts_per_page' => -1
	);
	$imagesonly = '';
	if($a['only'] == 'images'){
		$imagesonly = ' images-only';
	}
	$the_query = new WP_Query( $args );
	$content = '';
	if ( $the_query->have_posts() ) {
		$content .= '<div class="testimonials-wrapper'.$imagesonly.'">';
		while ( $the_query->have_posts() ) {
        	$the_query->the_post();
			$content .= '<article class="testimonial-tile">';
			if($imagesonly){
				$content .= '<div class="testimonial-tile-image"><img src="'.get_field('image')['url'].'" alt="'.get_field('image')['url'].'"></div>';
			}else{
				$content .= '<div class="testimonial-tile-content"><div class="testimonial-quote">'.get_field('content').'</div>';
				$content .= '<div class="testimonial-link"><a href="'.get_field('website_link').'" target="_blank">Visit client’s website</a></div>';
				$content .= '<div class="testimonial-credit"><div class="name">'.get_the_title().'</div><div class="title">'.get_field('title').'</div></div></div>';
			}
			$content .= '</article>';
    	}
		$content .= '</div>';
    }
	wp_reset_postdata();
	return $content;
}
add_shortcode( 'testimonials', 'testimonials_func' );

function partners_func($atts){
	$args = array(
    	'post_type' => 'partner',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	$content = '';
	if ( $the_query->have_posts() ) {
		$content .= '<div class="partners-wrapper">';
		$total = $the_query->found_posts;
		$count = 1;
		while ( $the_query->have_posts() ) {
        	$the_query->the_post();
			if($count == 1) {
			$content .= '<div class="partners-tile">';
			}
			$content .= '<div class="partners-tile-img"><img src="'.get_the_post_thumbnail_url().'" alt="logo"></div>';
			if($count % 9 == 0 || $count == $total) {
				if($count != $total) {
					$content .= '</div><div class="partners-tile">';
				}else{
					$content .= '</div>';
				}
			}
			$count++;
    	}
		$content .= '</div>';
    }
	wp_reset_postdata();
	return $content;
}
add_shortcode( 'partners', 'partners_func' );

function locations_func($atts){
	$a = shortcode_atts( array(
		'only' => '',
	), $atts );
	$args = array(
    	'post_type' => 'locations',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	$field = get_field_object('field_62b2813fe06ed');
if( $field['choices'] ):
	$countries = '<select class="countries"><option value="*">Filter by Country</option>';
    foreach( $field['choices'] as $value => $label ):
          $countries .= '<option value=".'.$value.'">'.$label.'</option>';
    endforeach;
	$countries .= '</select>';
endif;
	$content = '';
	if ( $the_query->have_posts() ) {
		$total = $the_query->found_posts;
		$content .= '<div class="global-locations"><div class="global-locations-inner"><div class="locations-filter-wrapper"><div class="locations-number">'.$total.' Global Locations</div><div class="locations-filters"><!--<div class="locations-filter-dept"><div class="locations-list dept-list"></div></div>--><div class="locations-filter-country"><div class="locations-list country-list">'.$countries.'</div></div></div></div>';
		$content .= '<div class="locations-headers"><div class="locations-header">Name</div><div class="locations-header">Address</div><div class="locations-header">Country</div></div>';
		$content .= '<div class="locations-wrapper">';
		while ( $the_query->have_posts() ) {
        	$the_query->the_post();
			$content .= '<div class="location '.get_field('country')['value'].'">';
			$content .= '<div class="location-info">'.get_the_title().'</div>';
			$content .= '<div class="location-info">'.get_field('address').'</div>';
			$content .= '<div class="location-info">'.get_field('country')['label'].'</div>';
			$content .= '</div>';
    	}
		$content .= '</div></div></div>';
    }
	wp_reset_postdata();
	return $content;
}
add_shortcode( 'locations', 'locations_func' );

function worldmap_func($atts){
	$content = '';
	$content .= '<div id="map"></div>';
	return $content;
}
add_shortcode( 'world_map', 'worldmap_func' );

function get_locations(){
	$args = array(
    	'post_type' => 'locations',
		'posts_per_page' => -1
	);
	$the_query = new WP_Query( $args );
	$newarray = array();
	$content .= '';
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
        	$the_query->the_post();
			$itemarray = array();
			$itemarray['name'] = get_the_title();
			$imgurl = '/wp-content/uploads/2022/06/office-building-2021-08-30-01-18-56-utc.jpg';
			if(get_the_post_thumbnail_url()){
				$imgurl = get_the_post_thumbnail_url();
			}
			$itemarray['description'] = '<img src="'.$imgurl.'">'.get_field('address');
			$itemarray['latitude'] = get_field('latitude');
			$itemarray['longitude'] = get_field('longitude');
			//$newarray[] = '{"name": "'.get_the_title().'", "description": "'.get_field('address').'", "latitude": "'.get_field('latitude').'", "longitude": "'.get_field('longitude').'"}';
			$newarray[] = $itemarray;
		}
	}
	$content .= $newarray;
	echo json_encode($newarray);
    die();
}

add_action( 'wp_ajax_get_locations', 'get_locations' );
add_action( 'wp_ajax_nopriv_get_locations', 'get_locations' );
