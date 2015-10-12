<?php
$args = array( 'taxonomy' => 'product_cat' );
$terms = get_terms('product_cat', $args);

if (count($terms) > 0) { ?>
	<div class="lille-categories">
    <ul class="o-layout  u-aligncenter  u-uppercase"><!--
  <?php  foreach ($terms as $term) { ?>


		--><li class="o-layout__item  u-1-6">
				<div>
					<img src="<?php echo get_site_url(); ?>/img/icons/LP_rings.jpg" alt="Black &amp; white image of a ring" style="display: block;  height: auto; margin: 0 auto; width: 48px;">
					<h2 class="m-0"><?php echo $term->name; ?></h2>
				</div>
		</li><!--

<?php }; ?>

--></ul>
</div>
<?php } ?>
