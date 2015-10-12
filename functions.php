<?php
/**
 * shiny functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package shiny
 */

if ( ! function_exists( 'shiny_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shiny_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on shiny, use a find and replace
	 * to change 'shiny' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'shiny', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'shiny' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shiny_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // shiny_setup
add_action( 'after_setup_theme', 'shiny_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shiny_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shiny_content_width', 640 );
}
add_action( 'after_setup_theme', 'shiny_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shiny_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shiny' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shiny_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shiny_scripts() {
	wp_enqueue_style( 'shiny-style', get_stylesheet_uri() );

	wp_enqueue_script( 'shiny-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'shiny-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shiny_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


	add_theme_support( 'woocommerce' );

  // Ensure cart contents update when products are added to the cart via AJAX
  add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
  function woocommerce_header_add_to_cart_fragment( $fragments ) {
  	ob_start();
  	?>
  	<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
  	<?php

  	$fragments['a.cart-contents'] = ob_get_clean();

  	return $fragments;
  }

	// Removes category meta from their original loaction
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
  // Inserts category under the main right product content
  add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10 );

	// Removes title from their original loaction
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	// Inserts title under the main right product content
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 20 );

	// Removes price from their original loaction
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
  // Inserts price under the main right product content
  add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );

	// Removes tabs from their original loaction
  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
  // Inserts description tabs under the main right product content
  //add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 50 );
	function woocommerce_template_product_description() {
	woocommerce_get_template( 'single-product/tabs/description.php' );
	}
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 20 );

	function woocommerce_template_product_additional() {
	  woocommerce_get_template( 'single-product/tabs/additional-information.php' );
	}
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_additional', 60 );


	// Removes cart from their original loaction
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	// Inserts cart under the main right product content
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 60 );

	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

  add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
  function wcs_woo_remove_reviews_tab($tabs) {
   unset($tabs['reviews']);
   return $tabs;
  }

// Removes breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


/*

  function wpse_131562_redirect() {
      if (
          ! is_user_logged_in()
          && (is_woocommerce() || is_cart() || is_checkout())
      ) {
          // feel free to customize the following line to suit your needs
          wp_redirect(home_url());
          exit;
      }
  }
  add_action('template_redirect', 'wpse_131562_redirect');

  */
