<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content" class="span-17">

<?php get_search_form(); ?>


<h2>Archiva dupa Categorii</h2>
	<ul>
		 <?php wp_list_categories('show_count=1&feed=RSS&feed_image=http://garlando.ro/wp-includes/images/rss.png'); ?>
	</ul>

<h2>Arhiva cronologica</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>Arhiva dupa autor</h2>
	<ul>
		<?php wp_list_authors('exclude_admin=0&optioncount=1&feed=RSS&feed_image=http://garlando.ro/wp-includes/images/rss.png'); ?>
	</ul>

<h2>Arhiva de etichete</h2>
	<ul>
		<?php wp_tag_cloud(); ?>
	</ul>


<hr/>
<p class="large notice">
Daca nu ati gasit nici un rezultat in arhive va rugam folositi motorul de cautare la inceputul paginii. 
<br/>
Va multumim.
</p>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
