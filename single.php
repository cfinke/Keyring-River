<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Keyring River
 */

get_header(); ?>
<li class="header"></li>
<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content', 'single' ); ?>

	<?php keyring_river_post_nav(); ?>

	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	?>

<?php endwhile; // end of the loop. ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>