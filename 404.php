<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Keyring River
 */

get_header(); ?>
<li class="header">
	<?php _e( 'Oops! That page can&rsquo;t be found.', 'keyring-river' ); ?>
	<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'keyring-river' ); ?></p>
	<?php get_search_form(); ?>
</li>
<?php get_footer(); ?>