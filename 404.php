<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Keyring River
 */

get_header(); ?>
<li class="header">
	<h1><?php _e( '404 Not Found', 'keyring-river' ); ?></h1>
	<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'keyring-river' ); ?></p>
</li>
<?php get_search_form(); ?>
<?php get_footer(); ?>