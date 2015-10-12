<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Front Page
 * @package shiny
 */

get_header(); ?>

<div style="background: #fff url('<?php echo get_site_url(); ?>/img/frontpage-image_1.jpg') no-repeat center center; background-size: cover; height: 500px; animation: soren 4s ease;"></div>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php //while ( have_posts() ) : the_post(); ?>
				<?php //get_template_part( 'template-parts/content', 'page' ); ?>
			<?php //endwhile; // End of the loop. ?>

			<!--include lines-->
			<div style="margin: 0 auto; max-width: 960px;">
        <?php //include_once('woocommerce/template-parts/content-woo-brands.php') ?>
			</div>


			<!--include cats-->
			<div style="margin: 0 auto; max-width: 960px;">
			  <?php //include_once('woocommerce/template-parts/content-woo-categories.php') ?>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
