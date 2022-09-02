<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tati
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<div id="secondary" class="widget-area footer__sidebar">
	<?php dynamic_sidebar('sidebar-2'); ?>
</div><!-- #secondary -->