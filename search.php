<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Keyring River
 */

get_header(); ?>
<li class="post header"><b><?php printf( __( 'Search Results for: %s', 'keyring-river' ), '<span>' . get_search_query() . '</span>' ); ?></b></li>
<li class="search">
	<?php get_search_form(); ?>
</li>
<?php if ( have_posts() ) : ?>
	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'search' ); ?>

	<?php endwhile; ?>

	<?php keyring_river_paging_nav(); ?>
<?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
