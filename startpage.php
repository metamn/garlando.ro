<?php
/*
Template Name: Startpage
*/
?>

<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<script type="text/javascript">
  $(document).ready(function() {
   $("#product div").click(
    function() {
      $(this).children('.product-body').toggle(100);
    });

   $("#product-image img").click(
    function() {
      $(this).parent('div').next('div').children('.product-body').toggle(100);
    });

   $("#product div, #product-image img").hover(
    function() {
      $(this).addClass('pretty-hover');
    },
    function() {
      $(this).removeClass('pretty-hover');
    });
  });
</script>

<div id="content" class="frontpage">

    <center>
        <p>
        Garlando face parte dintre cele mai cunoscute producatori de mese fotbal si biliard in lume fiind cel mai avantajos brand privind raportul pret / calitate.
        <br/>
        Va rugam consultati <a class="download" href="http://garlando.ro/wp-content/uploads/2009/05/oferta_garlando_2009.pdf">lista noastra de preturi</a>.
        </p>
    </center>


  <div id="products">
    <?php
    $products = get_categories('child_of=5&hide_empty=0&order=asc&orderby=ID');
    $products_ids = array(12, 9, 7, 8, 6, 11, 10, 33); /* filter out the main product categories */
    foreach ( $products as $product ) {
     if (in_array($product->cat_ID, $products_ids)) { ?>
      <div id="product" class="product-<?php echo $product->cat_ID ?>">
        <div id="product-image" class="span-6 colborder"><?php get_cat_icon('cat=' . $product->cat_ID . '&small=true&link=false'); ?></div>
        <div id="product-details" class="span-16 last">
          <div class="span-13">
            <span class="product-title"><span class="title-first_letter"><?php echo $product->name[0] ?></span><?php echo substr($product->name, 1); ?></span>
            <br/>
            <?php echo $product->description ?>
          </div>
          <div class="product-icons span-3 last">
            <?php
              $subcats = get_categories('child_of=' . $product->cat_ID . '&hide_empty=0&order=asc&orderby=ID');
              foreach ( $subcats as $subcat ) { ?>
                <?php get_cat_icon('cat=' . $subcat->cat_ID . '&small=true&link=false&class=subcat-icons'); ?>
            <?php } ?>
          </div>
          <div class="clear"></div>
          <div class="product-body" style="display:none">
            <?php
              $i = 0;
              foreach ($subcats as $subcat) {
               if ($i & 1) { ?>
                <div id="subcategory" class="span-8 last">
                  <div class="subcategory-name span-6"><?php echo $subcat->name ?></div>
                  <div class="subcategory-icon span-2 last"><?php get_cat_icon('cat=' . $subcat->cat_ID . '&small=true&link=false&class=subcat-icons-patch'); ?></div>
                  <div class="clear"></div>
                  <div class=span-6>
               <?php } else { ?>
                <div id="subcategory" class="span-8">
                  <div class="subcategory-icon span-2"><?php get_cat_icon('cat=' . $subcat->cat_ID . '&small=true&link=false&class=subcat-icons'); ?></div>
                  <div class="subcategory-name span-6 last"><?php echo $subcat->name ?></div>
                  <div class="clear"></div>
                  <div class="prepend-2">
               <?php }

                $subcat_posts = get_posts('numberposts=-1&&category='.$subcat->cat_ID);
                ?>
                <ul class='startpage'>
                <?php
                foreach ($subcat_posts as $post) { ?>
                  <li><a href="<?php the_permalink() ?>"><?php image_extractor(true, 0, 100, 70, 'subcategory-image', '', '', ''); ?></a></li>
                  <li class='startpage-last'><span class="subcategory-post-title"><a href="<?php the_permalink() ?>"><?php echo $post->post_title ?></a></span></li>
                <?php }?>
                </ul>
                </div>
              </div>
            <?php
              $i++;
            }?>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    <?php }} ?>
  </div>
</div>


<?php get_footer(); ?>

