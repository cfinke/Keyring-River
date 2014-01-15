<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Keyring River
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function keyring_river_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer' => false,
		'wrapper' => false,
		'posts_per_page' => 30,
	) );
}
add_action( 'after_setup_theme', 'keyring_river_jetpack_setup' );
