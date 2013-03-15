<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="span-17">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>

			<div class="entry">
			  <div class="entry-body span-14">
				  <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				  <?php $stoc = 1; ?>
				  <?php if ($stoc) { ?>
				    <hr/>
				    <div id="buy" class="span-17">
				      <div id="price" class="span-5 colborder">
				        <p>
				          <?php echo yak_calc_price($post->ID); ?>
				          <br/>
				          EUR
				        </p>
				      </div>
				      <div id="stock" class="span-5 colborder">
				        <p>
				          <?php echo $stoc ?>
				          <br/>
				          in stoc
				        </p>
				      </div>
				      <div id="cart" class="span-5 last">
				        <form method="post" action="/index.php#buynow_button" name="buynow">
                  <input type="hidden" value="<?php the_ID() ?>" name="buynow"/>
                  <input type="hidden" value="6" name="category"/>
                  <input type="hidden" value="p" name="buynow_param"/>
                  <input type="hidden" value="55" name="page_id"/>
                  <input id="addbutton" class="yak_button" type="image" src="<?php bloginfo('stylesheet_directory'); ?>/img/icons/shoppingcart_checkout.png" alt="Adauga in cos" title="Aduaga la cos">
                </form>
				      </div>
				    </div>
				  <?php } ?>

				  <div id="meta" class="span-17">
				    <div class="span-5 colborder">
				      <span class="iconleft icon-user">Creat de <?php the_author() ?></span>
				    </div>
				    <div class="span-5 colborder">
				      <span class="iconleft icon-date"> La  <?php the_time('j F Y') ?></span>
				    </div>
				    <div class="span-5 last">
				      <span class="iconleft icon-rss"><?php post_comments_feed_link('Comentarii'); ?></span>, <a href="<?php trackback_url(); ?>" rel="trackback">Trackback</a>
				    </div>
				  </div>

				  <div id="meta-2" class="span-17">
				    <div class="span-11 colborder">
				      <span class="iconleft icon-tags"><?php the_category(', ') ?><?php the_tags(' si ', ', ', ''); ?></span>
				    </div>
				    <div class="span-5 last">
				      <?php edit_post_link('Modificare', '<span class="iconleft icon-edit">', '</span>'); ?>
				    </div>
				  </div>

				  <hr/>

          
				</div>
				<div class="entry-aside span-3 last">
				  <?php $stoc = 1; ?>
				  <?php if ($stoc) { ?>
				    <div class="span-2">
				      <?php echo yak_calc_price($post->ID); ?> EUR
				      <br/>
				      <?php echo $stoc ?> in stoc
				      <br/>
				    </div>
				    <div class="span-1 last">
				      <form method="post" action="/index.php#buynow_button" name="buynow">
                <input type="hidden" value="<?php the_ID() ?>" name="buynow"/>
                <input type="hidden" value="6" name="category"/>
                <input type="hidden" value="p" name="buynow_param"/>
                <input type="hidden" value="55" name="page_id"/>
                <input id="addbutton" class="yak_button" type="image" src="<?php bloginfo('stylesheet_directory'); ?>/img/basket.gif">
              </form>
				    </div>
				    <div class="clear"></div>
				    <br/>
				  <?php } ?>
				  <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
				</div>

				<div class="clear"></div>
			</div>
		</div>

	<?php comments_template(); ?>

	<div class="navigation span-17">
			<div class="left"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="right"><?php next_post_link('%link &raquo;') ?></div>
	</div>
  <div class="clear"></div>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

