<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="span-17">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Rezultatele cautarii pentru: <?php echo $s ?></h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Articole vechi') ?></div>
			<div class="alignright"><?php previous_posts_link('Articole noi &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h3 id="post-<?php the_ID(); ?>" class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<br/>
				
				<div class="span-2 colborder">
          <?php image_extractor(true, 0, 100, 70, 'subcategory-image', '', '', ''); ?>
        </div>
        				
				<div class="span-11 last">
				  <?php the_time('j F Y') ?>
				  <br/>
				  <?php the_tags('Etichete: ', ', ', '<br />'); ?> In categoria <?php the_category(', ') ?>
				  <br/>
				  <?php comments_popup_link('Fara comentarii &#187;', '1 comentariu &#187;', '% comentarii &#187;'); ?> <?php edit_post_link('Modificare', ' | ', ''); ?>
				</div>					
			</div>
      <div class="clear"></div>
      <br/>
            
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Articole vechi') ?></div>
			<div class="alignright"><?php previous_posts_link('Articole noi &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Nu am gasit nici un rezultat.</h2>
		<p class="notice large">
		  Puteti incerca o noua cautare, sau sa consultati <a href="<?php echo get_option('home'); ?>/arhiva">Arhiva.</a>
		  <br/>
		  Va multumim!
		</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
