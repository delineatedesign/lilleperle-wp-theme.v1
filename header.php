<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shiny
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<script src="https://use.typekit.net/xpr4kvv.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<script src="<?php echo get_site_url(); ?>/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo get_site_url(); ?>/js/modernizr.js"></script>
<script>
    $(document).ready(function(){
        if (Modernizr.touch) {
            // show the close overlay button
            $(".close-overlay").removeClass("hidden");
            // handle the adding of hover class when clicked
            $(".img").click(function(e){
                if (!$(this).hasClass("hover")) {
                    $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
                    $(this).closest(".img").removeClass("hover");
                }
            });
        } else {
            // handle the mouseenter functionality
            $(".img").mouseenter(function(){
                $(this).addClass("hover");
            })
            // handle the mouseleave functionality
            .mouseleave(function(){
                $(this).removeClass("hover");
            });
        }
    });
</script>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'shiny' ); ?></a>

  <div style="position: absolute; top: 0; left: 0; right: 0; width: 100%;">
    <div style="margin: 0 auto; max-width: 960px; text-align: right;padding: 12px; font-size: .825em; ">
      <?php if ( is_user_logged_in() ) { ?>
       	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a>
        <a href="'. wp_logout_url() .'">Log Out</a>
       <?php }
       else { ?>
       	<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login / Register','woothemes'); ?></a>
       <?php } ?>

			 <?php if ( !WC()->cart->get_cart_contents_count() == 0 ) { ?>
				 <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
	 <?php } ?>

</div>
</div>

	<header id="masthead" class="site-header  c-page-head" role="banner">

    <div style="margin: 0 auto; padding: 48px 0 0; max-width: 960px;">

      <h1 class="m-0"><img class="brand-logo" src="<?php echo esc_url( home_url( '/' ) ); ?>img/lilleperle-logo.jpg" alt="Lille Perle black &amp; white logo"></h1>


		<!--<div class="site-branding">
			<?php //if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></h1>
			<?php //else : ?>
				<p class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></p>
			<?php //endif; ?>
		</div>--><!-- .site-branding -->

	<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'shiny' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav> <!-- #site-navigation -->


  </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
