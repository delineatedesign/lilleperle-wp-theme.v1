<style>
  .c-brands-list__item {
    background: #ffffff;
  }

  .c-brands-list__item-link {
    display: block;
    position: relative;
	  margin-bottom: 24px;
	  border: 4px solid red;
    overflow: hidden;
  }

  .c-brands-list__item-img {
    display: block;
    width: 100%;
    height: auto;
    margin: 0 auto;
  }

  .c-brands-list__item-overlay {
    font-family: bebas-neue, sans-serif;
    background: #000;
    color: #fff;
    letter-spacing: 1px;
    position: absolute;
    top: 0;
    left; 0;
    right: 0;
    width: 100%;
    padding: 12px;
    font-size: 1.25em;
    line-height: 1.125;
    display: none;
  }

  .c-brands-list__item:hover .c-brands-list__item-overlay {
    display: block;
  }







  /* ============================================================
  GLOBAL
============================================================ */

.effects .img {
  position: relative;
  overflow: hidden;

}

.effects .img img {
  display: block;
  margin: 0 auto;
  padding: 0;
  width: 100%;
  height: auto;
  padding: 2px;
    background: #5b827a;
      background: -moz-linear-gradient(left, #5b827a 0%, #80785e 50%, #805d66 100%);
      background: -webkit-gradient(linear, left top, right top, color-stop(0%, #5b827a), color-stop(50%, #80785e), color-stop(100%, #805d66));
      background: -webkit-linear-gradient(left, #5b827a 0%, #80785e 50%, #805d66 100%);
      background: -o-linear-gradient(left, #5b827a 0%, #80785e 50%, #805d66 100%);
      background: -ms-linear-gradient(left, #5b827a 0%, #80785e 50%, #805d66 100%);
      background: linear-gradient(to right, #5b827a 0%, #111 50%, #805d66 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#5b827a', endColorstr='#805d66',GradientType=1 );

}


.overlay {
  display: block;
  position: absolute;
  z-index: 20;
  background: rgba(0, 0, 0, 0.8);
  overflow: hidden;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -o-transition: all 0.5s;
  transition: all 0.5s;
}

a.close-overlay {
  display: block;
  position: absolute;
  top: 0;
  right: 0;
  z-index: 100;
  width: 45px;
  height: 45px;
  font-size: 20px;
  font-weight: 700;
  color: #fff;
  line-height: 45px;
  text-align: center;
  background-color: #000;
  cursor: pointer;
}
a.close-overlay.hidden {
  display: none;
}

a.expand {
  display: block;
  position: absolute;
  z-index: 100;
  text-align: center;
  color: #fff;
}


/* ============================================================
  EFFECT 5 - ICON BORDER ANIMATE
============================================================ */
#effect-5 .overlay {
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  opacity: 0;
}
#effect-5 .overlay a.expand {
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  width: 100%;
  height: 100%;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  -ms-border-radius: 0;
  -o-border-radius: 0;
  border-radius: 0;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -o-transition: all 0.5s;
  transition: all 0.5s;
}
#effect-5 .img.hover .overlay {
  opacity: 1;
}

</style>

<?php
$args = array( 'taxonomy' => 'yith_product_brand' );
$terms = get_terms('yith_product_brand', $args);

if (count($terms) > 0) { ?>
  <div class="c-brands-list">
    <ul class="o-layout"><!--
  <?php foreach ($terms as $term) { ?>

    --><li class="o-layout__item  u-1-6  u-aligncenter  u-uppercase">


    <div id="effect-5" class="effects clearfix">
                <div class="img">
                    <img src="<?php echo get_site_url(); ?>/img/icons/LP_rings-hollow.png" alt="">
                    <div class="overlay">
                        <a href="#" class="expand">VIEW BRAND</a>
                        <a class="close-overlay hidden">x</a>
                    </div>
                </div>
            </div>
<!--

        <div class="c-brands-list__item">
          <a class="c-brands-list__item-link" href="<?php //echo get_site_url(); ?>/product-brands/<?php //echo $term->slug; ?>/" title="View <?php //echo $term->name; ?>">
          <img class="c-brands-list__item-img" src="<?php //echo get_site_url(); ?>/img/icons/LP_rings.jpg" alt="">
         <span class="c-brands-list__item-overlay">VIEW BRAND</span>
         </a>
     </div>  -->


    </li><!--

<?php }; ?>

--></ul>
</div>
<?php } ?>
