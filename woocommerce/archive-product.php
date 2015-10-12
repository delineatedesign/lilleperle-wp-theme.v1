<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php if (is_shop() ) { ?>

<section style="letter-spacing: 1px;">
  <div style="margin: 0 auto; max-width: 960px; padding-top: 24px;">


<?php
$args = array( 'taxonomy' => 'product_cat' );
$terms = get_terms('product_cat', $args);

if (count($terms) > 0) { ?>
	<div class="lille-categories" style="padding: 0;">
    <ul class="o-layout  o-layout__null"><!--
  <?php  foreach ($terms as $term) { ?>

		--><li class="o-layout__item  u-1-6  u-aligncenter  u-uppercase">
				<div>
					<img src="http://localhost:8888/lilleperle.co.uk/img/icons/LP_rings-hollow.png" alt="Black &amp; white image of a ring" style="display: block;  height: auto; margin: 0 auto; width: 48px; padding: 2px; background: #5b827a;
				 		background: -moz-linear-gradient(left, #5b827a 0%, #111 50%, #805d66 100%);
				 		background: -webkit-gradient(linear, left top, right top, color-stop(0%, #5b827a), color-stop(50%, #111), color-stop(100%, #805d66));
				 		background: -webkit-linear-gradient(left, #5b827a 0%, #111 50%, #805d66 100%);
				 		background: -o-linear-gradient(left, #5b827a 0%, #111 50%, #805d66 100%);
				 		background: -ms-linear-gradient(left, #5b827a 0%, #111 50%, #805d66 100%);
				 		background: linear-gradient(to right, #5b827a 0%, #111 50%, #805d66 100%);
				 		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#5b827a', endColorstr='#805d66',GradientType=1 );">

					<h2 style="margin: 0 0 24px;"><?php echo $term->name; ?></h2>
				</div>
		</li><!--
<?php }; ?>

--></ul>
</div>
<?php } ?>

  </div>

<div style="height: 1px;background: #5b827a;
    background: -moz-linear-gradient(left, #5b827a 0%, #80785e 50%, #805d66 100%);
    background: -webkit-gradient(linear, left top, right top, color-stop(0%, #5b827a), color-stop(50%, #80785e), color-stop(100%, #805d66));
    background: -webkit-linear-gradient(left, #5b827a 0%, #80785e 50%, #805d66 100%);
    background: -o-linear-gradient(left, #5b827a 0%, #80785e 50%, #805d66 100%);
    background: -ms-linear-gradient(left, #5b827a 0%, #80785e 50%, #805d66 100%);
    background: linear-gradient(to right, #5b827a 0%, #80785e 50%, #805d66 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#5b827a', endColorstr='#805d66',GradientType=1 );"></div>

</section>

<?php } ?>

<div style="margin: 0 auto; max-width: 960px;">


	<?php
	if( is_tax( 'yith_product_brand' ) ) {
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();
		$category_Name  = $cat_obj->name;

		print_r ($category_Name);
	}
	?>


	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>


		<?php
			/**
			 * woocommerce_archive_description hook
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>


</div>


<!--include lines-->
<div style="margin: 0 auto; max-width: 960px;">
	<?php include_once('template-parts/content-woo-brands.php') ?>
</div>


<?php get_footer( 'shop' ); ?>
