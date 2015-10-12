<?php
$args = array( 'taxonomy' => 'product_cat' );
$terms = get_terms('product_cat', $args);

if (count($terms) > 0) { ?>
	<div class="lille-categories">
    <ul class="c-woo-categories-list  o-layout  u-aligncenter  u-uppercase"><!--
  <?php  foreach ($terms as $term) { ?>


		--><li class="c-woo-categories-list-item  o-layout__item  u-1-6">
				<div>
					<img src="<?php echo get_site_url(); ?>/img/icons/LP_rings.jpg" alt="">
					<h2 class="m-0"><?php echo $term->name; ?></h2>
				</div>
		</li><!--

<?php }; ?>

--></ul>
</div>
<?php } ?>
