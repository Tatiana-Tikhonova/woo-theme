<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tati
 */

?>

<footer id="colophon" class="site-footer widget-area">
	<div class="container site-footer__container">
		<?php get_sidebar('footer'); ?>
	</div>
</footer><!-- #colophon -->
</div><!-- site-wrapper#page -->

<?php wp_footer(); ?>

</body>

</html>