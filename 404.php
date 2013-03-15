<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="span-17">

		<h2 class="center">Ooops! Pagina cautata nu exista.</h2>
		<p class="notice large">Va rugam verificati adresa de web, folositi linkurile din dreapta paginii, sau consultati <a href="<?php echo get_option('home'); ?>/arhiva">Arhiva.</a>
		  Va multumim!
		</p>	

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
