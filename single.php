<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Keyring River
 */

get_header(); ?>
<?php get_search_form(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'content', 'single' ); ?>

	<?php keyring_river_post_nav(); ?>
<?php endwhile; // end of the loop. ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>